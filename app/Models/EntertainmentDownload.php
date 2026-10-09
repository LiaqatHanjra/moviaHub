<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntertainmentDownload extends BaseModel
{
    use SoftDeletes;

    protected $table = 'entertainment_downloads';
    protected $fillable = ['entertainment_id', 'user_id', 'entertainment_type', 'is_download', 'type', 'quality', 'url','device_id'];
}
