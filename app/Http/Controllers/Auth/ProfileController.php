<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show()
    {
        $user =User::with('profile')->find(Auth::id());
        return view('auth.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // File size validation removed - uploading to S3
        ]);



        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ensure profile exists
        $profile = Profile::firstOrCreate(['user_id' => $user->id]);

        try {
            // Update user name by combining first_name and last_name
            $user->name = $request->first_name . ' ' . $request->last_name;

            // Handle profile image upload
            $imageUrl = null;
            if ($request->hasFile('profile_image')) {
                // Delete old image if exists
                if ($profile->image) {
                    $oldPath = $profile->image;
                    // If full URL, convert to relative path
                    if (filter_var($oldPath, FILTER_VALIDATE_URL)) {
                        $parsed = parse_url($oldPath);
                        $oldPath = ltrim(str_replace('/storage/', '', $parsed['path']), '/');
                    }
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }

                $path = $request->file('profile_image')->store('profiles', 'spaces');
                $spacesConfig = config('filesystems.disks.spaces');
                $profile_image_path = $spacesConfig['url'] . '/' . $path;
                $profile->image = $profile_image_path;
                $profile->save();
            }

            $user->save();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Profile updated successfully!',
                    'image_url' => $imageUrl
                ]);
            }

            return back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while updating your profile.'
                ], 500);
            }

            return back()
                ->withErrors(['error' => 'An error occurred while updating your profile.'])
                ->withInput();
        }
    }

    public function deleteImage()
    {
        $user = Auth::user();
        $profile = $user->profile;

        try {
            if ($profile && $profile->image) {
                $oldPath = $profile->image;
                // If full URL, convert to relative path
                if (filter_var($oldPath, FILTER_VALIDATE_URL)) {
                    $parsed = parse_url($oldPath);
                    $oldPath = ltrim(str_replace('/storage/', '', $parsed['path']), '/');
                }
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
                $profile->image = null;
                $profile->save();
            }

            return response()->json(['success' => true, 'message' => 'Profile image deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting your profile image.'], 500);
        }
    }

    public function changePasswordView()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        // Check if current password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        try {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('admin.dashboard.index')->with('success', 'Password changed successfully!');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'An error occurred while changing your password.'])
                ->withInput();
        }
    }
}
