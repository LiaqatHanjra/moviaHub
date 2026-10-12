<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $planDetails = $this->plan_details;
        if($planDetails){
            $planDetails->plan_type = json_decode($planDetails->plan_type);
        };
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->phone,
            'gender' => $this->gender,
            'email_verified_at' => $this->email_verified_at,
            'is_banned' => $this->is_banned,
            'is_subscribe' => $this->is_subscribe,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'api_token' => $this->token,
            'is_user_exist' => true,
            'profile_image' => optional($this->profile)->image,
            'admin' => (int) ($this->admin ?? 0),
            'plan_details' => $planDetails ?? null,
        ];
    }
}
