<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Genre;

class EntertainmentGenres extends BaseModel
{
    use SoftDeletes;

    protected $table = 'entertainment_genres';

    protected $fillable = [

        'entertainment_id',
        'genre_id',

    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class,'genre_id');
    }
}
