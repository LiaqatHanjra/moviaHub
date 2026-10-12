<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entertainment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\EntertainmentCast;
use App\Models\EntertainmentGenres;
use App\Models\Genre;
use App\Models\Country;
use App\Models\CastCrew;
use App\Models\EntertainmentCountry;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Log;
use App\Models\Season;
use App\Models\Episode;


class TvShowController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tvshows = Entertainment::where('type', 'tvshow')
                ->select(['id', 'thumbnail_url', 'name', 'language', 'status', 'IMDb_rating', 'release_date'])
                ->with(['entertainmentGenerMappings.genre', 'entertainmentLike', 'entertainmentView']);

            return DataTables::of($tvshows)
                ->filter(function ($query) use ($request) {
                    $keyword = $request->input('search.value');
                    if ($keyword) {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    }
                })
                ->order(function ($query) use ($request) {
                    // Check if any sorting is requested from DataTables
                    $orderColumn = $request->input('order.0.column');
                    $orderDir = $request->input('order.0.dir');

                    if ($orderColumn !== null && $orderDir !== null) {
                        // Map DataTables column index to actual database column
                        $columns = [
                            1 => 'entertainmentLike', // Like column
                            2 => 'entertainmentView',  
                            5 => 'language',          // Language column
                            6 => 'status',            // Status column
                        ];

                        if (isset($columns[$orderColumn])) {
                            $column = $columns[$orderColumn];

                            if ($column === 'entertainmentLike') {
                                // Sort by like count
                                $query->withCount('entertainmentLike')->orderBy('entertainment_like_count', $orderDir);
                            } elseif ($column === 'entertainmentView') {
                                // Sort by view count
                                $query->withCount('entertainmentView')->orderBy('entertainment_view_count', $orderDir);
                            } else {
                                // Sort by other columns
                                $query->orderBy($column, $orderDir);
                            }
                        }
                    }

                    // Always add ID desc as secondary sort to maintain consistent order
                    $query->orderBy('id', 'desc');
                })
                ->addColumn('image_name', function ($tvshow) {
                    $image = $tvshow->thumbnail_url ? '<img src="' . $tvshow->thumbnail_url . '" style="height: 129px; width: 100px; border-radius: 6px; vertical-align: middle; margin-right: 10px;" />' : '';
                    $name = $tvshow->name ?: '-';
                    $genres = $tvshow->entertainmentGenerMappings->isNotEmpty() ? $tvshow->entertainmentGenerMappings->pluck('genre.name')->join(', ') : '-';
                    $releaseDate = $tvshow->release_date ? $tvshow->release_date->format('Y-m-d') : '-';
                    return "
                    <div style='display: inline-flex; align-items: center;'>
                        $image
                        <div>
                            <strong style='text-wrap: wrap;'>$name</strong><br>
                            <small style='text-wrap: wrap;'>Genres: $genres</small><br>
                            <small>Release: $releaseDate</small>
                        </div>
                    </div>";
                })
                ->addColumn('name', function ($tvshow) {
                    return $tvshow->name ?: '-'; // Hidden column for sorting
                })
                ->addColumn('like', function ($tvshow) {
                    $likeCount = $tvshow->entertainmentLike->count();
                    return $likeCount > 0 ? $likeCount : '-';
                })
                ->addColumn('watch', function ($tvshow) {
                    $viewCount = $tvshow->entertainmentView->count();
                    return $viewCount > 0 ? $viewCount : '-';
                })
                ->addColumn('language', function ($tvshow) {
                    return $tvshow->language ?: '-';
                })
                ->addColumn('status', function ($tvshow) {
                    $checked = $tvshow->status ? 'checked' : '';
                    return '
                    <div class="form-check form-switch">
                        <input class="form-check-input tvshow-status-toggle" type="checkbox" data-id="' . $tvshow->id . '" ' . $checked . '>
                    </div>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.tvshows.edit', $row->id);
                    $deleteUrl = route('admin.tvshows.destroy', $row->id);
                    $uploadUrl = route('admin.tvshows.upload', $row->id);
                    return '
                    <a href="' . $uploadUrl . '" class="btn btn-sm btn-info me-1" title="Upload Files"><i class="bi bi-upload"></i></a>
                    <a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '" title="Delete" onclick="return false;"><i class="bi bi-trash"></i></button>';
                })
                ->filterColumn('language', function($query, $keyword) {
                    $query->where('language', 'like', "%$keyword%");
                })
                ->filterColumn('name', function($query, $keyword) {
                    $query->where('name', 'like', "%$keyword%");
                })
                ->orderColumn('status', function($query, $order) {
                    $query->orderBy('entertainments.status', $order);
                })
                ->orderColumn('language', function($query, $order) {
                    $query->orderBy('entertainments.language', $order);
                })
                ->rawColumns(['image_name', 'status', 'action'])
                ->make(true);
        }

        return view('tvshows.index');
    }

    public function create()
    {
        $genres = Genre::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $actors = CastCrew::where('type', 'actor')->get();
        $directors = CastCrew::where('type', 'director')->get();
        return view('tvshows.create', compact('genres',  'countries', 'actors', 'directors'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'tmdb_id' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'trailer_url_type' => 'nullable',
            'trailer_url' => 'nullable',
            'poster_url' => 'required',
            'thumbnail_url' => 'required|file|image|mimes:jpeg,png,jpg,gif,webp',
            'language' => 'nullable|string|max:100',
            'IMDb_rating' => 'nullable|numeric|min:0|max:10',
            'duration' => 'nullable|string|max:50',
            'release_date' => 'nullable|date',
            'type' => 'nullable',
            'status' => 'required|boolean',
            'actors' => 'nullable|array',
            'directors' => 'nullable|array',
            'genres' => 'nullable|array',
            'countries' => 'nullable|array',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $poster_url_value = null;
        if ($request->hasFile('poster_url')) {
            $path = $request->file('poster_url')->store('tvshows', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $baseUrl = $spacesConfig['url'] ?? 'https://' . $spacesConfig['bucket'] . '.' . $spacesConfig['region'] . '.digitaloceanspaces.com';
            $poster_url_value = $baseUrl . '/' . $path;
        }else{
            $poster_url_value = $request->poster_url;
        }

        // Handle thumbnail_url (file or url)
        $thumbnail_url_value = null;
        if ($request->hasFile('thumbnail_url')) {
            $path = $request->file('thumbnail_url')->store('tvshows', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $baseUrl = $spacesConfig['url'] ?? 'https://' . $spacesConfig['bucket'] . '.' . $spacesConfig['region'] . '.digitaloceanspaces.com';
            $thumbnail_url_value = $baseUrl . '/' . $path;
        }else{
            $thumbnail_url_value = $request->thumbnail_url;
        }

        $tvshow = Entertainment::create(array_merge(
    $request->only([
                'name',
                'tmdb_id',
                'description',
                'movie_access',
                'language',
                'IMDb_rating',
                'duration',
                'release_date',
                'status',
                'trailer_url_type'
            ]),
            [
                'poster_url' => $poster_url_value,
                'thumbnail_url' => $thumbnail_url_value,
                'type' => 'tvshow',
                'created_by' => auth()->id(),
            ]
        ));

        if ($request->actors) {
            $actors = $request->actors;
            foreach ($actors as $actor) {
                EntertainmentCast::create([
                    'entertainment_id' => $tvshow->id,
                    'cast_id' => $actor
                ]);
            }
        }

        if ($request->directors) {
            $directors = $request->directors;
            foreach ($directors as $director) {
                EntertainmentCast::create([
                    'entertainment_id' => $tvshow->id,
                    'cast_id' => $director
                ]);
            }
        }


        if ($request->genres) {
            $genres = $request->genres;
            foreach ($genres as $genre) {
                EntertainmentGenres::create([
                    'entertainment_id' => $tvshow->id,
                    'genre_id' => $genre
                ]);
            }
        }

        if ($request->countries) {
            $countries = $request->countries;
            foreach ($countries as $country) {
                EntertainmentCountry::create([
                    'entertainment_id' => $tvshow->id,
                    'country_id' => $country
                ]);
            }
        }

        return redirect()->route('admin.tvshows.upload', ['id' => $tvshow->id]);
    }

    public function edit($id)
    {
        $tvshow = Entertainment::where('id', $id)
            ->with([
                'entertainmentGenerMappings',
                'entertainmentCountryMappings',
                'entertainmentStreamContentMappings',
                'entertainmentTalentMappings'
            ])
            ->first();
        $genres = Genre::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $actors = CastCrew::where('type', 'actor')->get();
        $directors = CastCrew::where('type', 'director')->get();
        $seasons = Season::where('entertainment_id', $id)
            ->orderBy('season_index', 'asc')
            ->get();

        // Get episodes for this TV show
        $episodes = Episode::where('entertainment_id', $id)
            ->with(['seasondata'])
            ->orderBy('season_id', 'asc')
            ->orderBy('episode_number', 'asc')
            ->get();
            return view('tvshows.edit', compact(
                'tvshow',
                'genres',
                'countries',
                'actors',
                'directors',
                'seasons',
                'episodes'));
        }

    public function update(Request $request, $id)
    {
        $tvshow = Entertainment::where('type', 'tvshow')->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'trailer_url' => 'nullable',
            'poster_url' => 'nullable',
            'thumbnail_url' => 'nullable',
            'trailer_url_type' => 'nullable',
            'language' => 'nullable|string|max:100',
            'IMDb_rating' => 'nullable|numeric|min:0|max:10',
            'duration' => 'nullable|string|max:50',
            'release_date' => 'nullable|date',
            'status' => 'nullable|boolean',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Handle trailer_url (file or url)

        if ($request->filled('trailer_url_type')) {
            $tvshow->trailer_url_type = $request->trailer_url_type;
            $tvshow->trailer_url = $request->trailer_url;
        }
        if ($request->hasFile('poster_url')) {
            if ($tvshow->poster_url) {
                $url = $tvshow->poster_url;
                if (strpos($url, 'tmdb.org') !== false) {
                }
                elseif (strpos($url, 'digitaloceanspaces.com') !== false) {
                    $parsed = parse_url($url, PHP_URL_PATH);
                    $oldPath = ltrim($parsed, '/');

                    if (!empty($oldPath)) {
                        try {
                            if (Storage::disk('spaces')->exists($oldPath)) {
                                Storage::disk('spaces')->delete($oldPath);
                            }
                        } catch (\Exception $e) {
                        }
                    }
                }
                else {
                    $parsed = parse_url($url, PHP_URL_PATH);
                    $oldPath = ltrim($parsed, '/');

                    if (!empty($oldPath)) {
                        try {
                            if (Storage::disk('public')->exists($oldPath)) {
                                Storage::disk('public')->delete($oldPath);
                            }
                        } catch (\Exception $e) {
                        }
                    }
                }
            }
            $path = $request->file('poster_url')->store('tvshows', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $baseUrl = $spacesConfig['url'] ?? 'https://' . $spacesConfig['bucket'] . '.' . $spacesConfig['region'] . '.digitaloceanspaces.com';
            $tvshow->poster_url = $baseUrl . '/' . $path;
        }else{
            $tvshow->poster_url = $request->poster_url ?? $tvshow->poster_url;
        }

        if ($request->hasFile('thumbnail_url')) {
            if ($tvshow->thumbnail_url) {
                $url = $tvshow->thumbnail_url;
                if (strpos($url, 'tmdb.org') !== false) {
                }
                elseif (strpos($url, 'digitaloceanspaces.com') !== false) {
                    $parsed = parse_url($url, PHP_URL_PATH);
                    $oldPath = ltrim($parsed, '/');

                    if (!empty($oldPath)) {
                        try {
                            if (Storage::disk('spaces')->exists($oldPath)) {
                                Storage::disk('spaces')->delete($oldPath);
                            }
                        } catch (\Exception $e) {
                        }
                    }
                }
                else {
                    $parsed = parse_url($url, PHP_URL_PATH);
                    $oldPath = ltrim($parsed, '/');

                    if (!empty($oldPath)) {
                        try {
                            if (Storage::disk('public')->exists($oldPath)) {
                                Storage::disk('public')->delete($oldPath);
                            }
                        } catch (\Exception $e) {
                        }
                    }
                }
            }
            $path = $request->file('thumbnail_url')->store('tvshows', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $baseUrl = $spacesConfig['url'] ?? 'https://' . $spacesConfig['bucket'] . '.' . $spacesConfig['region'] . '.digitaloceanspaces.com';
            $tvshow->thumbnail_url = $baseUrl . '/' . $path;
        }else{
            $tvshow->thumbnail_url = $request->thumbnail_url ?? $tvshow->thumbnail_url;
        }

        $tvshow->name = $request->name ?? $tvshow->name;
        $tvshow->tmdb_id = $request->tmdb_id ?? $tvshow->tmdb_id;
        $tvshow->description = $request->description ?? $tvshow->description;
        $tvshow->language = $request->language ?? $tvshow->language;
        $tvshow->IMDb_rating = $request->IMDb_rating ?? $tvshow->IMDb_rating;
        $tvshow->release_date = $request->release_date ?? $tvshow->release_date;
        $tvshow->status = $request->status ?? $tvshow->status;
        $tvshow->save();

        EntertainmentCast::where('entertainment_id', $tvshow->id)->delete();
        EntertainmentGenres::where('entertainment_id', $tvshow->id)->delete();
        EntertainmentCountry::where('entertainment_id', $tvshow->id)->delete();

        // Add new actors
        if ($request->actors) {
            $actors = array_unique($request->actors);
            foreach ($actors as $actor) {
                EntertainmentCast::create([
                    'entertainment_id' => $tvshow->id,
                    'cast_id' => $actor
                ]);
            }
        }
        // Add new directors
        if ($request->directors) {
            $directors = array_unique($request->directors);
            foreach ($directors as $director) {
                EntertainmentCast::create([
                    'entertainment_id' => $tvshow->id,
                    'cast_id' => $director
                ]);
            }
        }
        // Add new genres
        if ($request->genres) {
            $genres = array_unique($request->genres);
            foreach ($genres as $genre) {
                EntertainmentGenres::create([
                    'entertainment_id' => $tvshow->id,
                    'genre_id' => $genre
                ]);
            }
        }
        // Add new countries
        if ($request->countries) {
            $countries = array_unique($request->countries);
            foreach ($countries as $country) {
                EntertainmentCountry::create([
                    'entertainment_id' => $tvshow->id,
                    'country_id' => $country
                ]);
            }
        }

        return redirect()->route('admin.tvshows.index')->with('success', 'TV Show updated successfully.');
    }

    public function destroy($id)
    {
        $tvshow = Entertainment::findOrFail($id);
        if ($tvshow->poster_url) {
            $url = $tvshow->poster_url;
            if (strpos($url, 'tmdb.org') !== false) {
            }
            elseif (strpos($url, 'digitaloceanspaces.com') !== false) {
                $parsed = parse_url($url, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');

                if (!empty($oldPath)) {
                    try {
                        if (Storage::disk('spaces')->exists($oldPath)) {
                            Storage::disk('spaces')->delete($oldPath);
                        }
                    } catch (\Exception $e) {
                    }
                }
            }
            else {
                $parsed = parse_url($url, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');

                if (!empty($oldPath)) {
                    try {
                        if (Storage::disk('public')->exists($oldPath)) {
                            Storage::disk('public')->delete($oldPath);
                        }
                    } catch (\Exception $e) {
                    }
                }
            }
        }

        if ($tvshow->thumbnail_url) {
            $url = $tvshow->thumbnail_url;
            if (strpos($url, 'tmdb.org') !== false) {
            }
            elseif (strpos($url, 'digitaloceanspaces.com') !== false) {
                $parsed = parse_url($url, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');

                if (!empty($oldPath)) {
                    try {
                        if (Storage::disk('spaces')->exists($oldPath)) {
                            Storage::disk('spaces')->delete($oldPath);
                        }
                    } catch (\Exception $e) {
                    }
                }
            }
            else {
                $parsed = parse_url($url, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');

                if (!empty($oldPath)) {
                    try {
                        if (Storage::disk('public')->exists($oldPath)) {
                            Storage::disk('public')->delete($oldPath);
                        }
                    } catch (\Exception $e) {
                    }
                }
            }
        }
        $tvshow->delete();
        return redirect()->route('admin.tvshows.index')->with('success', 'TV Show deleted successfully.');
    }

    public function show($id)
    {
        $tvshow = Entertainment::where('id', $id)
            ->with([
                'entertainmentGenerMappings',
                'entertainmentCountryMappings',
                'entertainmentStreamContentMappings',
                'entertainmentTalentMappings'
            ])
            ->first();
        return view('tvshows.show', compact('tvshow'));
    }

    public function showUploadPage($id)
    {
        $tvshow = Entertainment::where('id', $id)
            ->firstOrFail();

        return view('tvshows.upload', compact('tvshow'));
    }
    public function toggleStatus(Request $request, $id)
    {
        $tvshow = Entertainment::where('type', 'tvshow')->findOrFail($id);
        $tvshow->status = $request->state;
        $tvshow->save();
        return response()->json(['status' => $tvshow->status, 'message' => 'Status updated successfully']);
    }

    public function uploadChunk(Request $request, $tvshowId)
    {
        try {
            $fileName = $request->input('file_name');
            $chunkNumber = (int) $request->input('chunk_number'); // 1-based indexing
            $totalChunks = (int) $request->input('total_chunks');
            $type = $request->input('type'); // 'trailer' or 'video'
            $chunk = $request->file('chunk');

            if (!$chunk || !in_array($type, ['trailer', 'video'])) {
                return response()->json(['success' => false, 'message' => 'Invalid chunk or type'], 400);
            }

            // Create temporary directory for chunks
            $tempDir = storage_path('app/tmp_uploads/' . md5($fileName . $tvshowId));
            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }

            // Save chunk (1-based indexing)
            $chunkPath = $tempDir . '/' . $chunkNumber;
            file_put_contents($chunkPath, file_get_contents($chunk->getRealPath()));

            // If last chunk, assemble file and upload to Spaces
            if ($chunkNumber == $totalChunks) {
                $localPath = $tempDir . '/assembled_' . $fileName;
                $out = fopen($localPath, 'wb');
                if (!$out) {
                    return response()->json(['success' => false, 'message' => 'Failed to create final file'], 500);
                }

                // Assemble chunks (1-based indexing)
                for ($i = 1; $i <= $totalChunks; $i++) {
                    $chunkPath = $tempDir . '/' . $i;
                    if (file_exists($chunkPath)) {
                        $chunkData = file_get_contents($chunkPath);
                        fwrite($out, $chunkData);
                        unlink($chunkPath);
                    } else {
                        fclose($out);
                        if (file_exists($localPath)) {
                            unlink($localPath);
                        }
                        try {
                            $files = glob($tempDir . '/*');
                            foreach ($files as $file) {
                                if (is_file($file)) {
                                    unlink($file);
                                }
                            }
                            rmdir($tempDir);
                        } catch (\Exception $e) {
                            Log::error('Failed to clean up temp directory during chunk assembly: ' . $e->getMessage());
                        }
                        return response()->json(['success' => false, 'message' => 'Missing chunk file: ' . $i], 400);
                    }
                }
                fclose($out);

                // Initialize S3 Client with config
                $s3Config = config('filesystems.disks.spaces');

                $s3Client = new S3Client([
                    'credentials' => [
                        'key' => $s3Config['key'],
                        'secret' => $s3Config['secret'],
                    ],
                    'region' => $s3Config['region'],
                    'version' => 'latest',
                    'endpoint' => $s3Config['endpoint'],
                ]);

                // Generate S3 path and URL
                $s3Path = 'tvshows/' . time() . '_' . $fileName;
                $s3Url = $s3Client->getObjectUrl($s3Config['bucket'], $s3Path);

                // Upload file to DigitalOcean Spaces
                try {
                    $s3Client->putObject([
                        'Bucket' => $s3Config['bucket'],
                        'Key' => $s3Path,
                        'SourceFile' => $localPath,
                        'ACL' => 'public-read',
                        'ContentType' => $chunk->getClientMimeType(),
                    ]);

                    // Clean up local files
                    if (file_exists($localPath)) {
                        unlink($localPath);
                    }
                    try {
                        $files = glob($tempDir . '/*');
                        foreach ($files as $file) {
                            if (is_file($file)) {
                                unlink($file);
                            }
                        }
                        if (is_dir($tempDir) && count(glob($tempDir . '/*')) === 0) {
                            rmdir($tempDir);
                        }
                    } catch (\Exception $e) {
                        Log::error('Failed to remove temp directory: ' . $e->getMessage());
                    }

                    // Save $s3Url to database (example)
                    // Podcast::where('id', $podcastId)->update(['file_url' => $s3Url]);

                    return response()->json([
                        'success' => true,
                        'presigned_url' => '', // URL for client to upload
                        'path' => $s3Url // Final S3 file URL
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to upload file to Spaces: ' . $e->getMessage());
                    // Cleanup on failure
                    if (file_exists($localPath)) {
                        unlink($localPath);
                    }
                    try {
                        $files = glob($tempDir . '/*');
                        foreach ($files as $file) {
                            if (is_file($file)) {
                                unlink($file);
                            }
                        }
                        if (is_dir($tempDir) && count(glob($tempDir . '/*')) === 0) {
                            rmdir($tempDir);
                        }
                    } catch (\Exception $e) {
                        Log::error('Failed to remove temp directory after upload failure: ' . $e->getMessage());
                    }
                    return response()->json(['success' => false, 'message' => 'Failed to upload file to Spaces: ' . $e->getMessage()], 500);
                }
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Chunk upload error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Upload failed: ' . $e->getMessage()], 500);
        }
    }
}
