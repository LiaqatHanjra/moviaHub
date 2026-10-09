<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entertainment;
use Carbon\Carbon;
use App\Http\Resources\EpisodesResource;
use App\Http\Resources\EpisodeDetailResource;
use App\Models\ContinueWatch;
use App\Models\Episode;
use App\Http\Resources\TVShowListResource;
use Illuminate\Cache\RateLimiting\Limit;

class TvShowController extends Controller
{

    public function episodeList(Request $request)
    {

        $episodeList = Episode::where('status', 1)->with('entertainmentdata', 'plan', 'EpisodeStreamContentMapping', 'episodeDownloadMappings');

        if ($request->has('tvshow_id')) {
            $episodeList = $episodeList->where('entertainment_id', $request->tvshow_id);
        }
        if ($request->has('season_id')) {
            $episodeList = $episodeList->where('season_id', $request->season_id);
        }

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $episodeList->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%");
            });
        }

        $episodes = $episodeList->orderBy('release_date', 'desc')->paginate(10);

        $responseData = EpisodesResource::collection($episodes);
        //     $episodes->map(function ($episode) use ($user_id) {
        //         return new EpisodeResource($episode, $user_id);
        //     })
        // );


        return response()->json([
            'status' => true,
            // 'data' => $responseData,
            'data' => $responseData->items(),
            'pagination' => [
                'current_page' => $responseData->currentPage(),
                'last_page' => $responseData->lastPage(),
                'per_page' => $responseData->perPage(),
                'total' => $responseData->total(),
            ],
            'message' => __('movie.episode_list'),
        ], 200);
    }
    public function episodeDetails(Request $request, $episode_id)
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $episode = Episode::where('id', $episode_id)
                            ->with(
                                'entertainmentdata',
                                'plan',
                                'EpisodeStreamContentMapping',
                                'episodeDownloadMappings'
                            )
                            ->first();
        $continue_watch = ContinueWatch::where('user_id', $user->id)->where('profile_id', $request->profile_id)->where('episode_id', $episode->id)->first();
        if ($continue_watch) {
            $episode['continue_watch'] = $continue_watch;
        }

        $episode['is_play'] = $currentPlanId >= $episode->plan_id ? 1 : 0;

        $responseData = new EpisodeDetailResource($episode);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Episode details',
        ], 200);
    }

    public function getTopTvshow(Request $request)
    {
        $user = getApiUser();

        $tvshowList = Entertainment::query()
            ->select('entertainments.*')
            ->with('entertainmentGenerMappings', 'plan', 'entertainmentReviews', 'entertainmentTalentMappings', 'season', 'episode')
            ->where('type', 'tvshow')

            ->whereDate('release_date', '<=', Carbon::now())
            ->whereHas('episode')
            ->where('status', 1);
        $topRatedQuery = (clone $tvshowList)->where('imdb_rating', '>=', 8);
        $tvshows = $topRatedQuery->groupBy('entertainments.id')
        ->orderBy('imdb_rating', 'desc')
        ->limit(10) // Adjust limit as needed
        ->get();

        $responseData = TVShowListResource::collection($tvshows);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Tv Shows list.',
        ], 200);
    }

    public function papularTvshow()
    {
        $user = getApiUser();

        $tvshowList = Entertainment::query()
            ->select('entertainments.*')
            ->with('entertainmentGenerMappings', 'plan', 'entertainmentReviews', 'entertainmentTalentMappings', 'season', 'episode')
            ->where('type', 'tvshow')

            ->whereDate('release_date', '<=', Carbon::now())
            ->whereHas('episode')
            ->where('status', 1);

        $topRatedQuery = (clone $tvshowList)->where('imdb_rating', '>=', 9);
        $tvshows = $topRatedQuery->groupBy('entertainments.id')
                ->orderBy('imdb_rating', 'desc')
                ->limit(10) // Adjust limit as needed
                ->get();

        $responseData = TVShowListResource::collection($tvshows);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Tv Shows list.',
        ], 200);
    }

    public function internationalTvshow()
    {
        $user = getApiUser();

        $tvshowList = Entertainment::query()
            ->select('entertainments.*')
            ->with('entertainmentGenerMappings', 'plan', 'entertainmentReviews', 'entertainmentTalentMappings', 'season', 'episode')
            ->where('type', 'tvshow')

            ->whereDate('release_date', '<=', Carbon::now())
            ->whereHas('episode')
            ->where('status', 1);

        $topRatedQuery = (clone $tvshowList)->where('imdb_rating', '>=', 9);
        $tvshows = $topRatedQuery->groupBy('entertainments.id')
                ->where('language', '!=', 'english')
                ->where('IMDb_rating', '>=', 7.0)
                ->orderBy('imdb_rating', 'desc')
                ->take(10)
                ->get();

        $responseData = TVShowListResource::collection($tvshows);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Tv Shows list.',
        ], 200);
    }


}
