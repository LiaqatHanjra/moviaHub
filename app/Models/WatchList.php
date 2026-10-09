<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class WatchList extends BaseModel
{
    use SoftDeletes;

    protected $fillable = ['entertainment_id','user_id','type','profile_id'];

    public function entertainment()
    {
        return $this->hasOne(Entertainment::class, 'id', 'entertainment_id')->with('entertainmentGenerMappings');
    }
}
