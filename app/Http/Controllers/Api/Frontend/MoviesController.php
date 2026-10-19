<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entertainment;
use Carbon\Carbon;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MoviDetailResource;
use App\Models\ContinueWatch;
use App\Http\Resources\TVShowListResource;
use App\Models\WatchList;
use App\Models\Like;
use App\Http\Resources\TvshowDetailResource;
use App\Models\EntertainmentGenres;
use App\Models\Genre;
use App\Models\EntertainmentDownload;
use App\Models\EntertainmentView;
use App\Models\SiteSetting;
use App\Models\Banner;

class MoviesController extends Controller
{

    public function getMovies(Request $request)
    {
        $user = getApiUser();
        $movieList = Entertainment::where('status', 1);


        $movieList = $movieList->where('status', 1)
            ->whereDate('release_date', '<=', Carbon::now())
            ->with([
                'entertainmentGenerMappings',
                'plan',
                'entertainmentReviews',
                'entertainmentTalentMappings',
                'entertainmentStreamContentMappings',
                'entertainmentDownloadMappings',
            ]);

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $movieList->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('genre_id')) {
            $genreId = $request->genre_id;
            $movieList->whereHas('entertainmentGenerMappings', function ($query) use ($genreId) {
                $query->where('genre_id', $genreId);
            });
        }

        if ($request->filled('actor_id')) {
            $actorId = $request->actor_id;
            $movieList->whereHas('entertainmentTalentMappings', function ($query) use ($actorId) {
                $query->where('talent_id', $actorId);
            })->where('type', 'movie');
        }

        if ($request->filled('language')) {
            $movieList->where('language', $request->language);
        }

        $movies = $movieList->distinct('id')
            ->orderBy('release_date', 'desc')
            ->paginate(20);

        $responseData = MovieResource::collection($movies);

        return response()->json([
            'status' => true,
            'data' => $responseData->items(),
            'pagination' => [
                'current_page' => $responseData->currentPage(),
                'last_page' => $responseData->lastPage(),
                'per_page' => $responseData->perPage(),
                'total' => $responseData->total(),
            ],
            'message' => 'Movies list.',
        ], 200);
    }


    public function searchMovies(Request $request)
    {
        $movieList = Entertainment::where('status', 1);


        $movieList = $movieList->where('status', 1)
            ->whereDate('release_date', '<=', Carbon::now())
            ->with([
                'entertainmentGenerMappings',
                'plan',
                'entertainmentReviews',
                'entertainmentTalentMappings',
                'entertainmentStreamContentMappings',
                'entertainmentDownloadMappings',
            ]);

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $movieList->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('genre_id')) {
            $genreId = $request->genre_id;
            $movieList->whereHas('entertainmentGenerMappings', function ($query) use ($genreId) {
                $query->where('genre_id', $genreId);
            });
        }

        if ($request->filled('actor_id')) {
            $actorId = $request->actor_id;
            $movieList->whereHas('entertainmentTalentMappings', function ($query) use ($actorId) {
                $query->where('talent_id', $actorId);
            })->where('type', 'movie');
        }

        if ($request->filled('language')) {
            $movieList->where('language', $request->language);
        }

        $movies = $movieList->distinct('id')
            ->orderBy('release_date', 'desc')
            ->limit(20)
            ->get();

        $responseData = MovieResource::collection($movies);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Movies search list.',
        ], 200);
    }

    public function movieDetails(Request $request, $movie_id)
    {
        $user = getApiUser();
        $movieId = $movie_id;
        $movie = Entertainment::where('id', $movieId)->with('entertainmentGenerMappings', 'entertainmentReviews', 'entertainmentTalentMappings', 'entertainmentStreamContentMappings', 'entertainmentDownloadMappings', 'entertainmentLike')->first();


        $continue_watch = ContinueWatch::where('user_id', $user->id)
            ->where('entertainment_id', $movie->id)
            ->first();
        if ($continue_watch) {
            $movie['continue_watch'] = $continue_watch;
        }
        

        $movie['reviews'] = $movie->entertainmentReviews ?? null;

        $responseData = new MoviDetailResource($movie);
        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Movie details.',
        ], 200);
    }

    public function tvshowList(Request $request)
    {
        $user = getApiUser();
        $perPage = $request->input('per_page', 10);

        $tvshowList = Entertainment::query()
            ->select('entertainments.*')
            ->with('entertainmentGenerMappings', 'plan', 'entertainmentReviews', 'entertainmentTalentMappings', 'season', 'episode')
            ->where('type', 'tvshow')
            ->whereDate('release_date', '<=', Carbon::now())
            ->whereHas('episode')
            ->where('status', 1);

        // Existing filters
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $tvshowList->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('genre_id')) {
            $genreId = $request->genre_id;
            $tvshowList->whereHas('entertainmentGenerMappings', function ($query) use ($genreId) {
                $query->where('genre_id', $genreId);
            });
        }

        if ($request->filled('actor_id')) {
            $actorId = $request->actor_id;
            $tvshowList->whereHas('entertainmentTalentMappings', function ($query) use ($actorId) {
                $query->where('talent_id', $actorId);
            });
        }

        $tvshows = $tvshowList->groupBy('entertainments.id')
            ->orderBy('id','desc')
            ->paginate($perPage);

        $responseData = TVShowListResource::collection($tvshows);

        return response()->json([
            'status' => true,
            'data' => $responseData->items(),
            'pagination' => [
                'current_page' => $responseData->currentPage(),
                'last_page' => $responseData->lastPage(),
                'per_page' => $responseData->perPage(),
                'total' => $responseData->total(),
            ],
            'message' => 'Tv Shows list.',
        ], 200);
    }

    public function searchtvshows(Request $request)
    {

        $tvshowList = Entertainment::query()
            ->select('entertainments.*')
            ->with('entertainmentGenerMappings', 'plan', 'entertainmentReviews', 'entertainmentTalentMappings', 'season', 'episode')
            ->where('type', 'tvshow')
            ->whereDate('release_date', '<=', Carbon::now())
            ->whereHas('episode')
            ->where('status', 1);

        // Existing filters
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $tvshowList->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('genre_id')) {
            $genreId = $request->genre_id;
            $tvshowList->whereHas('entertainmentGenerMappings', function ($query) use ($genreId) {
                $query->where('genre_id', $genreId);
            });
        }

        if ($request->filled('actor_id')) {
            $actorId = $request->actor_id;
            $tvshowList->whereHas('entertainmentTalentMappings', function ($query) use ($actorId) {
                $query->where('talent_id', $actorId);
            });
        }

        $tvshows = $tvshowList->groupBy('entertainments.id')
            ->orderBy('release_date', 'desc')
            ->limit(20)
            ->get();

        $responseData = TVShowListResource::collection($tvshows);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Tv Shows search list.',
        ], 200);
    }

    public function tvshowDetails(Request $request, $tvshow_id)
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $tvshow = Entertainment::where('id', $tvshow_id)
                                ->with(
                                    'entertainmentGenerMappings',
                                    'plan',
                                    'entertainmentReviews',
                                    'entertainmentTalentMappings',
                                    'season',
                                    'episode'
                                )
                                ->first();
        $tvshow['reviews'] = $tvshow->entertainmentReviews ?? null;

        if ($request->has('user_id')) {
            $user_id = $request->user_id;
            $tvshow['user_id'] = $user_id;

            // Use helper function to get active profile ID
            $profileId = getActiveProfileId($request, $request->profile_id);

            if ($profileId) {
                $tvshow['is_watch_list'] = WatchList::where('entertainment_id', $request->tvshow_id)
                    ->where('user_id', $user_id)
                    ->where('profile_id', $profileId)
                    ->exists();
                $tvshow['is_likes'] = Like::where('entertainment_id', $request->tvshow_id)
                    ->where('user_id', $user_id)
                    ->where('profile_id', $profileId)
                    ->where('is_like', 1)
                    ->exists();
            } else {
                $tvshow['is_watch_list'] = false;
                $tvshow['is_likes'] = false;
            }

            $tvshow['your_review'] =  $tvshow->entertainmentReviews ? $tvshow->entertainmentReviews->where('user_id', $user_id)->first() : null;

            if ($tvshow['your_review']) {
                $tvshow['reviews'] = $tvshow['reviews']->where('user_id', '!=', $user_id);
            }
        }

        $tvshow['is_play'] = $currentPlanId >= $tvshow->plan_id ? 1 : 0;

        $responseData = new TvshowDetailResource($tvshow);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Tv Show datails.',
        ], 200);
    }

    public function top10Movies()
    {
            $top_10=[];
            $movieIds = SiteSetting::getValueBySlug('top-10');
            if($movieIds != null){
                $topMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1)->get();
                $top_10 = MovieResource::collection($topMovies);
                $top_10 = $top_10->toArray(request());

            }

            return response()->json([$top_10]);
    }

    public function latestMovies()
    {
            $latest_movies=[];
            $movieIds = SiteSetting::getValueBySlug('latest-movies');
            if($movieIds != null){
                $topMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1)->get();
                $latest_movies = MovieResource::collection($topMovies);
                $latest_movies = $latest_movies->toArray(request());

            }

            return response()->json([$latest_movies]);
    }

    public function papulerMovies()
    {
            $papuler_movies=[];
            $movieIds = SiteSetting::getValueBySlug('popular-movies');
            if($movieIds != null){
                $topMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1)->get();
                $papuler_movies = MovieResource::collection($topMovies);
                $papuler_movies = $papuler_movies->toArray(request());

            }

            return response()->json([$papuler_movies]);
    }

    public function papulerTvshows()
    {
            $papuler_tvshows=[];
            $movieIds = SiteSetting::getValueBySlug('popular-tv-shows');
            if($movieIds != null){
                $topMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1)->get();
                $papuler_tvshows = MovieResource::collection($topMovies);
                $papuler_tvshows = $papuler_tvshows->toArray(request());

            }

            return response()->json([$papuler_tvshows]);
    }

    public function downloadList(Request $request)
    {
        $user = getApiuser();

        $downloadMovieList = EntertainmentDownload::where('user_id', $user->id)
                                                    ->where('is_download', 1)
                                                    ->get();

        $movieIds = $downloadMovieList->pluck('entertainment_id')->toArray();

        $downloadMovies = Entertainment::whereIn('id', $movieIds)->get();

        $responseData = MovieResource::collection($downloadMovies);

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => 'Download movies list.',
        ], 200);
    }

    public function saveDownload(Request $request)
    {
        $user = getApiuser();
        $download_data = $request->all();
        $download_data['user_id'] = $user->id;

        $download = EntertainmentDownload::where('entertainment_id', $request->entertainment_id)
                                            ->where('user_id', $user->id)
                                            ->where('entertainment_type', $request->entertainment_type)
                                            ->first();
        if ($request->is_download == 1) {
            if (!$download) {
                $result = EntertainmentDownload::updateOrCreate($download_data);
                return response()->json(['status' => true, 'message' => 'Movie added in download list.']);
            } else {
                return response()->json(['status' => true, 'message' => 'Movie already in download list.']);
            }
        } else {
            $download->update([
                'is_download' => 0
            ]);

            return response()->json(['status' => true, 'message' => 'Movie removed from download list.']);
        }

    }

    public function deleteDownload(Request $request)
    {
        $user = getApiuser();
        $download = EntertainmentDownload::where('entertainment_id', $request->entertainment_id)
                                            ->where('user_id', $user->id)
                                            ->where('entertainment_type', $request->entertainment_type)
                                            ->first();
        if (!$download) {
            return response()->json(['status'=> true, 'message'=> 'Movie not exist in your download list!']);
        }

        $download->delete();

        return response()->json(['status'=> true, 'message'=> 'Movie delete into your download list.']);

    }

    public function saveMovieViews(Request $request)
    {
        $user = getApiUser();
        $entertainment = Entertainment::find($request->entertainment_id);
        if (!$entertainment) {
            return response()->json([
                'status' => false,
                'message' => 'Entertainment not found'
            ], 404);
        }

        $existingView = EntertainmentView::where('user_id', $user->id)
            ->where('entertainment_id', $request->entertainment_id)
            ->first();

        if ($existingView) {
            $existingView->update([
                'view_count' => $existingView->view_count + 1,
                'last_watched_at' => now()
            ]);
        } else {
            EntertainmentView::create([
                'user_id' => $user->id,
                'entertainment_id' => $request->entertainment_id,
                'view_count' => 1,
                'last_watched_at' => now()
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'View saved successfully'
        ], 200);
    }

    public function getMovieWithProfileData(Request $request, $movie_id)
    {
        $user = getApiUser();

        // Get the active profile using helper function
        $activeProfile = $request->profile_id;

        if (!$activeProfile) {
            return response()->json([
                'status' => false,
                'message' => 'Valid profile ID is required'
            ], 400);
        }

        $movie = Entertainment::where('id', $movie_id)
            ->with([
                'entertainmentGenerMappings',
                'plan',
                'entertainmentReviews',
                'entertainmentTalentMappings',
                'entertainmentStreamContentMappings',
                'entertainmentDownloadMappings',
                'entertainmentLike'
            ])
            ->first();

        if (!$movie) {
            return response()->json([
                'status' => false,
                'message' => 'Movie not found'
            ], 404);
        }

        // Get continue watch data for this specific profile
        $continueWatch = ContinueWatch::where('user_id', $user->id)
            ->where('profile_id', $activeProfile->id)
            ->where('entertainment_id', $movie->id)
            ->first();

        if ($continueWatch) {
            $movie['continue_watch'] = $continueWatch;
        }

        // Add profile information to response
        $movie['active_profile'] = [
            'id' => $activeProfile->id,
            'name' => $activeProfile->name,
            'avatar' => $activeProfile->avatar,
            'user_type' => $activeProfile->user_type,
            'is_kid' => $activeProfile->isKid
        ];

        return response()->json([
            'status' => true,
            'data' => $movie,
            'message' => 'Movie details retrieved successfully'
        ], 200);
    }

    public function getMovieBanner(Request $request)
    {
        $banners = Banner::where('type', 'movie')->where('status', 1)->get();
        $movieIds = $banners->pluck('type_id')->toArray();

        $movies = Entertainment::whereIn('id', $movieIds)->where('status', 1)->get();
        $moviesResource = MovieResource::collection($movies);
        return response()->json([
            'status' => true,
            'data' => $moviesResource,
            'message' => 'Banners movies list.',
        ], 200);
    }

}
