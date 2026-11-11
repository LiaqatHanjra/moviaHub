<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeriesSummaryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'description' => strip_tags($this->description ?? ''),
            'language' => $this->language,
            'imdb_rating' => $this->IMDb_rating,
            'content_rating' => $this->content_rating,
            'release_date' => $this->release_date,
            'release_year' => $this->release_date?->year,
            'poster_image' => $this->poster_url,
            'thumbnail_image' => $this->thumbnail_url,
            'genres' => $this->entertainmentGenerMappings
                ->pluck('genre')
                ->filter()
                ->map(fn ($genre) => ['id' => $genre->id, 'name' => $genre->name])
                ->values(),
        ];
    }
}
