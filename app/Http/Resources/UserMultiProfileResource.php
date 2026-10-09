<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class UserMultiProfileResource extends JsonResource
{

   /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'avatar' => $this->avatar,
            'isKid' => $this->isKid,
            'session_id' => $this->session_id,
        ];
    }
}
