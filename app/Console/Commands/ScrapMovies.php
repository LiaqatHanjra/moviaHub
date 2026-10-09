<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Entertainment;
use App\Models\Genre;
use App\Models\CastCrew;
use App\Models\Country;
use Carbon\Carbon;
use App\Models\EntertainmentCountry;
use App\Models\EntertainmentGenres;
use App\Models\EntertainmentCast;
use App\Models\EntertainmentStreamLinks;
use Illuminate\Support\Str;

class ScrapMovies extends Command
{
    protected $signature = 'scrape:movies {--limit=20 : Movies to save per language (15-25)}';
    protected $description = 'Scrape movie data from TMDb API for multiple languages and save into the database';

    private $languages = [
         'english' => [
            'language_code' => 'en-US',
            'original_language' => 'en',
            'display_name' => 'English'
        ],
         'hindi' => [
            'language_code' => 'hi-IN',
            'original_language' => 'hi',
            'display_name' => 'Hindi'
        ],
         'korean' => [
            'language_code' => 'ko-KR',
            'original_language' => 'ko',
            'display_name' => 'Korean'
        ],

        'marathi' => [
            'language_code' => 'mr-IN',
            'original_language' => 'mr',
            'display_name' => 'Marathi'
        ],
        'punjabi' => [
            'language_code' => 'pa-IN',
            'original_language' => 'pa',
            'display_name' => 'Punjabi'
        ],
        'gujarati' => [
            'language_code' => 'gu-IN',
            'original_language' => 'gu',
            'display_name' => 'Gujarati'
        ],
    ];

    public function handle()
    {
        $tmdbApiKey = config('services.tmdb.api_key');

        if (empty($tmdbApiKey)) {
            $this->error('TMDb credentials are not configured. Set TMDB_API_KEY in your .env file.');
            return 1;
        }

        $requestedLimit = (int) $this->option('limit');
        $maxMovies = max(15, min(25, $requestedLimit));
        if ($requestedLimit !== $maxMovies) {
            $this->warn("The per-language limit must be between 15 and 25. Using {$maxMovies}.");
        }

        $exitCode = 0;

        foreach ($this->languages as $languageKey => $languageConfig) {
            $this->info("Starting to scrape up to {$maxMovies} {$languageConfig['display_name']} movies...");
            if (!$this->scrapeMoviesForLanguage($tmdbApiKey, $languageConfig, $languageKey, $maxMovies)) {
                $exitCode = 1;
            }
            $this->info("Completed scraping {$languageConfig['display_name']} movies.");
            $this->info("Waiting 2 seconds before moving to next language...");
            sleep(2);
        }

        $this->info('All language scraping completed.');
        return $exitCode;
    }

    private function scrapeMoviesForLanguage($tmdbApiKey, $languageConfig, $languageKey, int $maxMovies): bool
    {
        $page = 1;
        $moviesScraped = 0;
        $requestFailed = false;

        while ($moviesScraped < $maxMovies) {
            $url = "https://api.themoviedb.org/3/discover/movie";
            $this->info("Fetching {$languageConfig['display_name']} movies from TMDb (page $page): $url");

            try {
                $response = $this->tmdbGet($tmdbApiKey, $url, [
                    'language' => $languageConfig['language_code'],
                    'with_original_language' => $languageConfig['original_language'],
                    'page' => $page,
                    'sort_by' => 'popularity.desc',
                ]);
            } catch (\Illuminate\Http\Client\ConnectionException $exception) {
                $this->error("TMDb connection failed for {$languageConfig['display_name']} movies: {$exception->getMessage()}");
                $requestFailed = true;
                break;
            }

            if (!$response->ok()) {
                $this->error("TMDb failed to fetch {$languageConfig['display_name']} movies (HTTP {$response->status()}): " . ($response->json('status_message') ?? $response->body()));
                $requestFailed = true;
                break;
            }

            $data = $response->json();

            if (!isset($data['results']) || !is_array($data['results'])) {
                $this->error("TMDb returned an invalid response for {$languageConfig['display_name']} movies.");
                $requestFailed = true;
                break;
            }

            $movies = $data['results'];
            $count = count($movies);

            if ($count === 0) {
                $this->info("No records found on page $page for {$languageConfig['display_name']}. Ending scrape.");
                break;
            }

            foreach ($movies as $movie) {
                // Stop if we've reached the maximum number of movies
                if ($moviesScraped >= $maxMovies) {
                    break;
                }

                // Skip if tmdb_id is missing
                if (!isset($movie['id'])) {
                    $this->info("TMDb ID not exists for movie. Skipping...");
                    continue;
                }

                // Check if movie already exists in the database
                $entertainment = Entertainment::where('tmdb_id', $movie['id'])
                    ->where('name', $movie['title'])
                    ->first();

                if ($entertainment) {
                    $this->info("Movie with TMDb ID {$movie['id']} and name {$entertainment->name} already exists. Skipping...");
                    continue;
                }

                // Fetch detailed movie data including credits
                try {
                    $movieDetails = $this->tmdbGet($tmdbApiKey, "https://api.themoviedb.org/3/movie/{$movie['id']}", [
                        'language' => $languageConfig['language_code'],
                        'append_to_response' => 'credits,videos',
                    ]);
                } catch (\Illuminate\Http\Client\ConnectionException $exception) {
                    $this->warn("TMDb connection failed for movie ID {$movie['id']}: {$exception->getMessage()}");
                    $requestFailed = true;
                    continue;
                }

                if (!$movieDetails->ok()) {
                    $this->warn("Failed to fetch details for TMDb ID {$movie['id']} (HTTP {$movieDetails->status()}). Skipping...");
                    $requestFailed = true;
                    continue;
                }

                $movieData = $movieDetails->json();

                // Extract trailer URL from videos
                $trailerUrl = null;
                $trailerUrlType = null;

                if (!empty($movieData['videos']['results'])) {
                    foreach ($movieData['videos']['results'] as $video) {
                        // Accept any type of trailer (Trailer, Teaser, etc.)
                        if (in_array($video['type'], ['Trailer', 'Teaser', 'Clip', 'Featurette'])) {
                            if ($video['site'] === 'YouTube') {
                                $trailerUrl = 'https://www.youtube.com/watch?v=' . $video['key'];
                                $trailerUrlType = 'youtube';
                                break;
                            } elseif ($video['site'] === 'Vimeo') {
                                $trailerUrl = 'https://vimeo.com/' . $video['key'];
                                $trailerUrlType = 'vimeo';
                                break;
                            } elseif ($video['site'] === 'Dailymotion') {
                                $trailerUrl = 'https://www.dailymotion.com/video/' . $video['key'];
                                $trailerUrlType = 'dailymotion';
                                break;
                            } else {
                                // For other sites, save the direct URL if available
                                $trailerUrl = $video['key'] ?? null;
                                $trailerUrlType = 'url';
                                break;
                            }
                        }
                    }
                }

                // Convert runtime to HH:MM format
                $runtime = isset($movieData['runtime']) && $movieData['runtime'] > 0
                    ? sprintf('%02d:%02d', floor($movieData['runtime'] / 60), $movieData['runtime'] % 60)
                    : null;

                // Create or update the entertainment record
                $entertainment = Entertainment::updateOrCreate(
                    [
                        'tmdb_id' => $movieData['id'],
                        'name' => $movieData['title'],
                    ],
                    [
                        'type' => 'movie',
                        'slug' => Str::slug($movieData['title']),
                        'description' => $movieData['overview'] ?? '',
                        'IMDb_rating' => isset($movieData['vote_average']) ? (float)$movieData['vote_average'] : null,
                        'release_date' => isset($movieData['release_date']) ? Carbon::parse($movieData['release_date']) : null,
                        'poster_url' => isset($movieData['poster_path']) ? 'https://image.tmdb.org/t/p/original' . $movieData['poster_path'] : '',
                        'thumbnail_url' => isset($movieData['poster_path']) ? 'https://image.tmdb.org/t/p/w500' . $movieData['poster_path'] : '',
                        'duration' => $runtime,
                        'trailer_url' => $trailerUrl,
                        'language' => $languageKey,
                        'trailer_url_type' => $trailerUrlType,
                        'status' => 1,
                    ]
                );

                EntertainmentStreamLinks::updateOrCreate(
                    ['entertainment_id' => $entertainment->id],
                    ['type' => 'url', 'quality' => 'HD', 'url' => $trailerUrl]
                );

                // Handle genres
                $genres = $movieData['genres'] ?? [];
                foreach ($genres as $genre) {
                    $genreModel = Genre::updateOrCreate(
                        ['name' => $genre['name']],
                        ['slug' => Str::slug($genre['name'])]
                    );

                    EntertainmentGenres::updateOrCreate(
                        ['entertainment_id' => $entertainment->id, 'genre_id' => $genreModel->id]
                    );
                }

                // Handle cast
                $cast = $movieData['credits']['cast'] ?? [];
                foreach (array_slice($cast, 0, 10) as $castMember) { // Limit to 10 cast members to avoid excessive data
                    $castModel = CastCrew::updateOrCreate(
                        ['name' => $castMember['name'], 'type' => 'actor'],
                    );

                    EntertainmentCast::updateOrCreate(
                        ['entertainment_id' => $entertainment->id, 'cast_id' => $castModel->id]
                    );
                }

                // Handle directors
                $directors = array_filter($movieData['credits']['crew'] ?? [], fn($crew) => $crew['job'] === 'Director');
                foreach ($directors as $director) {
                    $directorModel = CastCrew::updateOrCreate(
                        ['name' => $director['name'], 'type' => 'director'],
                    );

                    EntertainmentCast::updateOrCreate(
                        ['entertainment_id' => $entertainment->id, 'cast_id' => $directorModel->id]
                    );
                }

                // Handle countries
                $countries = $movieData['production_countries'] ?? [];
                foreach ($countries as $country) {
                    $countryName = $country['name'] ?? '';
                    if (!empty($countryName)) {
                        $countryModel = Country::where('name', $countryName)->first();
                        if ($countryModel) {
                            EntertainmentCountry::updateOrCreate(
                                ['entertainment_id' => $entertainment->id, 'country_id' => $countryModel->id]
                            );
                        }
                    }
                }

                $moviesScraped++;
                $this->info("Added new {$languageConfig['display_name']} movie ({$moviesScraped}/{$maxMovies}): " . ($entertainment->name ?? 'Unknown'));
            }

            // Check for more pages
            $hasMore = $page < $data['total_pages'];
            $this->info("Fetched $count records from page $page for {$languageConfig['display_name']}");

            // Increment page
            $page++;

            // Wait 1 second to respect TMDb rate limits (approx. 50 requests per second)
            if ($hasMore && $moviesScraped < $maxMovies) {
                $this->info('Waiting for 1 second before fetching the next page...');
                sleep(1);
            }
        }

        $this->info("Completed scraping {$moviesScraped} of {$maxMovies} requested {$languageConfig['display_name']} movies.");
        return !$requestFailed;
    }

    private function tmdbGet(string $credential, string $url, array $query = [])
    {
        $request = Http::acceptJson()->timeout(30);

        if (strlen($credential) > 40) {
            return $request->withToken($credential)->get($url, $query);
        }

        return $request->get($url, array_merge($query, ['api_key' => $credential]));
    }
}
