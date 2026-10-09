<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Entertainment;
use App\Models\Episode;

class ContinueWatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $genre_data = [];
        $getEntertainment = Entertainment::where('id', $this->entertainment_id)->first();
        $getGenres = $getEntertainment->entertainmentGenerMappings;

        if (!empty($getGenres)) {

            foreach ($getGenres as $getGenre) {

                $genre_data[] = [
                    'id' => $getGenre->genre->id,
                    'name' => $getGenre->genre->name ?? null,
                ];
            }
        }
        $entertainment = null;
        $plans = [];
        if ($this->entertainment_type == 'movie') {
            $entertainment = $this->entertainment;
        } else if ($this->entertainment_type == 'tvshow') {
            $entertainment = $this->episode;
        } else if ($this->entertainment_type == 'video') {
            $entertainment = $this->video;
        }

        if ($this->episode_id != null) {
            $episode = Episode::where('id', $this->episode_id)->first();
            return [
                'id' => $episode->id,
                'entertainment_id' => $this->entertainment_id,
                'user_id' => $this->user_id,
                'entertainment_type' => $this->entertainment_type,
                'entertainment_name' => $this->entertainment->name,
                'watched_time' => $this->watched_time ?? '00:00:01',
                'total_watched_time' => $this->total_watched_time ?? '00:00:01',
                'episode_id' => $this->episode_id ?? null,
                'name' => $episode->name ?? null,
                'season_id' => $episode->tmdb_id ?? null,
                'episode_number' => $episode->episode_number ?? null,
                'description' => strip_tags($episode->description ?? null),
                'trailer_url_type' => $episode->trailer_url_type ?? null,
                'trailer_url' => isset($episode) && $episode->trailer_url ? $episode->trailer_url : null,
                'plan_id' => $entertainment->plan_id ?? null,
                'is_restricted' => $episode->is_restricted ?? null,
                'video_upload_type' => $episode->video_upload_type ?? null,
                'video_url_input' => $episode->video_url_input ?? null,
                'poster_image' =>  $episode->poster_url ?? null,
                'type' => 'episode',
                'status' => $episode->status ?? null,
                'release_date' => $episode->release_date ?? null,
                'genres' => $genre_data,
            ];
        } else {
            return [
                'id' => $this->id,
                'entertainment_id' => $this->entertainment_id,
                'user_id' => $this->user_id,
                'entertainment_type' => $this->entertainment_type ?? null,
                'entertainment_name' => $this->entertainment->name ?? null,
                'watched_time' => $this->watched_time ?? '00:00:01',
                'total_watched_time' => $this->total_watched_time ?? '00:00:01',
                'episode_id' => $this->episode_id ?? null,
                'name' => $entertainment->name ?? null,
                'description' => strip_tags($entertainment->description ?? null),
                'trailer_url_type' => $entertainment->trailer_url_type ?? null,
                'trailer_url' => isset($entertainment) && $entertainment->trailer_url
                    ? $entertainment->trailer_url
                    : null ,
                'plan_id' => $entertainment->plan_id ?? null,
                'is_restricted' => $entertainment->is_restricted ?? null,
                'video_upload_type' => $entertainment->video_upload_type ?? null,
                'video_url_input' => $entertainment->video_url_input ?? null,
                'poster_image' =>  $entertainment->poster_url ?? null,
                'thumbnail_image' => $entertainment->thumbnail_url ?? null,
                'type' => 'movie',
                'status' => $entertainment->status ?? null,
                'release_date' => $entertainment->release_date ?? null,
                'genres' => $genre_data,
            ];
        }
    }
}
