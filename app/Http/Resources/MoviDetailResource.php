<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Genre;
use App\Models\EntertainmentGenres;
use App\Models\EntertainmentCast;
use App\Models\Entertainment;
use App\Models\Subscription;
use App\Models\EntertainmentDownload;
use App\Models\Like;
use App\Http\Resources\CastCrewListResource;
use App\Http\Resources\GenresResource;
use App\Http\Resources\MovieResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\PlanResource;
use Carbon\Carbon;


class MoviDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $casts = [];
        $directors = [];

        if ($this->entertainmentTalentMappings) {
            foreach ($this->entertainmentTalentMappings as $mapping) {
                if ($mapping && $mapping->talentprofile) {
                    if ($mapping->talentprofile->type === 'actor') {
                        $casts[] = $mapping->talentprofile;
                    } elseif ($mapping->talentprofile->type === 'director') {
                        $directors[] = $mapping->talentprofile;
                    }
                }
            }
        }

        $genre_data = [];
        $genres = $this->entertainmentGenerMappings;

        if ($genres) {
            foreach($genres as $genre){
                if ($genre && $genre->genre) {
                    $genre_data[] = $genre->genre;
                }
            }
        }

        $genres = EntertainmentCast::where('entertainment_id', $this->id)->get();
        $genre_ids = $genres ? $genres->pluck('genre_id')->toArray() : [];

        $totalMovies = 20;
        $collected = collect();

        // Check if 'animation' is one of the genres
        $animationGenre = Genre::where('slug', 'animation')->first();
        $isAnimation = $animationGenre && !empty($genre_ids) && in_array($animationGenre->id, $genre_ids);

        if ($isAnimation) {
            // Only show movies from the animation genre
            $animationIds = EntertainmentGenres::where('genre_id', $animationGenre->id)
                ->pluck('entertainment_id');

            $more_items = Entertainment::whereIn('id', $animationIds)
                ->where('type', 'movie')
                ->where('status', 1)
                ->where('id', '!=', $this->id)
                ->limit($totalMovies)
                ->get()
                ->unique('id')  // Remove duplicate movies
                ->values();     // Reset collection keys
        } else {
            // Check if there are any genres
            if (empty($genre_ids)) {
                // No genres found, return empty collection
                $more_items = collect();
            } else {
                // Evenly distribute across all genres
                $moviesPerGenre = ceil($totalMovies / count($genre_ids));

                foreach ($genre_ids as $genreId) {
                    $ids = EntertainmentGenres::where('genre_id', $genreId)
                        ->pluck('entertainment_id');

                    $movies = Entertainment::whereIn('id', $ids)
                        ->where('type', 'movie')
                        ->where('status', 1)
                        ->where('id', '!=', $this->id)
                        ->limit($moviesPerGenre)
                        ->get();

                    $collected = $collected->merge($movies);
                }

                // Remove duplicate movies and limit to totalMovies
                $more_items = $collected->unique('id')->take($totalMovies)->shuffle()->values();
            }
        }


        $downloadMappings = $this->entertainmentDownloadMappings ? $this->entertainmentDownloadMappings->toArray() : [];

        if ($this->download_status == 1) {

            if($this->download_type != null &&  $this->download_url !=null){

            $downloadData = [
                'type' => $this->download_type,
                'url' => $this->download_url,
                'quality' => 'default',
            ];
            $downloadMappings[] = $downloadData;
         }
        }
        $user = getApiUser();
        $download = null;
        $isLiked = null;
        $is_like = 0;

        if ($user) {
            $download = EntertainmentDownload::where('entertainment_id', $this->entertainment_id)
                ->where('user_id', $user->id)
                ->where('entertainment_type', 'episode')
                ->where('is_download', 1)
                ->first();

            $isLiked = Like::where('entertainment_id', $this->id)
                ->where('user_id', $user->id)
                ->first();

            if ($isLiked) {
                $is_like = 1;
            }
        }

        // $getDeviceTypeData = Subscription::checkPlanSupportDevice($request->user_id);
        // $deviceTypeResponse = json_decode($getDeviceTypeData->getContent(), true); // Decode to associative array
        $deviceTypeResponse = [];

        $streamLinks = [];

        if ($this->entertainmentStreamContentMappings) {
            foreach ($this->entertainmentStreamContentMappings as $stream) {
                if (!empty($stream->url) && $stream->url !== '[]') {
                    $streamLinks[] = [
                        'quality' => $stream->quality,
                        'url' => $stream->url,
                    ];
                }
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => strip_tags($this->description),
            'trailer_url_type' => $this->trailer_url_type,
            'type' => $this->type,
            'trailer_url' => $this->trailer_url,
            'language' => $this->language,
            'imdb_rating' => $this->IMDb_rating,
            'content_rating' => $this->content_rating,
            'watched_time' => optional($this->continue_watch)->watched_time ?? null,
            'total_watched_time' => optional($this->continue_watch)->total_watched_time ?? null,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'release_year' => Carbon::parse($this->release_date)->year,
            'is_restricted' => $this->is_restricted,
            'video_upload_type' => $this->video_upload_type,
            'video_url_input' => $this->video_url_input,
            'enable_quality' => $this->enable_quality,
            'is_download' => $this->is_download ?? false,
            'download_status' => $this->download_status,
            'download_type' => $this->download_type,
            'download_url' => $this->download_url,
            'enable_download_quality' => $this->enable_download_quality,
            'download_quality' => $downloadMappings,
            'poster_image' => $this->poster_url,
            'thumbnail_image' => $this->thumbnail_url,
            'is_watch_list' => $this->is_watch_list ?? false,
            'is_likes' => $is_like,
            'your_review' => $this->your_review ?? null,
            'total_review' => $this->total_review ?? 0,
            'genres' => GenresResource::collection($genre_data),
            'reviews' => ReviewResource::collection($this->reviews ?? collect()),
            'three_reviews' => ReviewResource::collection(($this->reviews ?? collect())->take(3)),
            'video_links' => $streamLinks,
            'casts' => CastCrewListResource::collection($casts),
            'directors' => CastCrewListResource::collection($directors),
            'more_items' => MovieResource::collection($more_items),
            'status' => $this->status,
            'download_id' => !empty($download) ? $download->id: null,
            'is_play' => $this->is_play,
            // 'is_device_supported' => $deviceTypeResponse['isDeviceSupported'],

        ];
    }
}
