<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Http\Resources\MovieResource;
use App\Models\EntertainmentGenres;
use App\Models\Genre;
use App\Models\Banner;
use App\Models\CastCrew;
use App\Http\Resources\TVShowListResource;
use App\Http\Resources\EpisodesResource;

class MovieResourceController extends Controller
{
    public function actionMovies()
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $genre = Genre::where('slug', 'action')->first();
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => __('movie.genre_not_found'),
            ], 404);
        }
        $movieIds = EntertainmentGenres::where('genre_id', $genre->id)->pluck('entertainment_id')->toArray();
        $actionMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1);

        $actionMovies = $actionMovies->paginate(10);
        $moviesResource = MovieResource::collection($actionMovies);

        return response()->json([
            'status' => true,
            'data' =>  $moviesResource->items(),
            'pagination' => [
                'current_page' => $actionMovies->currentPage(),
                'last_page' => $actionMovies->lastPage(),
                'per_page' => $actionMovies->perPage(),
                'total' => $actionMovies->total(),
            ],
            'message' => 'Action movies list.',
        ], 200);
    }

    public function animationMovies()
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $genre = Genre::where('slug', 'animation')->first();
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => __('movie.genre_not_found'),
            ], 404);
        }

        $movieIds = EntertainmentGenres::where('genre_id', $genre->id)
                                            ->pluck('entertainment_id')
                                            ->toArray();
        $animationMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1);
        $animationMovies = $animationMovies->paginate(10);
        $moviesResource = MovieResource::collection($animationMovies);

        return response()->json([
            'status' => true,
            'data' => $moviesResource->items(),
            'pagination' => [
                'current_page' => $animationMovies->currentPage(),
                'last_page' => $animationMovies->lastPage(),
                'per_page' => $animationMovies->perPage(),
                'total' => $animationMovies->total(),
            ],
            'message' => 'Animation movies list.',
        ], 200);
    }

    public function comedyMovies()
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $genre = Genre::where('slug', 'comedy')->first();
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => __('movie.genre_not_found'),
            ], 404);
        }
        $movieIds = EntertainmentGenres::where('genre_id', $genre->id)->pluck('entertainment_id')->toArray();
        $comedyMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1);

        $comedyMovies = $comedyMovies->paginate(10);
        $moviesResource = MovieResource::collection($comedyMovies);

        return response()->json([
            'status' => true,
            'data' => $moviesResource->items(),
            'pagination' => [
                'current_page' => $comedyMovies->currentPage(),
                'last_page' => $comedyMovies->lastPage(),
                'per_page' => $comedyMovies->perPage(),
                'total' => $comedyMovies->total(),
            ],
            'message' => 'Comedy movies list.',
        ], 200);
    }

    public function horrorMovies()
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $genre = Genre::where('slug', 'horror')->first();
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => __('movie.genre_not_found'),
            ], 404);
        }
        $movieIds = EntertainmentGenres::where('genre_id', $genre->id)->pluck('entertainment_id')->toArray();
        $horrorMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1);

        $horrorMovies = $horrorMovies->paginate(10);
        $moviesResource = MovieResource::collection($horrorMovies);

        return response()->json([
            'status' => true,
            'data' => $moviesResource->items(),
            'pagination' => [
                'current_page' => $horrorMovies->currentPage(),
                'last_page' => $horrorMovies->lastPage(),
                'per_page' => $horrorMovies->perPage(),
                'total' => $horrorMovies->total(),
            ],
            'message' => 'Horror movies list.',
        ], 200);
    }

    public function romanticMovies()
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $genre = Genre::where('slug', 'romantic')->first();
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => __('movie.genre_not_found'),
            ], 404);
        }
        $movieIds = EntertainmentGenres::where('genre_id', $genre->id)->pluck('entertainment_id')->toArray();
        $romanticMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1);

        $romanticMovies = $romanticMovies->paginate(10);
        $moviesResource = MovieResource::collection($romanticMovies);

        return response()->json([
            'status' => true,
            'data' => $moviesResource->items(),
            'pagination' => [
                'current_page' => $romanticMovies->currentPage(),
                'last_page' => $romanticMovies->lastPage(),
                'per_page' => $romanticMovies->perPage(),
                'total' => $romanticMovies->total(),
            ],
            'message' => 'Romantic movies list.',
        ], 200);
    }

    public function dramaMovies()
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $genre = Genre::where('slug', 'drama')->first();
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => __('movie.genre_not_found'),
            ], 404);
        }
        $movieIds = EntertainmentGenres::where('genre_id', $genre->id)->pluck('entertainment_id')->toArray();
        $dramaMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1);

        $dramaMovies = $dramaMovies->paginate(10);
        $moviesResource = MovieResource::collection($dramaMovies);

        return response()->json([
            'status' => true,
            'data' => $moviesResource->items(),
            'pagination' => [
                'current_page' => $dramaMovies->currentPage(),
                'last_page' => $dramaMovies->lastPage(),
                'per_page' => $dramaMovies->perPage(),
                'total' => $dramaMovies->total(),
            ],
            'message' => 'Drama movies list.', // Corrected typo from 'Darama' to 'Drama'
        ], 200);
    }

    public function romanceMovies()
    {
        $user = getApiUser();
        $currentPlanId = $user->getCurrentPlan();

        $genre = Genre::where('slug', 'romance')->first();
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => __('movie.genre_not_found'),
            ], 404);
        }
        $movieIds = EntertainmentGenres::where('genre_id', $genre->id)->pluck('entertainment_id')->toArray();
        $romanceMovies = Entertainment::whereIn('id', $movieIds)->where('status', 1);

        $romanceMovies = $romanceMovies->paginate(10);
        $moviesResource = MovieResource::collection($romanceMovies);

        return response()->json([
            'status' => true,
            'data' => $moviesResource->items(),
            'pagination' => [
                'current_page' => $romanceMovies->currentPage(),
                'last_page' => $romanceMovies->lastPage(),
                'per_page' => $romanceMovies->perPage(),
                'total' => $romanceMovies->total(),
            ],
            'message' => 'Romance movies list.',
        ], 200);
    }

    public function banners()
    {
        $banners = Banner::where('status', 1)->get();
        $movieIds = $banners->pluck('type_id')->toArray();

        $movies = Entertainment::whereIn('id', $movieIds)->where('status', 1)->get();
        $moviesResource = MovieResource::collection($movies);
        return response()->json([
            'status' => true,
            'data' => $moviesResource,
            'message' => 'Banners movies list.',
        ], 200);
    }

    public function getTvShowBanners()
    {
        $banners = Banner::where('status', 1)->where('type', 'tvshow')->get();
        $movieIds = $banners->pluck('type_id')->toArray();

        $movies = Entertainment::whereIn('id', $movieIds)->where('status', 1)->get();
        $moviesResource = MovieResource::collection($movies);
        return response()->json([
            'status' => true,
            'data' => $moviesResource,
            'message' => 'Banners tv show list.',
        ], 200);
    }


    public function getFavoriteCast()
    {
        $casts = CastCrew::whereNotNull('file_url')->limit(20)->get();
        return response()->json([
            'status' => true,
            'data' => $casts,
            'message' => 'Favorite Cast list.',
        ], 200);
    }

    public function getMovieGenre()
    {
        $genres = Genre::where('status', 1)
                        ->orderBy('id', 'desc')
                        ->get();
        return response()->json([
            'status' => true,
            'data' => $genres,
            'message' => 'Genres list.',
        ], 200);
    }

    public function destinationMovies()
    {
        $user = getApiUser();
        $destinationMovies = Entertainment::where('type', 'movie')
                                           ->where('status', 1)
                                           ->orderBy('created_at', 'desc')
                                           ->limit(15)
                                           ->get();
        $moviesResource = MovieResource::collection($destinationMovies);

        return response()->json([
            'status' => true,
            'data' =>  $moviesResource,
            'message' => 'Destination movies list.',
        ], 200);
    }

    public function globalSearch(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:2|max:100',
        ]);

        $query = $request->input('search');
        $user = getApiUser();

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

        $moviesResource = MovieResource::collection($movies);
        $tvShowsResource = TVShowListResource::collection($tvShows);
        $episodesResource = EpisodesResource::collection($episodes);

        return response()->json([
            'status' => true,
            'movies' => $moviesResource,
            'tvShows' => $tvShowsResource,
            'seasons' => $seasons,
            'episodes' => $episodesResource,
            'message' => 'Global search results found.',
        ], 200);
    }

    public function getCast()
    {
        $casts = CastCrew::whereNotNull('file_url')->limit(50)->get();
        return response()->json([
            'status' => true,
            'data' => $casts,
            'message' => 'Cast list.',
        ], 200);
    }

    public function getGenres()
    {
        $genres = Genre::where('status', 1)->get();
        return response()->json([
            'status' => true,
            'data' => $genres,
            'message' => 'Genres list.',
        ], 200);
    }
}
