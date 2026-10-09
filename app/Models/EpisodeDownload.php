<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;

class EpisodeDownload extends BaseModel
{
    protected $table = 'episode_downloads';

    protected $fillable = [

        'episode_id',
        'type',
        'quality',
        'url',
        'device_id'

    ];
}
