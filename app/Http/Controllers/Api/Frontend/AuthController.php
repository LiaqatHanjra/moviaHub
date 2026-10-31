<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RegisterResource;
use App\Models\UserMultiProfile;
use App\Models\Profile;
use App\Models\Plan;
use App\Http\Resources\PlanlimitationMappingResource;
use Carbon\Carbon;
use App\Models\Subscription;
use Illuminate\Support\Facades\Password;
use App\Http\Resources\LoginResource;
use Illuminate\Support\Facades\DB;
use Str;
use App\Models\Device;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required_without:name|nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'name' => 'required_without:first_name|nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $fullName = trim($validated['name'] ?? '');
        if ($fullName === '') {
            $fullName = trim(($validated['first_name'] ?? '') . ' ' . ($validated['last_name'] ?? ''));
        }

        try {
            $user = User::create([
                'name' => $fullName,
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'status'  => 1,
                'email_verified_at' => now(),
            ]);

            Profile::create([
                'user_id' => $user->id,
            ]);

            return response()->json([
                'message' => 'User registered successfully',
                'data' => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to register user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        if ($user->status !== null && (int) $user->status === 0) {
            return response()->json(['message' => 'Your account is not active. Please connect with the administration.'], 401);
        }

        $adminLog = new \App\Models\AdminLog();
        $adminLog->user_id = $user->id;
        $adminLog->username = $user->name;
        $adminLog->email = $user->email;
        $adminLog->login_at = Carbon::now();
        $adminLog->save();
        $profile = Profile::where('user_id', $user->id)->first();
        $user->profile = $profile;

        $token = $user->createToken('auth_token')->plainTextToken;
        $user['token'] = $token;

        Auth::login($user, $request->boolean('remember'));

        $loginResource = new LoginResource($user);

        return response()->json($loginResource);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Reset link sent to your email.'], 200);
        } else {
            return response()->json(['message' => 'Unable to send reset link.'], 400);
        }
    }

    public function sendResetLinkEmail(Request $request)
    {
        return $this->forgotPassword($request);
    }

    public function resetPassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|max:255',
            'token' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            $tokenData = DB::table('password_reset_tokens')->where('email', $request->email)->first();
            if ($tokenData && Carbon::parse($tokenData->created_at)->lt(now()->subSeconds(30))) {
                return response()->json([
                    'message' => 'The reset link has expired. Please request a new password reset link.',
                ], 400);
            }

            // Attempt to reset the password
            $status = Password::reset(
                $request->only('email', 'token', 'password', 'password_confirmation'),
                function ($user, $password) {
                    $user->password = Hash::make($password);
                    $user->save();

                    // Delete the reset token from password_reset_tokens table
                    DB::table('password_reset_tokens')->where('email', $user->email)->delete();
                }
            );

            // Check the reset status
            if ($status === Password::PASSWORD_RESET) {
                $user = User::where('email', $request->email)->first();
                return response()->json([
                    'message' => __($status), // e.g., "passwords.reset"
                    'data' => new RegisterResource($user),
                ], 200);
            }

            return response()->json([
                'message' => __($status), // e.g., "passwords.token" or "passwords.user"
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to reset password',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function changePassword(Request $request)
    {
        // Ensure the user is authenticated
        if (!getApiUser()) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        // Validate the request
        $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            // Get the authenticated user
            $user = getApiUser();

            // Verify the old password
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    'message' => 'The provided old password is incorrect',
                ], 400);
            }

            // Update the password
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return response()->json([
                'message' => 'Password changed successfully',
                'data' => new RegisterResource($user),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to change password',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
