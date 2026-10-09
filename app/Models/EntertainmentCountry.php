<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Country;

class EntertainmentCountry extends BaseModel
{
    use SoftDeletes;

    protected $table = 'entertainment_countries';

    protected $fillable = [

        'entertainment_id',
        'country_id',

    ];


    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
}
