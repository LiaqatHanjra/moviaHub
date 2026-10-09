<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends BaseModel
{
    use SoftDeletes;
    protected $fillable = ['entertainment_id', 'user_id', 'is_like','profile_id','type'];
}
