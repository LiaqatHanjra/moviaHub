<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FavoritePersonality;
use App\Models\CastCrew;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class FavoritePersonalityController extends Controller
{
    /**
     * Get user's favorite personalities
     */
    public function index(Request $request): JsonResponse
    {
            $user = getApiUser(); // actor, director, etc.

            $getRecords = FavoritePersonality::where('user_id', $user->id)->get();

            $castCrewIds = $getRecords->pluck('cast_crew_id')->toArray();

            $castCrew = CastCrew::whereIn('id', $castCrewIds)->select('id', 'name', 'type', 'file_url')->get();

            return response()->json([
                'success' => true,
                'message' => 'Favorite personalities retrieved successfully',
                'data' => $castCrew
            ]);
    }

    /**
     * Add a personality to favorites
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'cast_crew_id' => 'required|exists:cast_crews,id',
            ]);

            $user = getApiUser();
            $castCrewId = $request->cast_crew_id;

            // Check if already favorited
            $existingFavorite = FavoritePersonality::where('user_id', $user->id)
                ->where('cast_crew_id', $castCrewId)
                ->first();

            if ($existingFavorite) {
                return response()->json([
                    'success' => false,
                    'message' => 'This personality is already in your favorites'
                ], 400);
            }

            // Create new favorite
            $favorite = FavoritePersonality::create([
                'user_id' => $user->id,
                'cast_crew_id' => $castCrewId,
            ]);

            // Load the cast crew data
            $favorite->load('castCrew');

            return response()->json([
                'success' => true,
                'message' => 'Personality added to favorites successfully',
                'data' => [
                    'id' => $favorite->id,
                    'cast_crew' => [
                        'id' => $favorite->castCrew->id,
                        'name' => $favorite->castCrew->name,
                        'type' => $favorite->castCrew->type,
                        'designation' => $favorite->castCrew->designation,
                        'image' => $favorite->castCrew->file_url,
                    ],
                ]
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding personality to favorites',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove a personality from favorites
     */
    public function destroy($id): JsonResponse
    {
        try {
            $user = getApiUser();

            $favorite = FavoritePersonality::where('user_id', $user->id)
                ->where('id', $id)
                ->first();

            if (!$favorite) {
                return response()->json([
                    'success' => false,
                    'message' => 'Favorite personality not found'
                ], 404);
            }

            $favorite->delete();

            return response()->json([
                'success' => true,
                'message' => 'Personality removed from favorites successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error removing personality from favorites',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
