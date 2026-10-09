<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\CastCrew;
use App\Models\Country;
use Carbon\Carbon;

class FecthCastCrewImages extends Command
{
    protected $signature = 'fetch:cast-crew-countries
                            {--max=100 : Maximum cast/crew people to fetch from TMDb}
                            {--pages=10 : Max TMDb person/popular pages to scan}
                            {--skip-countries : Skip fetching countries}
                            {--skip-cast : Skip fetching cast/crew}';

    protected $description = 'Fetch cast/crew from TMDb and country names, codes, dial codes, and currencies online';

    public function handle()
    {
        $exitCode = 0;

        if (!$this->option('skip-countries')) {
            if (!$this->fetchCountries()) {
                $exitCode = 1;
            }
        }

        if (!$this->option('skip-cast')) {
            $tmdbToken = env('TMDB_API_KEY') ?: config('services.tmdb.api_key');

            if (empty($tmdbToken)) {
                $this->error('TMDb credentials are not configured. Set TMDB_TOKEN or TMDB_API_KEY in your .env file.');
                return 1;
            }

            $this->fetchCastCrew($tmdbToken);
        }

        $this->info('Done.');
        return $exitCode;
    }

    private function fetchCountries(): bool
    {
        $this->info('Fetching countries, dial codes, and currencies online...');

        try {
            $codesResponse = Http::acceptJson()
                ->timeout(30)
                ->get('https://countriesnow.space/api/v0.1/countries/codes');
            $currencyResponse = Http::acceptJson()
                ->timeout(30)
                ->get('https://countriesnow.space/api/v0.1/countries/currency');
        } catch (\Illuminate\Http\Client\ConnectionException $exception) {
            $this->error('Could not connect to the country data API: ' . $exception->getMessage());
            return false;
        }

        if (!$codesResponse->ok() || !$currencyResponse->ok()) {
            $this->error(sprintf(
                'Country data API request failed (codes: HTTP %d, currencies: HTTP %d).',
                $codesResponse->status(),
                $currencyResponse->status()
            ));
            return false;
        }

        $codes = $codesResponse->json('data');
        $currencies = $currencyResponse->json('data');

        if (!is_array($codes) || !is_array($currencies)) {
            $this->error('Country data API returned an invalid response.');
            return false;
        }

        $currenciesByCode = [];
        foreach ($currencies as $country) {
            $code = strtoupper((string) ($country['iso2'] ?? ''));
            if ($code !== '') {
                $currenciesByCode[$code] = $country;
            }
        }

        $created = 0;
        $updated = 0;

        foreach ($codes as $country) {
            $code = strtoupper((string) ($country['code'] ?? ''));
            $name = trim((string) ($country['name'] ?? ''));

            if ($code === '' || $name === '') {
                continue;
            }

            $currency = $currenciesByCode[$code] ?? [];
            $dialCode = preg_replace('/\D+/', '', (string) ($country['dial_code'] ?? ''));

            $payload = [
                'name' => $name,
                'code' => $code,
                'dial_code' => $dialCode !== '' ? (int) $dialCode : null,
                'currency_code' => $currency['currency'] ?? null,
                'status' => 1,
            ];

            $existing = Country::where('code', $code)->first()
                ?: Country::where('name', $name)->first();

            if ($existing) {
                $existing->update($payload);
                $updated++;
            } else {
                Country::create($payload);
                $created++;
            }
        }

        if ($created + $updated === 0) {
            $this->error('The country data API returned no usable country records.');
            return false;
        }

        $this->info("Countries saved. Created: {$created}, Updated: {$updated}, Total: " . ($created + $updated));
        return true;
    }

    private function fetchCastCrew(string $tmdbToken): void
    {
        $maxPeople = max(1, (int) $this->option('max'));
        $maxPages = max(1, (int) $this->option('pages'));
        $saved = 0;
        $page = 1;

        $this->info("Fetching cast/crew from TMDb (max {$maxPeople})...");

        while ($saved < $maxPeople && $page <= $maxPages) {
            $this->info("Fetching popular people page {$page}...");

            $response = $this->tmdbGet($tmdbToken, 'https://api.themoviedb.org/3/person/popular', [
                'language' => 'en-US',
                'page' => $page,
            ]);

            if (!$response->ok()) {
                $this->error("Failed to fetch people page {$page} (HTTP {$response->status()})");
                break;
            }

            $data = $response->json();
            $people = $data['results'] ?? [];

            if (empty($people)) {
                $this->info("No people found on page {$page}. Stopping.");
                break;
            }

            foreach ($people as $person) {
                if ($saved >= $maxPeople) {
                    break;
                }

                $tmdbId = $person['id'] ?? null;
                $name = $person['name'] ?? null;

                if (empty($tmdbId) || empty($name)) {
                    continue;
                }

                $personDetails = $this->tmdbGet($tmdbToken, "https://api.themoviedb.org/3/person/{$tmdbId}", [
                    'language' => 'en-US',
                ]);

                if (!$personDetails->ok()) {
                    $this->warn("Failed to fetch person details for TMDb ID {$tmdbId}. Skipping...");
                    continue;
                }

                $details = $personDetails->json();
                $type = $this->mapPersonType($details['known_for_department'] ?? ($person['known_for_department'] ?? 'Acting'));
                $profilePath = $details['profile_path'] ?? ($person['profile_path'] ?? null);

                $dob = null;
                if (!empty($details['birthday']) && $this->isValidDate($details['birthday'])) {
                    $dob = Carbon::parse($details['birthday'])->format('Y-m-d');
                }

                $attributes = [
                    'name' => $details['name'] ?? $name,
                    'type' => $type,
                    'file_url' => !empty($profilePath)
                        ? 'https://image.tmdb.org/t/p/original' . $profilePath
                        : null,
                    'bio' => $details['biography'] ?? null,
                    'place_of_birth' => $details['place_of_birth'] ?? null,
                    'dob' => $dob,
                    'designation' => $details['known_for_department'] ?? null,
                ];

                CastCrew::updateOrCreate(
                    ['tmdb_id' => (string) $tmdbId, 'type' => $type],
                    $attributes
                );

                $saved++;
                $imageStatus = !empty($attributes['file_url']) ? 'with image' : 'without image';
                $this->info("Saved ({$saved}/{$maxPeople}): {$attributes['name']} [{$type}] {$imageStatus}");

                usleep(150000);
            }

            $totalPages = (int) ($data['total_pages'] ?? 1);
            $page++;

            if ($page > $totalPages || $saved >= $maxPeople) {
                break;
            }

            sleep(1);
        }

        // Also refresh existing cast/crew that have tmdb_id but missing image
        $this->refreshMissingImages($tmdbToken);

        $this->info("Cast/crew fetching completed. Saved/updated: {$saved}");
    }

    private function refreshMissingImages(string $tmdbToken): void
    {
        $missing = CastCrew::whereNotNull('tmdb_id')
            ->where('tmdb_id', '!=', '')
            ->where(function ($query) {
                $query->whereNull('file_url');
            })
            ->orderBy('id')
            ->limit(100)
            ->get();

        if ($missing->isEmpty()) {
            return;
        }

        $this->info("Refreshing images for {$missing->count()} existing cast/crew without photos...");

        foreach ($missing as $cast) {
            $response = $this->tmdbGet($tmdbToken, "https://api.themoviedb.org/3/person/{$cast->tmdb_id}");

            if (!$response->ok()) {
                continue;
            }

            $details = $response->json();
            $profilePath = $details['profile_path'] ?? null;

            if (empty($profilePath)) {
                continue;
            }

            $update = [
                'file_url' => 'https://image.tmdb.org/t/p/original' . $profilePath,
            ];

            if (empty($cast->bio) && !empty($details['biography'])) {
                $update['bio'] = $details['biography'];
            }

            if (empty($cast->place_of_birth) && !empty($details['place_of_birth'])) {
                $update['place_of_birth'] = $details['place_of_birth'];
            }

            if (empty($cast->dob) && !empty($details['birthday']) && $this->isValidDate($details['birthday'])) {
                $update['dob'] = Carbon::parse($details['birthday'])->format('Y-m-d');
            }

            $cast->update($update);
            $this->info("Updated image for: {$cast->name}");
            usleep(150000);
        }
    }

    private function mapPersonType(string $department): string
    {
        $department = strtolower(trim($department));

        return match ($department) {
            'directing' => 'director',
            'writing' => 'writer',
            'production' => 'producer',
            'sound', 'camera', 'editing', 'art', 'costume & make-up', 'visual effects', 'crew' => 'crew',
            default => 'actor',
        };
    }

    private function tmdbGet(string $tmdbToken, string $url, array $query = [])
    {
        if (strlen($tmdbToken) > 40) {
            return Http::withToken($tmdbToken)->get($url, $query);
        }

        return Http::get($url, array_merge($query, ['api_key' => $tmdbToken]));
    }

    private function isValidDate($date): bool
    {
        try {
            Carbon::parse($date);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
