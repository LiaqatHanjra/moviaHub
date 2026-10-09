<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Entertainment;
use App\Models\Like;
use App\Models\Episode;
use App\Http\Resources\ReviewResource;

class RewiewController extends Controller
{

    public function getRating(Request $request)
    {

        $perPage = $request->input('per_page', 10);

        $reviews = Review::query();

        if ($request->has('entertainment_id')) {
            $reviews = $reviews->where('entertainment_id', $request->entertainment_id);
        }

        if ($request->has('sort') && $request->sort==='top_star') {
             $reviews = $reviews->orderBy('rating', 'desc')
                           ->paginate($perPage);
        }else{
            $reviews = $reviews->orderBy('updated_at', 'desc')->paginate($perPage);
        }

        $review =   ReviewResource::collection($reviews);

        return response()->json([
            'status' => true,
            'data' => $review,
            'message' => 'Reviews list.',
        ], 200);
    }

    public function saveRating(Request $request)
    {
        $request->validate([
            'entertainment_id' => 'required',
            'rating' => 'required',
            'review' => 'nullable',
        ]);
        $user = getApiUser();
        $entertainment = Entertainment::where('id', $request->entertainment_id)->first();

        if (!$entertainment) {
            return response()->json(['status' => false, 'message' => 'Movie not existe']);
        }

        Review::create([
            'entertainment_id' => $entertainment->id,
            'user_id' => $user->id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return response()->json(['status' => true, 'message' => 'Review Added']);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'entertainment_id' => 'required|exists:entertainments,id',
            'rating' => 'required|numeric|min:0|max:5', // Assuming rating is a number between 0 and 5
            'review' => 'nullable|string|max:5000', // Optional review text with max length
            'review_id' => 'required|exists:reviews,id', // Corrected validation rule
        ]);

        try {
            $rating = Review::findOrFail($request->review_id);
            $rating->update([
                'entertainment_id' => $validated['entertainment_id'],
                'rating' => $validated['rating'],
                'review' => $validated['review'],
            ]);

            return response()->json([
                'message' => 'Rating updated successfully!',
                'rating' => $rating,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update rating: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function deleteRating(Request $request, $id)
    {
        $user = getApiUser();
        $rating = Review::where('id', $id)->first();

        if ($rating == null) {

            $message = 'Review not found.';

            return response()->json(['status' => false, 'message' => $message]);
        }
        $message = 'Review deleted successfully.';

        $entertainment_id=$rating->entertainment_id;

        $rating->delete();

        $rating_count = Review::where('entertainment_id',  $entertainment_id)->count();


        return response()->json(['status' => true, 'message' => $message, 'rating_count'=> $rating_count]);
    }

    public function saveLikes(Request $request)
    {
        $user = getApiUser();

        $request->validate([
            'entertainment_id' => 'required',
            'type' => 'nullable',
            'is_like' => 'required',
            'profile_id'=> 'required'
        ]);

        // Use helper function to get active profile ID
        $profileId = getActiveProfileId($request, $request->profile_id);

        if (!$profileId) {
            return response()->json([
                'status' => false,
                'message' => 'Valid profile ID is required'
            ], 400);
        }

        $likes_data = $request->all();
        $likes_data['profile_id'] = $profileId;
        $likes_data['user_id'] = $user->id;

        $entertainmentId = null;
        if($request->type == 'epidose'){
            $entertainment = Episode::where('id', $request->entertainment_id)->first();
            $entertainmentId = $entertainment->id;
        } else {
            $entertainment = Entertainment::where('id', $request->entertainment_id)->first();
            $entertainmentId = $entertainment->id;
        }

        $likes = Like::updateOrCreate(
            ['entertainment_id' => $entertainmentId, 'user_id' => $user->id, 'profile_id' => $profileId],
            $likes_data
        );

        $message = $request->is_like == 1 ? 'Movie liked' : __('Movie un liked');

        return response()->json(['status' => true, 'message' => $message]);
    }
}
