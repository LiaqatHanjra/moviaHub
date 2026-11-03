<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = getApiUser();
        $profile = Profile::where('user_id', $user->id)->first();
        $names = explode(' ', $user->name, 2);
        $firstName = $names[0] ?? '';
        $lastName = $names[1] ?? '';

        return response()->json([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $user->email,
            'phone' => $user->phone,
            'gender' => $user->gender,
            'address' => $user->address,
            'profile_image' => $profile?->image ?? $user->profile_image,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = getApiUser();
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'gender' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|max:5120',
        ]);

        $user->update([
            'name' => trim($validated['first_name'] . ' ' . ($validated['last_name'] ?? '')),
            'gender' => $validated['gender'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
        ]);

        $profile = Profile::where('user_id', $user->id)->first();
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profiles', 'public');
            $profile = Profile::updateOrCreate(
                ['user_id' => $user->id],
                ['image' => $path]
            );
        }

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully.',
            'profile' => [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'] ?? '',
                'email' => $user->email,
                'phone' => $user->phone,
                'gender' => $user->gender,
                'address' => $user->address,
                'profile_image' => $profile?->image ?? $user->profile_image,
            ],
        ], 200);
    }
}
