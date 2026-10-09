<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpisodeStreamLinks extends BaseModel
{
    use SoftDeletes;

    protected $table = 'episode_stream_links';

    protected $fillable = ['episode_id','quality','type','url'];
}
