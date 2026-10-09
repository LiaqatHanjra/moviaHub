<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserMultiProfile;

class ProfileAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionToken = $request->header('X-Profile-Session');

        if (!$sessionToken) {
            return response()->json(['message' => 'Profile token missing'], 401);
        }

        $profile = UserMultiProfile::where('session_token', $sessionToken)->first();

        if (!$profile) {
            return response()->json(['message' => 'Invalid or expired profile token'], 401);
        }

        // Attach the profile to the request for later use
        $request->merge(['auth_profile' => $profile]);

        return $next($request);
    }
}
