<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Plan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\Entertainment;
use App\Models\EpisodeStreamLinks;
use App\Models\TempFile;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Log;


class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return redirect()->route('admin.dashboard.index')->with('info', 'Episodes are managed from TV Show edit pages.');
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

        return view('episodes.create', compact( 'tvshows', 'selectedTvShow'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'poster_url' => 'nullable',
            'season_id' => 'nullable|exists:seasons,id',
            'description' => 'nullable|string',
            'short_desp' => 'nullable|string',
            'status' => 'required|boolean',
            'release_date' => 'nullable|date',
            'duration' => 'nullable|string|max:50',
            'entertainment_id' => 'required|exists:entertainments,id',
            'video_quality_url' => 'nullable',
            'IMDb_rating' => 'nullable',
        ]);

        if ($request->hasFile('poster_url')) {
            $path = $request->file('poster_url')->store('episodes', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $poster_url_value = $spacesConfig['url'] . '/' . $path;
        }else{
            $poster_url_value = $request->existing_poster_url ?? $request->poster_url;
        }

        $episode = Episode::create(array_merge(
    $request->only([
                'name',
                'tmdb_id',
                'season_id',
                'entertainment_id',
                'description',
                'short_desc',
                'IMDb_rating',
                'duration',
                'release_date',
                'status',
            ]),
            [
                'poster_url' => $poster_url_value,
                'created_by' => auth()->id(),
            ]
        ));

        // Check if we should return to TV show edit page
        $returnToTvShow = session()->pull('episode_return_to_tvshow');
        if ($returnToTvShow) {
            return redirect()->route('admin.tvshows.edit', $returnToTvShow)
                ->with('success', 'Episode created successfully.');
        }

        return redirect()->route('admin.episodes.upload', ['id' => $episode->id]);
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
        $episode = Episode::with('EpisodeStreamContentMapping')->findOrFail($id);
        $tvshows = Entertainment::where('type', 'tvshow')->get();

        // Set session variable to return to TV show edit page after episode update
        if ($request->has('entertainment_id')) {
            session(['episode_return_to_tvshow' => $request->entertainment_id]);
        } elseif ($episode->entertainment_id) {
            // If no entertainment_id in request but episode has one, use it
            session(['episode_return_to_tvshow' => $episode->entertainment_id]);
        }

        return view('episodes.edit', compact('episode', 'tvshows'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $episode = Episode::findOrFail($id);
        $request->validate([
            'name' => 'nullable|string|max:255',
            'poster_url' => 'nullable',
            'season_id' => 'nullable|exists:seasons,id',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
            'trailer_url_type' => 'nullable',
            'trailer_url' => 'nullable',
            'release_date' => 'nullable|date',
            'duration' => 'nullable|string|max:50',
            'IMDb_rating' => 'nullable',
            'uploaded_trailer_data' => 'nullable|string',
            'uploaded_video_data' => 'nullable|string',
        ]);


        $episode->name = $request->name ?? $episode->name;
        $episode->season_id = $request->season_id ?? $episode->season_id;
        $episode->entertainment_id = $request->entertainment_id ?? $episode->entertainment_id;
        $episode->description = $request->description ?? $episode->description;
        $episode->status = $request->status ?? $episode->status;
        // Handle trailer file upload
        if ($request->filled('trailer_url_type')) {
            $episode->trailer_url_type = $request->trailer_url_type;

            if ($request->trailer_url_type === 'Local') {
                // For Local type, check if file was uploaded via presigned URL
                // The file data should already be saved in the database via uploadComplete method
                // If session data exists, it means file was uploaded but not yet processed
                $sessionKey = 'uploaded_trailer_' . $id;
                if (session()->has($sessionKey)) {
                    $fileData = session($sessionKey);
                    if ($fileData && isset($fileData['file_url'])) {
                        $episode->trailer_url = $fileData['file_url'];
                        // Clear session data after successful update
                        session()->forget($sessionKey);
                    }
                }
                // If no session data, the file URL is already saved in the database
            } else {
                // For URL or HSL types, use the provided URL
                $episode->trailer_url = $request->trailer_url ?? $episode->trailer_url;
            }
        }

        if ($request->hasFile('poster_url')) {
            if ($episode->poster_url) {
                $url = $episode->poster_url;
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
            $path = $request->file('poster_url')->store('episodes', 'spaces');
            $spacesConfig = config('filesystems.disks.spaces');
            $episode->poster_url = $spacesConfig['url'] . '/' . $path;
        } else {
            // Use existing poster URL if no new file uploaded
            $episode->poster_url = $request->existing_poster_url ?? $episode->poster_url;
        }
        $episode->IMDb_rating = $request->IMDb_rating ?? $episode->IMDb_rating;
        $episode->save();

        // Handle video file upload
        if ($request->filled('video_upload_type')) {
            $episodeStream = EpisodeStreamLinks::where('episode_id', $episode->id)->first();
            if (!$episodeStream) {
                $episodeStream = new EpisodeStreamLinks();
                $episodeStream->episode_id = $episode->id;
                $episodeStream->type = $request->video_upload_type;
                $episodeStream->url = $request->video_url_input;

            }else{
                $episodeStream->type = $request->video_upload_type ?? $episodeStream->type;
                $episodeStream->url = $request->video_url_input ?? $episodeStream->url;

            }

            $episodeStream->save();
        }

        $returnToTvShow = session()->pull('episode_return_to_tvshow');
        if (!$returnToTvShow) {
            // Check if coming from edit flow
            $returnToTvShow = session()->pull('episode_edit_return_to_tvshow');
        }
        if (!$returnToTvShow) {
            // Check if coming from upload flow
            $returnToTvShow = session()->pull('episode_upload_return_to_tvshow');
        }

        if ($returnToTvShow) {
            return redirect()->route('admin.tvshows.edit', $returnToTvShow)
                ->with('success', 'Episode updated successfully.');
        }

        return redirect()->route('admin.episodes.index')->with('success', 'Episode updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $episode = Episode::findOrFail($id);
            // Delete poster if exists and is local
            if ($episode->poster_url) {
                $parsed = parse_url($episode->poster_url, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');
                if (!empty($oldPath) && Storage::disk('spaces')->exists($oldPath)) {
                    Storage::disk('spaces')->delete($oldPath);
                }
            }
            $episode->delete();

            // Return JSON for AJAX requests
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Episode deleted successfully.'
                ]);
            }

            return redirect()->route('admin.episodes.index')->with('success', 'Episode deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting episode: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Error deleting episode.');
        }
    }
    /**
     * Generate presigned URL for direct S3 upload
     */
    public function uploadChunk(Request $request, $episodeId)
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
            $tempDir = storage_path('app/tmp_uploads/' . md5($fileName . $episodeId));
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
                $s3Path = 'episodes/' . time() . '_' . $fileName;
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

    public function showUploadPage(Request $request, $id)
    {
        $episode = Episode::findOrFail($id);

        if ($request->has('entertainment_id')) {
            session(['episode_upload_return_to_tvshow' => $request->entertainment_id]);
        } elseif ($episode->entertainment_id) {
            session(['episode_upload_return_to_tvshow' => $episode->entertainment_id]);
        }

        $streamLink = EpisodeStreamLinks::where('episode_id', $episode->id)->first();

        if ($streamLink) {
            $episode->video_upload_type = $streamLink->type;
            $episode->video_url_input = $streamLink->url;
        }

        return view('episodes.upload', compact('episode'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $episode = Episode::findOrFail($id);
        $episode->status = $request->state;
        $episode->save();
        return response()->json(['status' => $episode->status, 'message' => 'Status updated successfully']);
    }


}
