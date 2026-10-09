<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntertainmentView extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'entertainment_views';
    protected $fillable = ['entertainment_id', 'user_id', 'profile_id'];


    public function entertainment()
    {
        return $this->belongsTo(Entertainment::class, 'entertainment_id');
    }
}
