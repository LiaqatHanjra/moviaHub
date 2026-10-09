<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\EntertainmentGenres;
use App\Models\BaseModel;
use Illuminate\Support\Str;


class Genre extends BaseModel
{
    use SoftDeletes;

    protected $table = 'genres';

    protected $fillable = ['name','slug','file_url', 'description', 'status'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(trim($value));

        if (empty($value)) {
            $this->attributes['slug'] = Str::slug(trim($this->attributes['name']));
        }
    }


    public function entertainmentGenerMappings()
    {
        return $this->hasMany(EntertainmentGenres::class,'genre_id','id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($genre) {

            if ($genre->isForceDeleting()) {

                $genre->entertainmentGenerMappings()->forcedelete();

            } else {
                $genre->entertainmentGenerMappings()->delete();
             }

        });

        static::restoring(function ($genre) {

            $genre->entertainmentGenerMappings()->withTrashed()->restore();

        });
    }
}
