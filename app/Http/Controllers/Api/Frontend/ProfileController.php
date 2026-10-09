<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function getProfile(){
        $user = getApiUser();
        $profile = Profile::where("user_id", $user->id)
                                        ->first();
        $names = explode(' ', $user->name, 2);
        $first_name = $names[0] ?? '';
        $last_name = $names[1] ?? '';

        // Return only the requested fields
        $user = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'gender' => $user->gender,
            'address' => $user->address,
            'profile_image' => $profile && $profile->image ? $profile->image : null,
        ];
        return response()->json($user);
    }

    public function updateProfile(Request $request)
    {
        $user = getApiUser();
        $data = [
            'name'=> $request->first_name . ' ' . $request->last_name ?? $user->name,
            'gender'=> $request->gender ?? $user->gender,
            'phone'=> $request->phone ?? $user->phone,
            'address'=> $request->address ?? $user->address,
        ];

        $user->update($data);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profiles', 'spaces');
            $finalPath = Storage::disk('spaces')->url($path);
            Profile::where('user_id', $user->id)->update(['image'=> $finalPath]);
        }


        return response()->json([
            'status' => true,
            'message'=> 'Profile Successfully update'
        ], 200);
    }
}
