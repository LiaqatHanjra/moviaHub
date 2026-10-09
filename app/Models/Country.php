<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends BaseModel
{
    use SoftDeletes;
     use HasFactory;

    protected $table = 'countries';
    protected $fillable=['name', 'status', 'code', 'dial_code', 'currency_name','symbol', 'currency_code'];
}
