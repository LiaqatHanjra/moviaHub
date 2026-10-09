<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Str;

class Entertainment extends BaseModel
{
    use SoftDeletes;

    protected $table = 'entertainments';

    protected $fillable = [
        'name',
        'tmdb_id',
        'description',
        'trailer_url_type',
        'trailer_url',
        'poster_url',
        'thumbnail_url',
        'movie_access',
        'type',
        'plan_id',
        'status',
        'language',
        'IMDb_rating',
        'content_rating',
        'duration',
        'release_date',
        'is_restricted',
        'video_upload_type',
        'enable_quality',
        'video_url_input',
        'download_status',
        'download_type',
        'download_url',
        'enable_download_quality',
        'video_quality_url',
        'new',
        'logo'

    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'status' => 'boolean',
        'is_restricted' => 'boolean',
        'release_date' => 'date',
    ];

    public function entertainmentGenerMappings()
    {
        return $this->hasMany(EntertainmentGenres::class,'entertainment_id','id')->with('genre');
    }
    public function entertainmentCountryMappings()
    {
        return $this->hasMany(EntertainmentCountry::class,'entertainment_id','id')->with('country');
    }

    public function entertainmentStreamContentMappings()
    {
        return $this->hasMany(EntertainmentStreamLinks::class,'entertainment_id','id');
    }

    public function entertainmentDownloadMappings()
    {
        return $this->hasMany(EntertainmentDownloadMapping::class,'entertainment_id','id');
    }


    public function EntertainmentDownload()
    {
        return $this->hasMany(EntertainmentDownload::class,'entertainment_id','id');
    }


    public function entertainmentTalentMappings()
    {
        return $this->hasMany(EntertainmentCast::class,'entertainment_id','id')->with('talentprofile');
    }

    public function entertainmentReviews()
    {
        return $this->hasMany(Review::class,'entertainment_id','id');
    }

    public function entertainmentLike()
    {
        return $this->hasMany(Like::class,'entertainment_id','id');
    }

    public function entertainmentView()
    {
        return $this->hasMany(EntertainmentView::class, 'entertainment_id', 'id');
    }


    public function Watchlist()
    {
        return $this->hasMany(WatchList::class,'entertainment_id','id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($movie) {
            if (empty($movie->slug)) {
                $baseSlug = Str::slug($movie->name);
                $slug = $baseSlug;
                $i = 1;
                while (self::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $i;
                    $i++;
                }
                $movie->slug = $slug;
            }
        });

        static::updating(function ($movie) {
            if ($movie->isDirty('name')) {
                $baseSlug = Str::slug($movie->name);
                $slug = $baseSlug;
                $i = 1;
                while (self::where('slug', $slug)->where('id', '!=', $movie->id)->exists()) {
                    $slug = $baseSlug . '-' . $i;
                    $i++;
                }
                $movie->slug = $slug;
            }
        });

        static::deleting(function ($entertainment) {

            if ($entertainment->isForceDeleting()) {

                $entertainment->entertainmentGenerMappings()->forceDelete();
                $entertainment->entertainmentStreamContentMappings()->forceDelete();
                $entertainment->entertainmentTalentMappings()->forceDelete();
                $entertainment->entertainmentReviews()->forceDelete();
                $entertainment->entertainmentDownloadMappings()->forceDelete();
                $entertainment->EntertainmentDownload()->forceDelete();
                $entertainment->entertainmentLike()->forceDelete();
                $entertainment->Watchlist()->forceDelete();


            } else {

                $entertainment->entertainmentGenerMappings()->delete();
                $entertainment->entertainmentStreamContentMappings()->delete();
                $entertainment->entertainmentTalentMappings()->delete();
                $entertainment->entertainmentReviews()->delete();
                $entertainment->entertainmentDownloadMappings()->delete();
                $entertainment->EntertainmentDownload()->delete();
                $entertainment->entertainmentLike()->delete();
                $entertainment->Watchlist()->delete();

            }

        });

        static::restoring(function ($entertainment) {

            $entertainment->entertainmentGenerMappings()->withTrashed()->restore();
            $entertainment->entertainmentStreamContentMappings()->withTrashed()->restore();
            $entertainment->entertainmentTalentMappings()->withTrashed()->restore();
            $entertainment->entertainmentReviews()->withTrashed()->restore();
            $entertainment->entertainmentDownloadMappings()->withTrashed()->restore();
            $entertainment->EntertainmentDownload()->withTrashed()->restore();
            $entertainment->entertainmentLike()->withTrashed()->restore();
            $entertainment->Watchlist()->withTrashed()->restore();
        });
    }

    public function season()
    {
        return $this->hasMany(Season::class, 'entertainment_id')->with( 'episodes');
    }


    public function episode()
    {
        return $this->hasMany(Episode::class,'entertainment_id')->with('EpisodeStreamContentMapping');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
