<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Http\Resources\MovieResource;
use App\Models\ContinueWatch;
use App\Http\Resources\TVShowListResource;
use App\Models\WatchList;
use App\Models\EntertainmentDownload;
use App\Http\Resources\ContinueWatchResource;
use Illuminate\Support\Facades\DB;

class WatchListController extends Controller
{
    public function watchList(Request $request)
    {
        $user_id = getApiuser()->id;
        $perPage = $request->input('per_page', 10);

        $watchListEntertanment = Watchlist::where('user_id', $user_id)
            ->pluck('entertainment_id')
            ->toArray();

        $movieList = Entertainment::whereIn('id', $watchListEntertanment)
            ->where('type', 'movie')
            ->with([
                'entertainmentGenerMappings',
                'plan',
                'entertainmentReviews',
                'entertainmentTalentMappings',
                'entertainmentStreamContentMappings',
                'entertainmentDownloadMappings',
            ])
            ->paginate($perPage);
        $tvshowList = Entertainment::whereIn('id', $watchListEntertanment)
            ->where('type', 'tvshow')
            ->with([
                'entertainmentGenerMappings',
                'plan',
                'entertainmentTalentMappings',
                'entertainmentStreamContentMappings',
                'entertainmentDownloadMappings',
            ])
            ->paginate($perPage);
        $doenloadEntertanment = EntertainmentDownload::where('user_id', $user_id)
            ->whereNull('deleted_at')
            ->pluck('entertainment_id')
            ->toArray();
        $downloadList = Entertainment::whereIn('id', $doenloadEntertanment)
            ->with([
                'entertainmentGenerMappings',
                'plan',
                'entertainmentTalentMappings',
                'entertainmentStreamContentMappings',
                'entertainmentDownloadMappings',
            ])
            ->paginate($perPage);
        $tvshowData = TVShowListResource::collection($tvshowList);
        $movieData = MovieResource::collection($movieList);
        $downloadData = MovieResource::collection($downloadList);

        return response()->json([
            'status' => true,
            'data' => [
                'movies' => $movieData,
                'tvshows' => $tvshowData,
                'downloads' => $downloadData,
            ],
        ], 200);
    }

    public function saveWatchList(Request $request)
    {
        $user = getApiuser();
        try {
            $request->validate([
                'entertainment_id' => 'required',
                'type'             => 'required|',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => $e->errors()], 422);
        }

        $entertainmentId = $request->input('entertainment_id');
        $watchlistData = $request->except('user_id');

        $entertainment = Entertainment::find($entertainmentId);

        if (!$entertainment) {
            return response()->json(['status' => false, 'message' => __('movie.entertainment_not_found')]);
        }
        $watchlistData['user_id'] = $user->id;

        Watchlist::updateOrCreate(
            ['entertainment_id' => $entertainmentId, 'user_id' => $user->id],
            $watchlistData
        );

        return response()->json(['status' => true, 'message' => 'Watch list added.']);
    }

    public function deleteWatchList(Request $request)
    {
        $user = getApiuser();
        $id = $request->entertainment_id;

        $watchlist = Watchlist::where('entertainment_id', $id)
            ->where('user_id', $user->id)
            ->forceDelete();

        if ($watchlist == null) {
            $message = 'Movie not found into watch list.';
            return response()->json(['status' => false, 'message' => $message]);
        }

        $message = 'Deleted from watch list.';
        return response()->json(['status' => true, 'message' => $message]);
    }

    public function continuewatchList(Request $request)
    {
        $user_id = getApiuser()->id;
        $perPage = $request->input('per_page', 10);

        $continuewatch = ContinueWatch::query()
            ->where('user_id', $user_id)
            ->whereNotNull('watched_time')
            ->whereNotNull('total_watched_time')
            ->whereNull('deleted_at')
            ->whereHas('entertainment', function ($query) {
                $query->where('status', 1);
            })
            ->with(['entertainment'])
            ->select('entertainment_id', DB::raw('MAX(updated_at) as updated_at')) // Get the latest record for each movie
            ->groupBy('entertainment_id')
            ->orderBy('updated_at', 'desc')
            ->paginate($perPage);

        $responseUniqueData = $continuewatch->map(function ($item) {
            return ContinueWatch::where('entertainment_id', $item->entertainment_id)
                ->with('entertainment')
                ->first();
        });
        $responseData = ContinueWatchResource::collection($responseUniqueData);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'continue watch list data.',
        ], 200);
    }

    public function saveContinueWatch(Request $request)
    {
        $user = getApiuser();
        try {
            $request->validate([
                'entertainment_id'  => 'nullable',
                'entertainment_type'=> 'required',
                'watched_time'      => 'required',
                'total_watched_time'=> 'required',
                'episode_id'        => 'nullable'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => $e->errors()], 422);
        }
        $watch_data = $request->all();
        $total_watched_time = isset($request->total_watched_time) && substr_count($request->total_watched_time, ':') == 1 ? $request->total_watched_time . ':00' : $request->total_watched_time;
        $watched_time = isset($request->watched_time) && substr_count($request->watched_time, ':') == 1 ? $request->watched_time . ':00' : $request->watched_time;


        $result = ContinueWatch::updateOrCreate([
            'entertainment_id' => $request->entertainment_id ?? 0,
            'user_id' => $user->id,
            'entertainment_type' => $request->entertainment_type,
            'total_watched_time' => $total_watched_time,
            'watched_time' => $watched_time,
            'episode_id' => $request->episode_id ?? null,
        ]);

        return response()->json(['status' => true, 'message' => 'save countinue wath list.']);
    }

    public function deleteContinueWatch(Request $request)
    {
        $user = getApiUser();
        $request->validate([
            'continue_watch_id' => 'required|integer|exists:continue_watches,id',
            'entertainment_id'  => 'required|exists:entertainments,id',
        ]);

        $continuewatch = ContinueWatch::where('id', $request->continue_watch_id)
        ->where('entertainment_id', $request->entertainment_id)
        ->where('user_id', $user->id)
        ->first();

        if (!$continuewatch) {
            return response()->json([
                'status' => false,
                'message' => 'Movie not found in continue watch list.',
            ], 404);
        }

        $continuewatch->delete();
        return response()->json([
            'status' => true,
            'message' => 'Delete watch data successfully.',
        ], 200);
    }

}
