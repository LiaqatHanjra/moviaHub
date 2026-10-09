<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EntertainmentCast;

class CastCrew extends Model
{
    use SoftDeletes;

    protected $table = 'cast_crews';

    protected $fillable = ['name', 'type', 'file_url', 'tmdb_id', 'bio', 'place_of_birth', 'dob', 'designation'];

    protected $casts = [
        'dob' => 'date',
    ];

    public function entertainmentTalentMappings()
    {
        return $this->hasMany(EntertainmentCast::class, 'cast_id', 'id');
    }

    /**
     * Get the favorite personalities for this cast/crew member
     */
    public function favoritePersonalities()
    {
        return $this->hasMany(FavoritePersonality::class, 'cast_crew_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($castcrew) {

            if ($castcrew->isForceDeleting()) {

                $castcrew->entertainmentTalentMappings()->forcedelete();
            } else {
                $castcrew->entertainmentTalentMappings()->delete();
            }
        });

        static::restoring(function ($castcrew) {

            $castcrew->entertainmentTalentMappings()->withTrashed()->restore();
        });
    }
}
