<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMultiProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_multi_profilrs';

    protected $fillable = [
        'user_id',
        'name',
        'avatar',
        'user_type',
        'isKid',
        'session_token',
        'pin',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'isKid' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
