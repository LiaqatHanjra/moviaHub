<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();

        $user = User::query()
            // ->where('users.admin', true)
            ->where('users.id', $user->id)
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->select([
                'users.id',
                'users.name',
                'users.email',
                'users.admin',
                'users.created_at',
                'profiles.image',
            ])
            ->first();

        if ($user) {
            $nameParts = explode(' ', $user->name, 2);
            $user->first_name = $nameParts[0];
            $user->last_name = isset($nameParts[1]) ? $nameParts[1] : '';
        }


            return response()->json([
            'status' => true,
            'message' => 'Profile list retrieved successfully',
            'data' => $user,
            ], 200);
    }
    public function updateProfile(Request $request)
    {
        try{
            $user = getApiUser();

            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // File size validation removed - uploading to S3
            ]);

            $user->update([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'phone' => $validated['phone'] ?? $user->phone,
            ]);

            $profile = Profile::where('user_id', $user->id)->first();
            if ($request->hasFile('profile_image')) {
                $path = $request->file('profile_image')->store('profiles', 'spaces');
                $spacesConfig = config('filesystems.disks.spaces');
                $profile_image_path = $spacesConfig['url'] . '/' . $path;
            }else{
                $profile_image_path = $request->profile_image ?? $profile->image;
            }

            if (!$profile) {
                Profile::create([
                    'user_id' => $user->id,
                    'image' => $profile_image_path
                ]);
            }else{
                $profile->image = $profile_image_path;
                $profile->save();
            }

            $user->save();
            $user->image = $profile->image;
            return response()->json([
                'status'  => true,
                'message' => 'Profile updated successfully.',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

}
