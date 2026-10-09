<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Entertainment;
use App\Models\Season;
use App\Models\Plan;
use Illuminate\Support\Str;

class Episode extends BaseModel
{
        use SoftDeletes;

    protected $table = 'episodes';
    protected $fillable=[ 'name',
                          'entertainment_id',
                          'season_id',
                          'poster_url',
                          'trailer_url_type',
                          'trailer_url',
                          'access',
                          'plan_id',
                          'IMDb_rating',
                          'content_rating',
                          'duration',
                          'release_date',
                          'is_restricted',
                          'short_desc',
                          'description',
                          'enable_quality',
                          'video_upload_type',
                          'video_url_input',
                          'download_status',
                          'download_type',
                          'download_url',
                          'enable_download_quality',
                          'status',
                          'video_quality_url',
                          'tmdb_id',
                          'tmdb_season',
                          'episode_number'
                        ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($episode) {
            if (empty($episode->slug)) {
                $baseSlug = Str::slug($episode->name);
                $slug = $baseSlug;
                $i = 1;
                while (self::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $i;
                    $i++;
                }
                $episode->slug = $slug;
            }
        });

        static::updating(function ($episode) {
            if ($episode->isDirty('name')) {
                $baseSlug = Str::slug($episode->name);
                $slug = $baseSlug;
                $i = 1;
                while (self::where('slug', $slug)->where('id', '!=', $episode->id)->exists()) {
                    $slug = $baseSlug . '-' . $i;
                    $i++;
                }
                $episode->slug = $slug;
            }
        });


        static::deleting(function ($episode) {

            if ($episode->isForceDeleting()) {

                $episode->EpisodeStreamContentMapping()->forceDelete();
                $episode->episodeDownloadMappings()->forceDelete();

            } else {

                $episode->EpisodeStreamContentMapping()->delete();
                $episode->episodeDownloadMappings()->delete();
            }

        });

        static::restoring(function ($episode) {

            $episode->EpisodeStreamContentMapping()->withTrashed()->restore();
            $episode->episodeDownloadMappings()->delete();

        });
    }


    public function entertainmentdata()
    {
        return $this->belongsTo(Entertainment::class,'entertainment_id')->with('entertainmentGenerMappings');
    }


    public function seasondata()
    {
        return $this->belongsTo(Season::class,'season_id');
    }

    public function episodeDownloadMappings()
    {
        return $this->hasMany(EpisodeDownload::class, 'episode_id', 'id');
    }


    public function EpisodeStreamContentMapping()
    {
        return $this->hasMany(EpisodeStreamLinks::class,'episode_id','id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
