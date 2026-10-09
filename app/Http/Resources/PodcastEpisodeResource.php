<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PodcastEpisodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'podcast_id' => $this->podcast_id,
            'season_id' => $this->season_id,
            'episode_number' => $this->episode_number,
            'poster_url' => $this->poster_url,
            'trailer_url_type' => $this->trailer_url_type,
            'trailer_url' => $this->trailer_url,
            'access' => $this->access,
            'plan_id' => $this->plan_id,
            'IMDb_rating' => $this->IMDb_rating,
            'content_rating' => $this->content_rating,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'is_restricted' => $this->is_restricted,
            'short_desc' => $this->short_desc,
            'description' => $this->description ? strip_tags($this->description) : null,
            'video_upload_type' => $this->video_upload_type,
            'video_url_input' => $this->video_url_input,
            'enable_quality' => $this->enable_quality,
            'download_status' => $this->download_status,
            'download_url' => $this->download_url,
            'status' => $this->status,
            'slug' => $this->slug,
        ];
    }
}
