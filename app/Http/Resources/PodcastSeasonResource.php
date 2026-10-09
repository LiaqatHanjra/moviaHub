<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PodcastSeasonResource extends JsonResource
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
            'season_index' => $this->season_index,
            'podcast_id' => $this->podcast_id,
            'poster_url' => $this->poster_url,
            'short_desc' => $this->short_desc,
            'description' => $this->description ? strip_tags($this->description) : null,
            'trailer_url_type' => $this->trailer_url_type,
            'trailer_url' => $this->trailer_url,
            'access' => $this->access,
            'plan_id' => $this->plan_id,
            'status' => $this->status,
            'episodes' => PodcastEpisodeResource::collection($this->whenLoaded('episodes')),
        ];
    }
}
