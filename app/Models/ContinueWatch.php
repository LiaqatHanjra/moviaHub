<?php

namespace App\Models;

use App\Models\Episode;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContinueWatch extends BaseModel
{
    use SoftDeletes;

    protected $table = 'continue_watches';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['entertainment_id', 'user_id', 'entertainment_type', 'watched_time', 'total_watched_time','profile_id','episode_id'];

        public function entertainment()
    {
        return $this->hasOne(Entertainment::class, 'id', 'entertainment_id')->with('entertainmentGenerMappings');
    }

    public function episode()
    {
        return $this->hasOne(Episode::class,'id','entertainment_id');
    }


}
