<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\WatchList;
use App\Models\Like;

class MovieResource extends JsonResource
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

        if(!empty($genres)){

            foreach($genres as $genre) {

                $genre_data[] = [
                    'id' => $genre->id,
                    'name' => $genre->genre->name ?? null,
                ];
            }


        }

        $plans = [];
        $user = getApiUser();
        $is_like = 0;
        if($user) {

            $isInWatchList = WatchList::where('entertainment_id',$this->id)
                ->where('user_id', $user->id)
                ->exists();
            $isLiked = Like::where('entertainment_id',$this->id)
                ->where('user_id', $user->id)
                ->first();
            if($isLiked){
                $is_like = 1;
            }
        }else{
            $isInWatchList = $this->is_watch_list ?? false;
        }

        $streamLinks = [];

        foreach ($this->entertainmentStreamContentMappings as $stream) {
            if (!empty($stream->url) && $stream->url !== '[]') {
                $streamLinks[] = [
                    'quality' => $stream->quality,
                    'url' => $stream->url,
                ];
            }
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
            'plan_level' => 0,
            'language' => $this->language,
            'imdb_rating' => $this->IMDb_rating,
            'content_rating' => $this->content_rating,
            'duration' => $this->duration,
            'is_likes' => $is_like,
            'release_date' => $this->release_date,
            'is_restricted' => $this->is_restricted,
            'video_upload_type' => $this->video_upload_type,
            'video_url_input' => $this->video_url_input,
            'download_status' => $this->download_status,
            'enable_quality' => $this->enable_quality,
            'download_url' => $this->download_url,
            'video_links' => $streamLinks,
            'poster_image' => $this->poster_url ?? null,
            'thumbnail_image' => $this->thumbnail_url ?? null,
            'is_watch_list' => $isInWatchList ? true : false,
            'genres' => $genre_data,
            'plans' => $plans,
            'status' => $this->status,

        ];
    }
}
