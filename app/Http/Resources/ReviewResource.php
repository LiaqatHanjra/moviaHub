<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'entertainment_id' => $this->entertainment_id,
            'rating' => $this->rating,
            'review' => $this->review,
            'user_id' => $this->user_id,
            'username' => $this->user->name,
            'profile_image' => $this->user->profile ?  $this->user->profile->image : '' ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
