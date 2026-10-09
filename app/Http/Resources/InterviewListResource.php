<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\WatchList;
use App\Models\Plan;
use App\Models\Like;
use App\Http\Resources\PlanResource;

class InterviewListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $plans = [];
        $plan = $this->plan;
        if($plan){
            $plans = Plan::where('level', '<=', $plan->level)->get();
        }

        $user = getApiUser();
        $is_like = 0;
        $isInWatchList = false;

        if($user) {
            // Check if interview is in watchlist
            $isInWatchList = WatchList::where('entertainment_id',$this->id)
                ->where('user_id', $user->id)
                ->exists();

            // Check if interview is liked
            $isLiked = Like::where('entertainment_id',$this->id)
                ->where('user_id', $user->id)
                ->first();
            if($isLiked){
                $is_like = 1;
            }
        }else{
            $isInWatchList = $this->is_watch_list ?? false;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description ? strip_tags($this->description) : null,
            'trailer_url_type' => $this->trailer_url_type,
            'type' => $this->type,
            'trailer_url' => $this->trailer_url,
            'movie_access' => $this->movie_access,
            'plan_id' => $this->plan_id,
            'plan_level' => $this->plan->level ?? 0,
            'language' => $this->language,
            'rating' => $this->rating,
            'content_rating' => $this->content_rating,
            'duration' => $this->duration,
            'is_likes' => $is_like,
            'release_date' => $this->release_date,
            'is_restricted' => $this->is_restricted,
            'poster_image' => $this->poster_url ?? null,
            'thumbnail_image' => $this->thumbnail_url ?? null,
            'is_watch_list' => $isInWatchList ? true : false,
            'plans' => PlanResource::collection($plans),
            'status' => $this->status,
            'artist' => $this->artist ?? [],
        ];
    }
}
