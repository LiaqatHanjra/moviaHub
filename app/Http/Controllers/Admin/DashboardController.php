<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Models\Episode;
use App\Models\Season;
use App\Models\CastCrew;
use App\Models\Genre;
use App\Models\Country;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = Entertainment::where('type', 'movie')->count();
        $tvShows = Entertainment::where('type', 'tvshow')->count();
        $episodes = Episode::count();
        $seasons = Season::count();
        $castCrews = CastCrew::count();
        $genres = Genre::count();
        $countries = Country::count();

        // Dynamic percentage calculation (year-over-year)
        $currentYear = now()->year;
        $lastYear = $currentYear - 1;

        $moviesThisYear = Entertainment::where('type', 'movie')->whereYear('created_at', $currentYear)->count();
        $moviesLastYear = Entertainment::where('type', 'movie')->whereYear('created_at', $lastYear)->count();
        $moviesPercent = $moviesLastYear > 0 ? round((($moviesThisYear - $moviesLastYear) / $moviesLastYear) * 100, 1) : ($moviesThisYear > 0 ? 100 : 0);

        $tvShowsThisYear = Entertainment::where('type', 'tvshow')->whereYear('created_at', $currentYear)->count();
        $tvShowsLastYear = Entertainment::where('type', 'tvshow')->whereYear('created_at', $lastYear)->count();
        $tvShowsPercent = $tvShowsLastYear > 0 ? round((($tvShowsThisYear - $tvShowsLastYear) / $tvShowsLastYear) * 100, 1) : ($tvShowsThisYear > 0 ? 100 : 0);

        $episodesThisYear = Episode::whereYear('created_at', $currentYear)->count();
        $episodesLastYear = Episode::whereYear('created_at', $lastYear)->count();
        $episodesPercent = $episodesLastYear > 0 ? round((($episodesThisYear - $episodesLastYear) / $episodesLastYear) * 100, 1) : ($episodesThisYear > 0 ? 100 : 0);

        $seasonsThisYear = Season::whereYear('created_at', $currentYear)->count();
        $seasonsLastYear = Season::whereYear('created_at', $lastYear)->count();
        $seasonsPercent = $seasonsLastYear > 0 ? round((($seasonsThisYear - $seasonsLastYear) / $seasonsLastYear) * 100, 1) : ($seasonsThisYear > 0 ? 100 : 0);

        return view('dashboard', compact(
            'movies', 'tvShows', 'episodes', 'seasons', 'castCrews', 'genres', 'countries',
            'moviesPercent', 'tvShowsPercent', 'episodesPercent', 'seasonsPercent'
        ));
    }
}
