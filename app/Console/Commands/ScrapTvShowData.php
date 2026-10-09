<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Entertainment;
use App\Models\Episode;
use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ScrapTvShowData extends Command
{
    protected $signature = 'scrap:tvshows';
    protected $description = 'Fetch TV shows and episodes from TMDb and save them to the database';

    private $languages = [
        'english' => [
            'language_code' => 'en-US',
            'original_language' => 'en',
            'display_name' => 'English'
        ],
        'korean' => [
            'language_code' => 'ko-KR',
            'original_language' => 'ko',
            'display_name' => 'Korean'
        ],
        'hindi' => [
            'language_code' => 'hi-IN',
            'original_language' => 'hi',
            'display_name' => 'Hindi'
        ],
        'chinese' => [
            'language_code' => 'zh-CN',
            'original_language' => 'zh',
            'display_name' => 'Chinese'
        ],
        'japanese' => [
            'language_code' => 'ja-JP',
            'original_language' => 'ja',
            'display_name' => 'Japanese'
        ],
        'spanish' => [
            'language_code' => 'es-ES',
            'original_language' => 'es',
            'display_name' => 'Spanish'
        ],
        'french' => [
            'language_code' => 'fr-FR',
            'original_language' => 'fr',
            'display_name' => 'French'
        ],
        'russian' => [
            'language_code' => 'ru-RU',
            'original_language' => 'ru',
            'display_name' => 'Russian'
        ],
        'turkish' => [
            'language_code' => 'tr-TR',
            'original_language' => 'tr',
            'display_name' => 'Turkish'
        ],
    ];

    public function handle()
    {
        $tmdbApiKey = config('services.tmdb.api_key');

        if (empty($tmdbApiKey)) {
            $this->error('TMDb credentials are not configured. Set TMDB_API_KEY in your .env file.');
            return 1;
        }

        $exitCode = 0;

        foreach ($this->languages as $languageKey => $languageConfig) {
            $this->info("Fetching {$languageConfig['display_name']} drama TV shows...");
            if (!$this->scrapeTvShowsForLanguage($tmdbApiKey, $languageConfig, $languageKey)) {
                $exitCode = 1;
            }
            $this->info("Completed scraping {$languageConfig['display_name']} drama TV shows.");
            $this->info("Waiting 2 seconds before moving to next language...");
            sleep(2);
        }

        $this->info('All language TV show fetching and saving completed.');
        return $exitCode;
    }

    private function scrapeTvShowsForLanguage(string $tmdbApiKey, array $languageConfig, string $languageKey): bool
    {
        $page = 1;
        $tvShowsScraped = 0;
        $maxTvShows = 10;
        $requestFailed = false;

        while ($tvShowsScraped < $maxTvShows) {
            $url = "https://api.themoviedb.org/3/discover/tv";
            $this->info("Fetching {$languageConfig['display_name']} drama TV shows from TMDb (page $page): $url");

            try {
                $response = $this->tmdbGet($tmdbApiKey, $url, [
                    'language' => $languageConfig['language_code'],
                    'with_original_language' => $languageConfig['original_language'],
                    'with_genres' => '18',
                    'page' => $page,
                    'sort_by' => 'popularity.desc',
                ]);
            } catch (\Illuminate\Http\Client\ConnectionException $exception) {
                $this->error("TMDb connection failed for {$languageConfig['display_name']}: {$exception->getMessage()}");
                $requestFailed = true;
                break;
            }

            if (!$response->ok()) {
                $this->error("TMDb failed to fetch {$languageConfig['display_name']} shows (HTTP {$response->status()}): " . ($response->json('status_message') ?? $response->body()));
                $requestFailed = true;
                break;
            }

            $data = $response->json();

            if (!isset($data['results']) || !is_array($data['results'])) {
                $this->error("TMDb returned an invalid response for {$languageConfig['display_name']} shows.");
                $requestFailed = true;
                break;
            }

            $tvShows = $data['results'];
            $count = count($tvShows);

            if ($count === 0) {
                $this->info("No records found on page $page for {$languageConfig['display_name']}. Ending scrape.");
                break;
            }

            foreach ($tvShows as $tvShow) {
                // Stop if we've reached the maximum number of TV shows
                if ($tvShowsScraped >= $maxTvShows) {
                    break;
                }

                // Skip if tmdb_id is missing
                if (!isset($tvShow['id'])) {
                    $this->info("TMDb ID not exists for TV show. Skipping...");
                    continue;
                }

                try {
                    $tvShowDetails = $this->tmdbGet($tmdbApiKey, "https://api.themoviedb.org/3/tv/{$tvShow['id']}", [
                        'language' => $languageConfig['language_code'],
                        'append_to_response' => 'credits,videos',
                    ]);
                } catch (\Illuminate\Http\Client\ConnectionException $exception) {
                    $this->warn("TMDb connection failed for show ID {$tvShow['id']}: {$exception->getMessage()}");
                    $requestFailed = true;
                    continue;
                }

                if (!$tvShowDetails->ok()) {
                    $this->warn("Failed to fetch details for TMDb ID {$tvShow['id']} (HTTP {$tvShowDetails->status()}). Skipping...");
                    $requestFailed = true;
                    continue;
                }

                $tvShowData = $tvShowDetails->json();

                $title = $tvShowData['name'] ?? $tvShow['name'] ?? null;
                if (empty($title)) {
                    $this->warn("TMDb show ID {$tvShow['id']} has no title. Skipping...");
                    continue;
                }

                $runtime = null;
                $episodeRuntimes = $tvShowData['episode_run_time'] ?? [];
                if (is_array($episodeRuntimes) && count($episodeRuntimes) > 0) {
                    $averageRuntime = (int) round(array_sum($episodeRuntimes) / count($episodeRuntimes));
                    if ($averageRuntime > 0) {
                        $runtime = sprintf('%02d:%02d', intdiv($averageRuntime, 60), $averageRuntime % 60);
                    }
                }

                $trailerUrl = $this->findTrailerUrl($tvShowData['videos']['results'] ?? []);
                $trailerType = $this->findTrailerType($tvShowData['videos']['results'] ?? []);

                $entertainment = Entertainment::updateOrCreate(
                    [
                        'tmdb_id' => (string) $tvShowData['id'],
                        'type' => 'tvshow',
                    ],
                    [
                        'type' => 'tvshow',
                        'description' => $tvShowData['overview'] ?? '',
                        'IMDb_rating' => isset($tvShowData['vote_average']) ? (float) $tvShowData['vote_average'] : null,
                        'release_date' => !empty($tvShowData['first_air_date'])
                            ? Carbon::parse($tvShowData['first_air_date'])->toDateString()
                            : null,
                        'poster_url' => !empty($tvShowData['poster_path'])
                            ? 'https://image.tmdb.org/t/p/original' . $tvShowData['poster_path']
                            : '',
                        'thumbnail_url' => !empty($tvShowData['poster_path'])
                            ? 'https://image.tmdb.org/t/p/w500' . $tvShowData['poster_path']
                            : '',
                        'duration' => $runtime,
                        'trailer_url' => $trailerUrl,
                        'language' => $languageKey,
                        'trailer_url_type' => $trailerType,
                        'status' => 1,
                    ]
                );

                $tvShowsScraped++;
                $this->newLine();
                $this->line("{$languageConfig['display_name']} show {$tvShowsScraped}/{$maxTvShows}");
                $this->line('Saved show: ' . $title . " (database ID {$entertainment->id})");
                $this->line('TMDb ID: ' . $tvShow['id']);
                $this->line('First aired: ' . ($tvShowData['first_air_date'] ?? 'Unknown'));
                $this->line('Rating: ' . ($tvShowData['vote_average'] ?? 'N/A'));
                $this->line('Genres: ' . implode(', ', array_column($tvShowData['genres'] ?? [], 'name')));
                $this->line('Countries: ' . implode(', ', array_column($tvShowData['production_countries'] ?? [], 'name')));
                $this->line('Cast: ' . implode(', ', array_column(array_slice($tvShowData['credits']['cast'] ?? [], 0, 10), 'name')));
                $this->line('Trailer: ' . ($trailerUrl ?? 'Not available'));
                $this->line('Overview: ' . ($tvShowData['overview'] ?? 'Not available'));

                $episodeCount = $this->saveShowEpisodes($tmdbApiKey, $tvShowData, $entertainment, $languageConfig, $requestFailed);
                $this->line("Saved/updated episodes: {$episodeCount}");
            }

            // Check for more pages
            $hasMore = $page < $data['total_pages'];
            $this->info("Fetched $count records from page $page for {$languageConfig['display_name']}");

            // Increment page
            $page++;

            // Wait 1 second to respect TMDb rate limits (approx. 50 requests per second)
            if ($hasMore && $tvShowsScraped < $maxTvShows) {
                $this->info('Waiting for 1 second before fetching the next page...');
                sleep(1);
            }
        }

        $this->info("Fetched and saved {$tvShowsScraped} {$languageConfig['display_name']} drama TV shows.");
        return !$requestFailed;
    }

    private function saveShowEpisodes(
        string $tmdbApiKey,
        array $tvShowData,
        Entertainment $entertainment,
        array $languageConfig,
        bool &$requestFailed
    ): int {
        $savedEpisodes = 0;
        $seasons = $tvShowData['seasons'] ?? [];

        foreach (array_slice($seasons, 0, 5) as $seasonData) {
            $seasonNumber = $seasonData['season_number'] ?? null;
            if ($seasonNumber === null || (int) $seasonNumber === 0 || empty($seasonData['id'])) {
                continue;
            }

            $season = Season::updateOrCreate(
                [
                    'tmdb_id' => (string) $seasonData['id'],
                    'entertainment_id' => $entertainment->id,
                ],
                [
                    'season_index' => (string) $seasonNumber,
                    'name' => $seasonData['name'] ?? "Season {$seasonNumber}",
                    'poster_url' => !empty($seasonData['poster_path'])
                        ? 'https://image.tmdb.org/t/p/w500' . $seasonData['poster_path']
                        : null,
                    'description' => $seasonData['overview'] ?? null,
                    'short_desc' => $seasonData['overview'] ?? null,
                    'status' => 1,
                ]
            );

            try {
                $seasonResponse = $this->tmdbGet(
                    $tmdbApiKey,
                    "https://api.themoviedb.org/3/tv/{$tvShowData['id']}/season/{$seasonNumber}",
                    ['language' => $languageConfig['language_code'], 'append_to_response' => 'videos']
                );
            } catch (\Illuminate\Http\Client\ConnectionException $exception) {
                $this->warn("TMDb connection failed for season {$seasonNumber} of show {$tvShowData['id']}: {$exception->getMessage()}");
                $requestFailed = true;
                continue;
            }

            if (!$seasonResponse->ok()) {
                $this->warn("Failed to fetch season {$seasonNumber} of show {$tvShowData['id']} (HTTP {$seasonResponse->status()}).");
                $requestFailed = true;
                continue;
            }

            $episodes = $seasonResponse->json('episodes', []);
            if (!is_array($episodes)) {
                $this->warn("TMDb returned invalid episode data for season {$seasonNumber} of show {$tvShowData['id']}.");
                $requestFailed = true;
                continue;
            }

            foreach ($episodes as $episode) {
                if (empty($episode['id'])) {
                    continue;
                }

                $episodeTrailer = $this->findTrailerUrl($episode['videos']['results'] ?? []);
                $episodeTrailerType = $this->findTrailerType($episode['videos']['results'] ?? []);
                $episodeName = $episode['name'] ?? "Episode " . ($episode['episode_number'] ?? '');

                Episode::updateOrCreate(
                    [
                        'tmdb_id' => (string) $episode['id'],
                        'entertainment_id' => $entertainment->id,
                    ],
                    [
                        'name' => $episodeName,
                        'season_id' => $season->id,
                        'tmdb_season' => $tvShowData['id'] . ':' . $seasonNumber,
                        'episode_number' => isset($episode['episode_number']) ? (string) $episode['episode_number'] : null,
                        'description' => $episode['overview'] ?? null,
                        'short_desc' => $episode['overview'] ?? '',
                        'release_date' => !empty($episode['air_date'])
                            ? Carbon::parse($episode['air_date'])->toDateString()
                            : null,
                        'duration' => isset($episode['runtime']) && $episode['runtime'] > 0
                            ? sprintf('%02d:%02d', intdiv((int) $episode['runtime'], 60), (int) $episode['runtime'] % 60)
                            : null,
                        'poster_url' => !empty($episode['still_path'])
                            ? 'https://image.tmdb.org/t/p/w500' . $episode['still_path']
                            : null,
                        'trailer_url' => $episodeTrailer,
                        'trailer_url_type' => $episodeTrailerType,
                        'status' => 1,
                    ]
                );

                $savedEpisodes++;
            }
        }

        return $savedEpisodes;
    }

    private function tmdbGet(string $credential, string $url, array $query = [])
    {
        $request = Http::acceptJson()->timeout(30);

        if (strlen($credential) > 40) {
            return $request->withToken($credential)->get($url, $query);
        }

        return $request->get($url, array_merge($query, ['api_key' => $credential]));
    }

    private function findTrailerUrl(array $videos): ?string
    {
        foreach ($videos as $video) {
            if (!in_array($video['type'] ?? null, ['Trailer', 'Teaser', 'Clip', 'Featurette'])) {
                continue;
            }

            $key = $video['key'] ?? null;
            if (!$key) {
                continue;
            }

            return match ($video['site'] ?? null) {
                'YouTube' => "https://www.youtube.com/watch?v={$key}",
                'Vimeo' => "https://vimeo.com/{$key}",
                'Dailymotion' => "https://www.dailymotion.com/video/{$key}",
                default => $key,
            };
        }

        return null;
    }

    private function findTrailerType(array $videos): ?string
    {
        foreach ($videos as $video) {
            if (!in_array($video['type'] ?? null, ['Trailer', 'Teaser', 'Clip', 'Featurette'])) {
                continue;
            }

            return match ($video['site'] ?? null) {
                'YouTube' => 'youtube',
                'Vimeo' => 'vimeo',
                'Dailymotion' => 'dailymotion',
                default => isset($video['key']) ? 'url' : null,
            };
        }

        return null;
    }
}
