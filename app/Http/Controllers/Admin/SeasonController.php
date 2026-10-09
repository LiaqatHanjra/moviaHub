<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\Entertainment;
use Yajra\DataTables\DataTables;
use App\Models\Plan;
use App\Models\TempFile;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Log;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return redirect()->route('admin.dashboard.index')->with('info', 'Seasons are managed from TV Show edit pages.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $selectedTvShow = $request->query('entertainment_id');

        // If entertainment_id is provided, get only that TV show, otherwise get all
        if ($selectedTvShow) {
            $tvshows = Entertainment::where('type', 'tvshow')
                ->where('id', $selectedTvShow)
                ->get();
        } else {
            $tvshows = Entertainment::where('type', 'tvshow')->get();
        }

        return view('seasons.create', compact('tvshows', 'selectedTvShow'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'poster_url' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,webp',
            'tvshow_id' => 'nullable|exists:entertainments,id',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
        ]);

        $posterUrl = null;
        if ($request->hasFile('poster_url')) {
            $path = $request->file('poster_url')->store('seasons', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $posterUrl = $spacesConfig['url'] . '/' . $path;
        }else{
            $posterUrl = $request->poster_url;
        }



        $season_index = Season::where('entertainment_id', $request->tvshow_id)->max('season_index') + 1;

        $season = new Season();
        $season->name = $request->name;
        $season->poster_url = $posterUrl;
        $season->tmdb_id = $request->tmdb_id;
        $season->status = $request->status;
        $season->description = $request->description;
        $season->short_desc = $request->short_description;
        $season->season_index = $season_index;
        $season->entertainment_id = $request->tvshow_id;
        $season->save();

        // Check if we should return to TV show edit page
        $returnToTvShow = session()->pull('season_return_to_tvshow');
        if ($returnToTvShow) {
            return redirect()->route('admin.tvshows.edit', $returnToTvShow)
                ->with('success', 'Season created successfully.');
        }

        return redirect()->route('admin.seasons.upload', ['id' => $season->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $season = Season::findOrFail($id);
        $tvshows = Entertainment::where('type', 'tvshow')->get();

        // Set session variable to return to TV show edit page after season update
        if ($request->has('entertainment_id')) {
            session(['season_edit_return_to_tvshow' => $request->entertainment_id]);
        } elseif ($season->entertainment_id) {
            // If no entertainment_id in request but season has one, use it
            session(['season_edit_return_to_tvshow' => $season->entertainment_id]);
        }

        return view('seasons.edit', compact('season', 'tvshows'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $season = Season::findOrFail($id);

        $request->validate([
            'name' => 'nullable|string|max:255',
            'poster_url' => 'nullable',
            'tvshow_id' => 'nullable|exists:entertainments,id',
            'status' => 'nullable|boolean',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
            'trailer_url_type' => 'nullable',
            'trailer_url' => 'nullable',
            'uploaded_file_data' => 'nullable|string',
            'uploaded_trailer_data' => 'nullable',
        ]);

        if ($request->hasFile('poster_url')) {
            if ($season->poster_url) {
                $url = $season->poster_url;
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
            $path = $request->file('poster_url')->store('seasons', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $season->poster_url = $spacesConfig['url'] . '/' . $path;
        }else{
            $season->poster_url = $request->poster_url ?? $season->poster_url;
        }

        // Handle trailer file upload and delete old if new uploaded (for Local type)
        if ($request->filled('trailer_url_type')) {
            $season->trailer_url_type = $request->trailer_url_type;

            if ($season->trailer_url_type === 'Local') {
                // Check if trailer was uploaded via presigned URL
                if (session('uploaded_trailer_' . $id)) {
                    $uploadedData = session('uploaded_trailer_' . $id);
                    $season->trailer_url = $uploadedData['file_url'];
                    session()->forget('uploaded_trailer_' . $id);
                    Log::info('Using presigned upload data for trailer:', $uploadedData);
                } else {
                    // Handle uploaded file data (fallback for old method)
                    if ($request->filled('uploaded_file_data')) {
                        $fileData = json_decode($request->uploaded_file_data, true);
                        if ($fileData && isset($fileData['file_url'])) {
                            $season->trailer_url = $fileData['file_url'];
                        }
                    }
                }
            } else {
                // For URL or HSL types, use the provided URL
                $season->trailer_url = $request->trailer_url ?? $season->trailer_url;
            }
        }

        $season->name = $request->name ?? $season->name;
        $season->entertainment_id = $request->tvshow_id ?? $season->entertainment_id;
        $season->status = $request->status ?? $season->status;
        $season->description = $request->description ?? $season->description;
        $season->short_desc = $request->short_description ?? $season->short_desc;
        $season->save();

        $returnToTvShow = session()->pull('season_return_to_tvshow');
        if (!$returnToTvShow) {
            // Check if coming from edit flow
            $returnToTvShow = session()->pull('season_edit_return_to_tvshow');
        }
        if (!$returnToTvShow) {
            // Check if coming from upload flow
            $returnToTvShow = session()->pull('season_upload_return_to_tvshow');
        }

        if ($returnToTvShow) {
            return redirect()->route('admin.tvshows.edit', $returnToTvShow)
                ->with('success', 'Season updated successfully.');
        }

        // Default redirect if no return path is set
        return redirect()->route('admin.seasons.index')
            ->with('success', 'Season updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $season = Season::findOrFail($id);
            if ($season->poster_url) {
                $parsed = parse_url($season->poster_url, PHP_URL_PATH); // /cast-crews/oldfile.jpg
                $oldPath = ltrim($parsed, '/'); // cast-crews/oldfile.jpg
                if (!empty($oldPath) && Storage::disk('spaces')->exists($oldPath)) {
                    Storage::disk('spaces')->delete($oldPath);
                }
            }
            $season->delete();

            // Return JSON for AJAX requests
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Season deleted successfully.'
                ]);
            }

            return redirect()->route('admin.seasons.index')->with('success', 'Season deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting season: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Error deleting season.');
        }
    }

    public function searchTvShows(Request $request)
    {
        $query = $request->input('q');
        $results = Entertainment::where('type', 'tvshow')
            ->when($query, function ($qbuilder) use ($query) {
                $qbuilder->where('name', 'like', '%' . $query . '%');
            })
            ->limit(50)
            ->get(['id', 'name']);

        return response()->json($results);
    }
    public function byTvShow($entertainment_id)
    {
        $seasons = Season::where('entertainment_id', $entertainment_id)->get(['id', 'name']);
        return response()->json($seasons);
    }
    public function showUploadPage(Request $request, $id)
    {
        $season = Season::findOrFail($id);

        // Set session variable to return to TV show edit page after upload
        if ($request->has('entertainment_id')) {
            session(['season_upload_return_to_tvshow' => $request->entertainment_id]);
        } elseif ($season->entertainment_id) {
            // If no entertainment_id in request but season has one, use it
            session(['season_upload_return_to_tvshow' => $season->entertainment_id]);
        }

        return view('seasons.upload', compact('season'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $season = Season::findOrFail($id);
        $season->status = $request->status;
        $season->save();
        return response()->json(['success' => true]);
    }

    public function uploadChunk(Request $request, $podcastId)
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
            $tempDir = storage_path('app/tmp_uploads/' . md5($fileName . $podcastId));
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
                $s3Path = 'seasons/' . time() . '_' . $fileName;
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
