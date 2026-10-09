<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Split name into first_name and last_name if needed
        $names = explode(' ', $this->name, 2);
        $first_name = $names[0] ?? '';
        $last_name = $names[1] ?? '';

        return [
            'id' => $this->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $this->username ?? null, // Handle if username is not set
            'email' => $this->email,
            'avatar' => $this->avatar ?? null, // Handle if avatar is not set
        ];
    }
}
