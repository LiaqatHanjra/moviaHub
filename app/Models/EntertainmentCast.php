<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CastCrew;

class EntertainmentCast extends BaseModel
{
    use SoftDeletes;

    protected $table = 'entertainment_casts';

    protected $fillable = [

        'entertainment_id',
        'cast_id',

    ];


    public function talentprofile()
    {
        return $this->belongsTo(CastCrew::class,'cast_id');
    }
}
