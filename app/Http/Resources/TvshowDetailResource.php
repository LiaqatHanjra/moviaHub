<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\WatchList;
use App\Models\Plan;
use App\Models\Like;
use App\Models\EntertainmentGenres;
use App\Models\Entertainment;
use App\Models\Subscription;
use Carbon\Carbon;
use App\Http\Resources\TVShowListResource;
use App\Http\Resources\GenresResource;
use App\Http\Resources\EpisodesResource;

class TvshowDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $user = getApiUser();
        $genre_data = [];
        $genres = $this->entertainmentGenerMappings;
        foreach ($genres as $genre) {
            $genre_data[] = $genre->genre;
        }

        $genre_ids = $genres->pluck('genre_id')->toArray();
        $entertaintment_ids = EntertainmentGenres::whereIn('genre_id', $genre_ids)->pluck('entertainment_id')->toArray();
        $more_items = Entertainment::whereIn('id', $entertaintment_ids)->where('type', 'tvshow')->where('status', 1)->limit(15)->get()->except($this->id);

        $plans = [];
        $plan = $this->plan;
        if ($plan) {
            $plans = Plan::where('level', '<=', $plan->level)->get();
        }

        $casts = [];
        $directors = [];
        foreach ($this->entertainmentTalentMappings as $mapping) {

            if ($mapping->talentprofile) {

                if ($mapping->talentprofile->type === 'actor') {
                    $casts[] = $mapping->talentprofile;
                } elseif ($mapping->talentprofile->type === 'director') {
                    $directors[] = $mapping->talentprofile;
                }
            }
        }
        // $getDeviceTypeData = Subscription::checkPlanSupportDevice($request->user_id);
        // $deviceTypeResponse = json_decode($getDeviceTypeData->getContent(), true); // Decode to associative array

        $isLiked = Like::where('entertainment_id', $this->id)
            ->where('user_id', getApiUser()->id)
            ->first();
        $is_like = 0;
        if ($isLiked) {
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
            'imdb_rating' => $this->IMDb_rating,
            'content_rating' => $this->content_rating,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'release_year' => Carbon::parse($this->release_date)->year,
            'is_restricted' => $this->is_restricted,
            'video_upload_type' => $this->video_upload_type,
            'video_url_input' => $this->video_url_input,
            'enable_quality' => $this->enable_quality,
            'download_url' => $this->download_url,
            'poster_image' => $this->poster_url,
            'thumbnail_image' => $this->thumbnail_url,
            'is_watch_list' => $this->is_watch_list ?? false,
            'is_likes' => $is_like,
            'your_review' => $this->your_review ?? null,
            'genres' => GenresResource::collection($genre_data),
            'reviews' => ReviewResource::collection($this->reviews),
            'casts' => CastCrewListResource::collection($casts),
            'directors' => CastCrewListResource::collection($directors),
            'episodes' => EpisodesResource::collection($this->episode),
            'more_items' => TVShowListResource::collection($more_items),
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'is_play' => $this->is_play,
            // 'is_device_supported' => $deviceTypeResponse['isDeviceSupported']
        ];
    }
}
