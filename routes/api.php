<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Artisan;
//

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [App\Http\Controllers\Api\Frontend\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\Api\Frontend\AuthController::class, 'login']);
Route::post('forgot-password', [App\Http\Controllers\Api\Frontend\AuthController::class, 'sendResetLinkEmail']);
Route::post('reset-password', [App\Http\Controllers\Api\Frontend\AuthController::class, 'resetPassword']);

Route::get('/top-10-movies', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'top10Movies']);
Route::get('/latest-movies', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'latestMovies']);
Route::get('/papuler-movies', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'papulerMovies']);
Route::get('/papuler-tvshow', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'papulerTvshows']);
Route::get('/banners', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'banners']);
Route::get('/movie-banner', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'getMovieBanner']);
Route::get('/tvshow-banner', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'getTvShowBanners']);
Route::get('/genres', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'getGenres']);

// Helper function to define content routes with conditional middleware
Route::middleware('auth:sanctum')->group(function () {

    Route::post('change-password', [App\Http\Controllers\Api\Frontend\AuthController::class, 'changePassword']);

    // Route::middleware(['profile.access'])->group(function () {

        Route::prefix('profile')->group(function () {
            Route::get('/', [App\Http\Controllers\Api\Frontend\ProfileController::class, 'getProfile']);
            Route::post('/update', [App\Http\Controllers\Api\Frontend\ProfileController::class, 'updateProfile']);
        });


        Route::get('movies', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'getMovies']);
        Route::get('movies/{id}', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'movieDetails']);
        Route::post('movies/save-view', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'saveMovieViews']);
        Route::get('movies-search', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'searchMovies']);

        // Genres Wise Movies

        Route::get('/action-movies', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'actionMovies']);
        Route::get('/animation-movies', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'animationMovies']);
        Route::get('/comedy-movies', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'comedyMovies']);
        Route::get('/horror-movies', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'horrorMovies']);
        Route::get('/romantic-movies', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'romanticMovies']);
        Route::get('/drama-movies', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'dramaMovies']);
        Route::get('/romance-movies', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'romanceMovies']);

        Route::get('/favorite-cast', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'getFavoriteCast']);
        Route::get('/movies-genres', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'getMovieGenre']);

        Route::get('/destination-movies', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'destinationMovies']);


        Route::get('/suggested-movies', [App\Http\Controllers\Api\Frontend\UserController::class, 'suggestedMovies']);
        Route::get('/top-movies-list', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'latestMovies']);
        Route::get('/global-search', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'globalSearch']);
        Route::get('/cast-list', [App\Http\Controllers\Api\Frontend\MovieResourceController::class, 'getCast']);
        // Continue Watch List
        Route::prefix('watch')->group(function () {
            Route::get('/continue-list', [App\Http\Controllers\Api\Frontend\WatchListController::class, 'ContinueWatchList']);
            Route::post('/continue-save', [App\Http\Controllers\Api\Frontend\WatchListController::class, 'saveContinueWatch']);
            Route::post('/continue-delete', [App\Http\Controllers\Api\Frontend\WatchListController::class, 'deleteContinueWatch']);
            Route::get('/list', [App\Http\Controllers\Api\Frontend\WatchListController::class, 'watchList']);
            Route::post('/list-save', [App\Http\Controllers\Api\Frontend\WatchListController::class, 'saveWatchList']);
            Route::post('/list-delete', [App\Http\Controllers\Api\Frontend\WatchListController::class, 'deleteWatchList']);
        });


        // TV Shows Routes
        Route::prefix('tvshows')->group(function () {
            Route::get('/', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'tvshowList']);
            Route::get('/{id}', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'tvshowDetails']);
            Route::get('/episode/{id}', [App\Http\Controllers\Api\Frontend\TvShowController::class, 'episodeDetails']);
        });

        Route::get('/tvshows-search', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'searchtvshows']);

        Route::get('/top-tvshow', [App\Http\Controllers\Api\Frontend\TvShowController::class, 'getTopTvshow']);

        Route::get('/papular-tvshow', [App\Http\Controllers\Api\Frontend\TvShowController::class, 'papularTvshow']);
        Route::get('/international-tvshow', [App\Http\Controllers\Api\Frontend\TvShowController::class, 'internationalTvshow']);
        Route::get('/suggested-tvshows', [App\Http\Controllers\Api\Frontend\UserController::class, 'suggestedTvshows']);


        // Reviews Routes
        Route::get('/reviews', [App\Http\Controllers\Api\Frontend\RewiewController::class, 'getRating']);
        Route::post('/save-reviews', [App\Http\Controllers\Api\Frontend\RewiewController::class, 'saveRating']);
        Route::post('/update-reviews', [App\Http\Controllers\Api\Frontend\RewiewController::class, 'update']);
        Route::post('/delete-reviews/{id}', [App\Http\Controllers\Api\Frontend\RewiewController::class, 'deleteRating']);
        Route::post('/save-likes', [App\Http\Controllers\Api\Frontend\RewiewController::class, 'saveLikes']);
        Route::post('save-download', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'saveDownload']);
        Route::post('delete-download', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'deleteDownload']);

        Route::get('/download-list', [App\Http\Controllers\Api\Frontend\MoviesController::class, 'downloadList']);

        Route::get('/favorite-personalities', [App\Http\Controllers\Api\Frontend\FavoritePersonalityController::class, 'index']);
        Route::post('/favorite-personalities', [App\Http\Controllers\Api\Frontend\FavoritePersonalityController::class, 'store']);
        Route::delete('/favorite-personalities/{id}', [App\Http\Controllers\Api\Frontend\FavoritePersonalityController::class, 'destroy']);

    // });


});

Route::get('test', function () {
    $data = [
        'message' => 'success'
    ];
    return response()->json($data);
});

Route::get('/run-migrations', function (){
    Artisan::call('migrate', ['--force' => true]);
    return 'Migrations run successfully!';
});
