<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CastCrewListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {

        $cast_id=$this->id;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'bio' => $this->bio,
            'place_of_birth' => $this->place_of_birth,
            'dob' => $this->dob,
            'designation' => $this->designation,
            'profile_image' => $this->file_url,

        ];
    }
}
