<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EntertainmentView;
use App\Models\Entertainment;
use App\Http\Resources\MovieResource;
use App\Models\EntertainmentGenres;
use App\Http\Resources\TVShowListResource;

class UserController extends Controller
{
    public function suggestedMovies(Request $request)
    {
        $user = getApiUser();

        // 1. Get watched entertainment IDs
        $watchedIds = EntertainmentView::where('user_id', $user->id)
            ->pluck('entertainment_id')
            ->toArray();

        // 2. Get genres of watched movies
        $genreIds = EntertainmentGenres::whereIn('entertainment_id', $watchedIds)
            ->pluck('genre_id')
            ->unique()
            ->toArray();

        // 3. Find other movies in those genres, not already watched
        $tvshows = Entertainment::where('type', 'movie')
            ->where('status', 1)
            ->whereHas('entertainmentGenerMappings', function ($query) use ($genreIds) {
                $query->whereIn('genre_id', $genreIds);
            })
            ->whereNotIn('id', $watchedIds)
            ->with('entertainmentGenerMappings', 'plan', 'entertainmentReviews', 'entertainmentTalentMappings', 'season', 'episode')
            ->limit(20)
            ->get();

            // $suggestedMovies = MovieResource::collection($getMovies);
            $suggestedMovies = MovieResource::collection($tvshows);

        return response()->json([
            'message' => 'Suggested movies retrieved successfully',
            'suggestedMovies' => $suggestedMovies
        ], 200);
    }

    public function suggestedTvshows(Request $request)
    {
        $user = getApiUser();

        // 1. Get watched entertainment IDs
        $watchedIds = EntertainmentView::where('user_id', $user->id)
            ->pluck('entertainment_id')
            ->toArray();

        // 2. Get genres of watched movies
        $genreIds = EntertainmentGenres::whereIn('entertainment_id', $watchedIds)
            ->pluck('genre_id')
            ->unique()
            ->toArray();

        // 3. Find other movies in those genres, not already watched
        $getMovies = Entertainment::where('type', 'tvshow')
            ->where('status', 1)
            ->whereHas('entertainmentGenerMappings', function ($query) use ($genreIds) {
                $query->whereIn('genre_id', $genreIds);
            })
            ->whereNotIn('id', $watchedIds)
            ->with([
                'entertainmentGenerMappings',
                'plan',
                'entertainmentReviews',
                'entertainmentTalentMappings',
                'entertainmentStreamContentMappings',
                'entertainmentDownloadMappings',
            ])
            ->limit(20)
            ->get();

            $suggestedMovies =  TVShowListResource::collection($getMovies);

        return response()->json([
            'message' => 'Suggested movies retrieved successfully',
            'suggestedMovies' => $suggestedMovies
        ], 200);
    }
}
