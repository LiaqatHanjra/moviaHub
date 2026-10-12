<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entertainment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\EntertainmentStreamLinks;
use App\Models\EntertainmentCast;
use App\Models\EntertainmentGenres;
use App\Models\Plan;
use App\Models\Genre;
use App\Models\CastCrew;
use App\Models\Country;
use App\Models\EntertainmentCountry;
use Illuminate\Support\Facades\Storage;
use App\Models\TempFile;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $movies = Entertainment::where('type', 'movie')
                ->select(['id', 'thumbnail_url', 'name', 'language', 'status', 'IMDb_rating', 'release_date'])
                ->with(['entertainmentGenerMappings', 'entertainmentLike', 'entertainmentView']);

            return DataTables::of($movies)
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
                            2 => 'entertainmentView',  // Watch column
                            3 => 'language',          // Language column
                            4 => 'status',            // Status column
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
                ->addColumn('image_name', function ($movie) {
                    $image = $movie->thumbnail_url ? '<img src="'.$movie->thumbnail_url.'" style="height: 129px; width: 100px; border-radius: 6px; vertical-align: middle; margin-right: 10px;" />' : '';
                    $name = $movie->name ?: '-';
                    $genres = $movie->entertainmentGenerMappings->pluck('genre.name')->join(', ');
                    $releaseDate = $movie->release_date ? $movie->release_date->format('Y-m-d') : '-';
                    return "
                        <div style='display: inline-flex; align-items: center;'>
                            $image
                            <div>
                                <strong style='text-wrap: wrap;'>$name</strong><br>
                                <small style='text-wrap: wrap;'>Genres: $genres</small><br>
                                <small>Release: $releaseDate</small>
                            </div>
                        </div>
                    ";
                })
                ->addColumn('name', function ($movie) {
                    return $movie->name ?: '-';
                })
                ->addColumn('like', function ($movie) {
                    $likeCount = $movie->entertainmentLike->count();
                    return $likeCount > 0 ? $likeCount : '-';
                })
                ->addColumn('watch', function ($movie) {
                    $viewCount = $movie->entertainmentView->count();
                    return $viewCount > 0 ? $viewCount : '-';
                })
                ->addColumn('language', function ($movie) {
                    return $movie->language ?: '-';
                })
                ->addColumn('status', function ($movie) {
                    $checked = $movie->status ? 'checked' : '';
                    return '
                        <div class="form-check form-switch">
                            <input class="form-check-input movie-status-toggle" type="checkbox" data-id="' . $movie->id . '" ' . $checked . '>
                        </div>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.movies.edit', $row->id);
                    $deleteUrl = route('admin.movies.destroy', $row->id);
                    $uploadUrl = route('admin.movies.upload', $row->id);
                    return '
                        <a href="' . $uploadUrl . '" class="btn btn-sm btn-info me-1" title="Upload Files"><i class="bi bi-upload"></i></a>
                        <a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                        <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '" title="Delete" onclick="return false;"><i class="bi bi-trash"></i></button>';
                })
                ->rawColumns(['image_name', 'status', 'action'])
                ->make(true);
        }

        return view('movies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $actors = CastCrew::where('type', 'actor')->get();
        $directors = CastCrew::where('type', 'director')->get();

        return view('movies.create', compact('genres',  'countries', 'actors', 'directors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'tmdb_id' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'poster_url' => 'required|file|image|mimes:jpeg,png,jpg,gif,webp',
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
            $path = $request->file('poster_url')->store('movies', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $baseUrl = $spacesConfig['url'] ?? 'https://' . $spacesConfig['bucket'] . '.' . $spacesConfig['region'] . '.digitaloceanspaces.com';
            $poster_url_value = $baseUrl . '/' . $path;
        }else{
            $poster_url_value = $request->poster_url;
        }

        // Handle thumbnail_url (file or url)
        $thumbnail_url_value = null;
        if ($request->hasFile('thumbnail_url')) {
            $path = $request->file('thumbnail_url')->store('movies', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $baseUrl = $spacesConfig['url'] ?? 'https://' . $spacesConfig['bucket'] . '.' . $spacesConfig['region'] . '.digitaloceanspaces.com';
            $thumbnail_url_value = $baseUrl . '/' . $path;
        }else{
            $thumbnail_url_value = $request->thumbnail_url;
        }

        $movie = Entertainment::create(array_merge(
    $request->only([
                'name',
                'tmdb_id',
                'description',
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
                'type' => 'movie',
                'created_by' => auth()->id(),
            ]
        ));

        // Attach actors, directors, genres, countries as before
        if ($request->actors) {
            foreach ($request->actors as $actor) {
                EntertainmentCast::create([
                    'entertainment_id' => $movie->id,
                    'cast_id' => $actor
                ]);
            }
        }
        if ($request->directors) {
            foreach ($request->directors as $director) {
                EntertainmentCast::create([
                    'entertainment_id' => $movie->id,
                    'cast_id' => $director
                ]);
            }
        }
        if ($request->genres) {
            foreach ($request->genres as $genre) {
                EntertainmentGenres::updateOrCreate([
                    'entertainment_id' => $movie->id,
                    'genre_id' => $genre
                ]);
            }
        }
        if ($request->countries) {
            foreach ($request->countries as $country) {
                EntertainmentCountry::updateOrCreate([
                    'entertainment_id' => $movie->id,
                    'country_id' => $country
                ]);
            }
        }

        // If either trailer or video upload type is Local, redirect to upload page

        return redirect()->route('admin.movies.upload', ['id' => $movie->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Entertainment::where('type', 'movie')->findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // $movie = Entertainment::where('type', 'movie')->findOrFail($id);
        $movie = Entertainment::where('id', $id)
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
        return view('movies.edit', compact('movie', 'genres', 'countries', 'actors', 'directors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Entertainment::where('type', 'movie')->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'poster_url' => 'nullable',
            'thumbnail_url' => 'nullable',
            'trailer_url_type' => 'nullable',
            'language' => 'nullable|string|max:100',
            'IMDb_rating' => 'nullable|numeric|min:0|max:10',
            'duration' => 'nullable|string|max:50',
            'release_date' => 'nullable|date',
            'status' => 'nullable|boolean',
            'is_restricted' => 'nullable|boolean',
            'actors' => 'nullable|array',
            'directors' => 'nullable|array',
            'genres' => 'nullable|array',
            'countries' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->filled('trailer_url_type')) {
            $movie->trailer_url_type = $request->trailer_url_type ?? $movie->trailer_url_type;
            $movie->trailer_url = $request->trailer_url ?? $movie->trailer_url;
        }

        if ($request->video_upload_type) {
            $streamLink = EntertainmentStreamLinks::where('entertainment_id', $movie->id)->first();
            if ($streamLink) {
                $streamLink->url = $request->video_url_input;
                $streamLink->quality = $request->movie_quality;
                $streamLink->type = $request->video_upload_type;
                $streamLink->save();
            } else {
                EntertainmentStreamLinks::create([
                    'entertainment_id' => $movie->id,
                    'quality' => $request->movie_quality,
                    'type' => $request->video_upload_type,
                    'url' => $request->video_url_input,
                ]);
            }
        }

        if ($request->hasFile('poster_url')) {
            if ($movie->poster_url) {
                $url = $movie->poster_url;
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
            $path = $request->file('poster_url')->store('movies', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $baseUrl = $spacesConfig['url'] ?? 'https://' . $spacesConfig['bucket'] . '.' . $spacesConfig['region'] . '.digitaloceanspaces.com';
            $movie->poster_url = $baseUrl . '/' . $path;
        } else {
            // Use existing poster URL if no new file uploaded
            $movie->poster_url = $request->poster_url ?? $movie->poster_url;
        }

        if ($request->hasFile('thumbnail_url')) {
            if ($movie->thumbnail_url) {
                $url = $movie->thumbnail_url;
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
            $path = $request->file('thumbnail_url')->store('movies', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $baseUrl = $spacesConfig['url'] ?? 'https://' . $spacesConfig['bucket'] . '.' . $spacesConfig['region'] . '.digitaloceanspaces.com';
            $movie->thumbnail_url = $baseUrl . '/' . $path;
        } else {
            // Use existing thumbnail URL if no new file uploaded
            $movie->thumbnail_url = $request->thumbnail_url ?? $movie->thumbnail_url;
        }

        $movie->name = $request->name ?? $movie->name;
        $movie->tmdb_id = $request->tmdb_id ?? $movie->tmdb_id;
        $movie->description = $request->description ?? $movie->description;
        $movie->movie_access = $request->movie_access ?? $movie->movie_access;
        $movie->plan_id = $request->plan_id ?? $movie->plan_id;
        $movie->language = $request->language ?? $movie->language;
        $movie->IMDb_rating = $request->IMDb_rating ?? $movie->IMDb_rating;
        $movie->content_rating = $request->content_rating ?? $movie->content_rating;
        $movie->release_date = $request->release_date ?? $movie->release_date;
        $movie->status = $request->status ?? $movie->status;
        $movie->is_restricted = $request->is_restricted ?? $movie->is_restricted;
        $movie->save();
        // Add new actors
        if ($request->actors) {
            $actors = array_unique($request->actors);
            foreach ($actors as $actor) {
                EntertainmentCast::updateOrCreate([
                    'entertainment_id' => $movie->id,
                    'cast_id' => $actor
                ]);
            }
        }
        // Add new directors
        if ($request->directors) {
            $directors = array_unique($request->directors);
            foreach ($directors as $director) {
                EntertainmentCast::updateOrCreate([
                    'entertainment_id' => $movie->id,
                    'cast_id' => $director
                ]);
            }
        }
        // Add new genres
        if ($request->genres) {
            $genres = array_unique($request->genres);
            foreach ($genres as $genre) {
                EntertainmentGenres::updateOrCreate([
                    'entertainment_id' => $movie->id,
                    'genre_id' => $genre
                ]);
            }
        }
        // Add new countries
        if ($request->countries) {
            $countries = array_unique($request->countries);
            foreach ($countries as $country) {
                EntertainmentCountry::create([
                    'entertainment_id' => $movie->id,
                    'country_id' => $country
                ]);
            }
        }

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Entertainment::where('type', 'movie')->findOrFail($id);
        if ($movie->poster_url) {
            $url = $movie->poster_url;
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

        if ($movie->thumbnail_url) {
            $url = $movie->thumbnail_url;
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
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }

    public function countrySearch(Request $request)
    {
        $query = $request->input('q');

        $results = Country::when($query, function ($qbuilder) use ($query) {
            $qbuilder->where('name', 'like', '%' . $query . '%');
        })
            ->limit(50)
            ->get(['id', 'name']);

        return response()->json($results);
    }


    public function toggleStatus(Request $request, $id)
    {
        $movie = Entertainment::findOrFail($id);
        $movie->status = $request->state;
        $movie->save();
        return response()->json(['status' => $movie->status, 'message' => 'Status updated successfully']);
    }

    public function showUploadPage($id)
    {
         $movie = Entertainment::where('id', $id)->firstOrFail();



        // Fetch video URL and type from entertainmentStreamContentMappings
        $streamLink = EntertainmentStreamLinks::where('entertainment_id', $movie->id)->first();
        if ($streamLink) {
            $movie['video_url_type'] = $streamLink['type'];
            $movie['video_url_input'] = $streamLink['url'];
        }else{
            $movie['video_url_type'] = null;
            $movie['video_url_input'] = null;
        }
        return view('movies.upload', compact('movie'));

    }

    public function uploadChunk(Request $request, $movieId)
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
            $tempDir = storage_path('app/tmp_uploads/' . md5($fileName . $movieId));
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
                $s3Path = 'movies/' . time() . '_' . $fileName;
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
                    // Episode::where('id', $episodeId)->update(['file_url' => $s3Url]);

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

    public function globalSearch(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:2|max:100',
        ]);

        $query = $request->input('search');

        // Search Movies
        $movies = Entertainment::where('type', 'movie')
            ->where('status', 1)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->limit(10)
            ->get();

        // Search TV Shows
        $tvShows = Entertainment::where('type', 'tvshow')
            ->where('status', 1)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->limit(10)
            ->get();

        // Search Seasons
        $seasons = \App\Models\Season::where('status', 1)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->limit(10)
            ->get();

        // Search Episodes
        $episodes = \App\Models\Episode::where('status', 1)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->limit(10)
            ->get();

        return response()->json([
            'status' => true,
            'movies' => $movies,
            'tvShows' => $tvShows,
            'seasons' => $seasons,
            'episodes' => $episodes,
            'message' => 'Global search results found.',
        ], 200);
    }


}
