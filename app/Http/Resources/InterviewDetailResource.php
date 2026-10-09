<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Plan;
use App\Models\Like;
use App\Models\WatchList;
use App\Models\Podcast;
use App\Http\Resources\PlanResource;
use App\Http\Resources\InterviewListResource;
use App\Http\Resources\PodcastSeasonResource;
use App\Http\Resources\PodcastEpisodeResource;
use App\Models\CastCrew;
use App\Http\Resources\CastCrewListResource;
use App\Http\Resources\GenresResource;
use Carbon\Carbon;

class InterviewDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
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
        if (!empty($this->video_url)) {
            $streamLinks[] = [
                'quality' => $this->video_upload_type,
                'url' => $this->video_url,
            ];
        }

        $downloadMappings = [];

        // Get related interviews
        $relatedInterviews = Podcast::where('type', 'interview')
            ->where('status', 1)
            ->where('id', '!=', $this->id)
            ->orderBy('release_date', 'desc')
            ->limit(10)
            ->get();

        // Process artists to get cast and directors
        $casts = [];
        $directors = [];

        if ($this->artist && is_array($this->artist)) {
            foreach ($this->artist as $mapping) {
                $cast = CastCrew::where('name', $mapping)->where('type', 'actor')->first();
                if($cast){
                    $casts[] = $cast;
                }
                $director = CastCrew::where('name', $mapping)->where('type', 'director')->first();
                if($director){
                    $directors[] = $director;
                }
            }
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
            'imdb_rating' => $this->rating,
            'content_rating' => $this->content_rating,
            'watched_time' => optional($this->continue_watch)->watched_time ?? null,
            'total_watched_time' => optional($this->continue_watch)->total_watched_time ?? null,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'release_year' => $this->release_date ? Carbon::parse($this->release_date)->year : null,
            'is_restricted' => $this->is_restricted,
            'video_upload_type' => $this->video_upload_type,
            'video_url_input' => $this->video_url,
            'enable_quality' => $this->enable_quality,
            'is_download' => $this->is_download ?? false,
            'download_status' => $this->download_status,
            'download_type' => $this->download_type,
            'download_url' => $this->download_url,
            'enable_download_quality' => $this->enable_download_quality ?? false,
            'download_quality' => $downloadMappings,
            'poster_image' => $this->poster_url,
            'thumbnail_image' => $this->thumbnail_url,
            'is_watch_list' => $isInWatchList,
            'is_likes' => $is_like,
            'plans' => PlanResource::collection($plans),
            'reviews' => [],
            'video_links' => $streamLinks,
            'more_items' => InterviewListResource::collection($relatedInterviews),
            'status' => $this->status,
            'download_id' => null,
            'countries' => $this->countries ?? [],
            'your_review' => $this->your_review ?? null,
            'genres' => GenresResource::collection($genre_data),
            'casts' => CastCrewListResource::collection($casts),
            'directors' => CastCrewListResource::collection($directors),
            'artist' => $this->artist ?? [],
        ];
    }
}
