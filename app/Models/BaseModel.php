<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
        'updated_at',
        '_token',
        '_method',
    ];

    protected $dates = [
        'deleted_at',
        'published_at',
    ];

    public function createdUser()
    {
        return $this->userRelation('created_by');
    }

    public function updatedUser()
    {
        return $this->userRelation('updated_by');
    }

    public function deletedUser()
    {
        return $this->userRelation('deleted_by');
    }

    public function userRelation($field_name)
    {
        return $this->belongsTo(User::class, $field_name, 'id');
    }

    /**
     *  Set 'Name' attribute value.
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = trim($value);
    }

    /**
     * Set the 'Slug'.
     * If no value submitted 'Name' will be used as slug
     * str_slug helper method was used to format the text.
     *
     * @param [type]
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(trim($value));

        if (empty($value)) {
            $this->attributes['slug'] = Str::slug(trim($this->attributes['name']));
        }
    }
}
