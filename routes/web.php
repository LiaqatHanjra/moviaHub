<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CastCrewController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\PodcastController;
use App\Http\Controllers\Admin\GenresController;
use App\Http\Controllers\Admin\TvShowController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\InterviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

// Public storefront. The Vue app opens the browse page here.
Route::view('/', 'frontend')->name('frontend.root');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Registration routes
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Password reset routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login')->with('success', 'You have been successfully logged out.');
})->name('logout')->middleware('auth');

// Route::->group(function () {
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete-image', [ProfileController::class, 'deleteImage'])->name('profile.delete-image');
    Route::get('/change-password', [ProfileController::class, 'changePasswordView'])->name('password.change.show');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('password.change.store');


    // Cast & Crew Routes
    Route::resource('cast-crews', CastCrewController::class);
    Route::get('cast-search', [CastCrewController::class, 'search'])->name('cast.search');

    // Movies Routes
    Route::resource('movies', MovieController::class);
    Route::get('country-search', [MovieController::class, 'countrySearch'])->name('countries.search');
    Route::get('movies/{id}/upload', [MovieController::class, 'showUploadPage'])->name('movies.upload');
    Route::post('movies/{id}/upload-chunk', [MovieController::class, 'uploadChunk'])->name('movies.upload.chunk');
    Route::post('movies/{id}/toggle-status', [MovieController::class, 'toggleStatus'])->name('movies.toggleStatus');
    Route::get('global-search', [MovieController::class, 'globalSearch'])->name('movies.globalSearch');


    Route::resource('genres', GenresController::class);
    Route::get('genre-search', [GenresController::class, 'search'])->name('genres.search');
    Route::post('genres/{id}/toggle-status', [GenresController::class, 'toggleStatus'])->name('genres.toggleStatus');

    // TV Shows Routes
    Route::resource('tvshows', TvShowController::class);
    Route::post('tvshows/{id}/upload-chunk', [TvShowController::class, 'uploadChunk'])->name('tvshows.upload.chunk');
    Route::get('tvshows/{id}/upload', [TvShowController::class, 'showUploadPage'])->name('tvshows.upload');
    Route::post('tvshows/{id}/toggle-status', [TvShowController::class, 'toggleStatus'])->name('tvshows.toggleStatus');

    // Seasons Routes
    Route::resource('seasons', SeasonController::class);
    Route::get('search-tvshows', [SeasonController::class, 'searchTvShows'])->name('search-tvshows');
    Route::get('seasons/by-tvshow/{entertainment_id}', [SeasonController::class, 'byTvShow']);
    Route::get('seasons/{id}/upload', [SeasonController::class, 'showUploadPage'])->name('seasons.upload');
    Route::post('seasons/{id}/upload-chunk', [SeasonController::class, 'uploadChunk'])->name('seasons.upload.chunk');
    Route::post('seasons/{id}/toggle-status', [SeasonController::class, 'toggleStatus'])->name('seasons.toggleStatus');

    // Episodes Routes
    Route::resource('episodes', EpisodeController::class);
    Route::get('episodes/{id}/upload', [EpisodeController::class, 'showUploadPage'])->name('episodes.upload');
    Route::post('episodes/{id}/upload-chunk', [EpisodeController::class, 'uploadChunk'])->name('episodes.upload.file');
    Route::post('episodes/{id}/toggle-status', [EpisodeController::class, 'toggleStatus'])->name('episodes.toggleStatus');

    // Users Routes
    Route::get('users/logs', [UsersController::class, 'adminLogs'])->name('logs');
    Route::resource('users', UsersController::class);
    Route::post('users/{id}/toggle-status', [UsersController::class, 'toggleStatus'])->name('users.toggleStatus');


    // Site Banners Routes
    Route::get('search-entertainment-name', [App\Http\Controllers\Admin\BannerController::class, 'searchEntertainment'])->name('search.entertainment');
    Route::get('site/banners', [App\Http\Controllers\Admin\BannerController::class, 'banners'])->name('site.banners');
    Route::get('site/banners/create', [App\Http\Controllers\Admin\BannerController::class, 'bannerCreate'])->name('site.banners.create');
    Route::post('site/banners/store', [App\Http\Controllers\Admin\BannerController::class, 'bannerStore'])->name('site.banners.store');
    Route::get('site/banners/edit/{id}', [App\Http\Controllers\Admin\BannerController::class, 'banneredit'])->name('site.banners.edit');
    Route::post('site/banners/update/{id}', [App\Http\Controllers\Admin\BannerController::class, 'bannerUpdate'])->name('site.banners.update');
    Route::delete('site/banners/delete/{id}', [App\Http\Controllers\Admin\BannerController::class, 'bannerDelete'])->name('site.banners.delete');
    Route::post('site/banners/toggle-status', [App\Http\Controllers\Admin\BannerController::class, 'toggleStatus'])->name('site.banners.update-status');

    // settings Routes
    Route::get('site/settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'settings'])->name('settings');

    Route::get('site/settings/values/{slug}', [App\Http\Controllers\Admin\SiteSettingController::class, 'getSettingBySlug'])->name('settings.values.show');

    Route::post('site/settings/values', [App\Http\Controllers\Admin\SiteSettingController::class, 'addSettingValues'])->name('settings.values.store');


    // Global Search Routes
    Route::get('/global-search', [App\Http\Controllers\GlobalSearchController::class, 'search'])->name('global.search');
    Route::get('/search-suggestions', [App\Http\Controllers\GlobalSearchController::class, 'suggestions'])->name('search.suggestions');

});

Route::get('run-migrations', function () {
    Artisan::call('migrate');
    return redirect()->back()->with('success', 'Migration completed successfully.');
});
