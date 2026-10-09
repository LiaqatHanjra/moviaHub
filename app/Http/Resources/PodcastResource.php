<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\WatchList;
use App\Models\Plan;
use App\Models\Like;
use App\Http\Resources\PlanResource;

class PodcastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        // For podcasts, we don't have genre mappings like movies, so we'll return empty array
        $genre_data = [];

        $plans = [];
        $plan = $this->plan;
        if($plan){
            $plans = Plan::where('level', '<=', $plan->level)->get();
        }

        $user = getApiUser();
        $is_like = 0;
        $isInWatchList = false;

        if($user) {
            // Check if podcast is in watchlist (assuming podcasts can be added to watchlist)
            $isInWatchList = WatchList::where('entertainment_id',$this->id)
                ->where('user_id', $user->id)
                ->exists();

            // Check if podcast is liked (assuming podcasts can be liked)
            $isLiked = Like::where('entertainment_id',$this->id)
                ->where('user_id', $user->id)
                ->first();
            if($isLiked){
                $is_like = 1;
            }
        }else{
            $isInWatchList = $this->is_watch_list ?? false;
        }

        // For podcasts, we'll use video_url and video_quality_url instead of stream links
        $streamLinks = [];

        // Add main video URL if available
        if (!empty($this->video_url)) {
            $streamLinks[] = [
                'quality' => $this->video_upload_type,
                'url' => $this->video_url,
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => strip_tags($this->description),
            'trailer_url_type' => $this->trailer_url_type,
            'type' => $this->type,
            'trailer_url' => $this->trailer_url,
            'movie_access' => $this->movie_access,
            'plan_id' => $this->plan_id,
            'plan_level' => $this->plan->level ?? 0,
            'language' => $this->language,
            'imdb_rating' => $this->rating, // Using rating field from podcast
            'content_rating' => $this->content_rating,
            'duration' => $this->duration,
            'is_likes' => $is_like,
            'release_date' => $this->release_date,
            'is_restricted' => $this->is_restricted,
            'video_upload_type' => $this->video_upload_type,
            'video_url' => $this->video_url, // Using video_url as video_url_input
            'download_status' => $this->download_status,
            'enable_quality' => $this->enable_quality,
            'download_url' => $this->download_url,
            'video_links' => $streamLinks,
            'poster_image' => $this->poster_url ?? null,
            'thumbnail_image' => $this->thumbnail_url ?? null,
            'is_watch_list' => $isInWatchList ? true : false,
            'genres' => $genre_data, // Empty for podcasts as they don't have genre mappings
            'plans' => PlanResource::collection($plans),
            'status' => $this->status,
        ];
    }
}
