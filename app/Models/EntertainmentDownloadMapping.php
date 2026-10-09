<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;

class EntertainmentDownloadMapping extends BaseModel
{
    protected $table = 'entertainment_download_mappings';

    protected $fillable = [

        'entertainment_id',
        'type',
        'quality',
        'url',
    ];
}
