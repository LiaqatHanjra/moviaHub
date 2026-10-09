<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntertainmentStreamLinks extends BaseModel
{
    use SoftDeletes;


    protected $table = 'entertainment_stream_links';

    protected $fillable = [
        'entertainment_id',
        'quality',
        'type',
        'url',
    ];
}
