<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\WatchList;
use App\Models\Plan;
use App\Models\Like;
use App\Http\Resources\PlanResource;
use App\Http\Resources\GenresResource;

class TVShowListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $genre_data = [];
        $genres = $this->entertainmentGenerMappings;
        foreach($genres as $genre){
            $genre_data[] = $genre->genre;
        }
        $plans = [];
        $plan = $this->plan;
        if($plan){
            $plans = Plan::where('level', '<=', $plan->level)->get();
        }

        $isLiked = Like::where('entertainment_id',$this->id)
                ->where('user_id', getApiUser()->id)
                ->first();
        $is_like = 0;
        if($isLiked){
           $is_like = 1;
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
            'video_links' => [],
            'imdb_rating' => $this->IMDb_rating,
            'content_rating' => $this->content_rating,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'is_restricted' => $this->is_restricted,
            'video_upload_type' => $this->video_upload_type,
            'video_url_input' => $this->video_url_input,
            'download_status' => $this->download_status,
            'enable_quality' => $this->enable_quality,
            'download_url' => $this->download_url,
            'poster_image' =>  $this->poster_url,
            'thumbnail_image' => $this->thumbnail_url,
            'is_watch_list' => $this->is_watch_list ?? false,
            'genres' => GenresResource::collection($genre_data),
            'plans' => PlanResource::collection($plans),
            'status' => $this->status,
            'is_likes' => $is_like,
        ];
    }
}
