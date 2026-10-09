<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    use HasFactory;

    protected $table = 'admin_logs';

    protected $fillable = [
        'user_id',
        'username',
        'email',
        'login_at',
    ];
}
