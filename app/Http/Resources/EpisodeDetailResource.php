<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\WatchList;
use App\Models\Episode;
use App\Models\Like;
use App\Models\EntertainmentGenres;
use App\Models\Entertainment;
use App\Models\Season;
use Carbon\Carbon;
use App\Http\Resources\EpisodesResource;
use App\Http\Resources\GenresResource;
use App\Models\EntertainmentDownload;

class EpisodeDetailResource extends JsonResource
{
    protected $userId;
    public function __construct($resource, $userId = null)
    {
        $loginUser = getApiUser();
        parent::__construct($resource);
        $this->userId = $loginUser->id;
    }


    public function toArray(Request $request): array
    {

        $seasons = Season::where('entertainment_id', $this->resource->entertainment_id)->get();
        $getEntertainment = Entertainment::where('id', $this->entertainment_id)->first();

        $tvShowLinks = [];
        foreach($seasons as $season){
            $episodes = Episode::where('season_id', $season->id)->get();
            $totalEpisodes = $episodes->count();
            $episodes = $episodes->where('id','>',$this->id);
            $tvShowLinks[] = [
                'season_id' => $season->id,
                'name' => $season->name,
                'short_desc' => $season->short_desc,
                'description' => strip_tags($season->description),
                'poster_image' => $season->poster_url,
                'trailer_url_type' => $season->trailer_url_type,
                'trailer_url ' => $season->trailer_url,
                'total_episodes' => $totalEpisodes,
                'episodes' => EpisodesResource::collection(
                                    $episodes->take(5)->map(function ($episode) {
                                        return new EpisodesResource($episode, $this->user_id);
                                    })
                                ),
            ];

        }

        $more_items = Episode::where('entertainment_id', $this->entertainment_id)->where('status',1)->get()->except($this->id);
        $downloadMappings = $this->episodeDownloadMappings ? $this->episodeDownloadMappings->toArray() : [];

        if ($this->download_status == 1) {

           if($this->download_type != null &&  $this->download_url !=null){

            $downloadData = [
                'type' => $this->download_type,
                'url' => $this->download_url,
                'quality' => 'default',
            ];
            $downloadMappings[] = $downloadData;

          }
        }
        $download = EntertainmentDownload::where('entertainment_id', $this->entertainment_id)->where('user_id',  $this->user_id)->where('entertainment_type', 'episode')->where('is_download', 1)->first();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'entertainment_id' => $this->entertainment_id,
            'entertainment_name' => $getEntertainment->name,
            'season_id' => $this->season_id,
            'episode_number' => $this->episode_number,
            'trailer_url_type' => $this->trailer_url_type,
            'trailer_url' => $this->trailer_url,
            'access' => $this->access,
            'plan_id' => $this->plan_id,
            'imdb_rating' => $this->IMDb_rating,
            'content_rating' => $this->content_rating,
            'watched_time' => optional($this->continue_watch)->watched_time ?? null,
            'total_watched_time' => optional($this->continue_watch)->total_watched_time ?? null,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'is_restricted' => $this->is_restricted,
            'short_desc' => $this->short_desc,
            'description' => strip_tags($this->description),
            'video_upload_type' => $this->video_upload_type,
            'video_url_input' => $this->video_url_input,
            'enable_quality' => $this->enable_quality,
            'is_download' => $this->is_download ?? false,
            'download_status' => $this->download_status,
            'download_type' => $this->download_type,
            'download_url' => $this->download_url,
            'enable_download_quality' => $this->enable_download_quality,
            'download_quality' => $downloadMappings,
            'poster_image' =>$this->poster_url,
            'language' => optional($this->entertainmentdata)->language,
            'video_links' => $this->EpisodeStreamContentMapping ?? null,
            'plan' => new PlanResource($this->plan),
            'genres' => GenresResource::collection($this->genre_data ?? []),
            'more_items' => EpisodesResource::collection($more_items),
            'download_id' => !empty($download) ? $download->id: null,
            'is_play' =>$this->is_play,
        ];
    }
}
