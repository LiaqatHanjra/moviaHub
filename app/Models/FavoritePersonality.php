<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritePersonality extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cast_crew_id',
    ];

    /**
     * Get the user that owns the favorite personality
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the cast/crew member that is favorited
     */
    public function castCrew()
    {
        return $this->belongsTo(CastCrew::class);
    }
}
