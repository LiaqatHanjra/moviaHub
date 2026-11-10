<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class UserMovies extends Model
{
    use HasFactory, SoftDeletes;

    public const RENTAL_DURATION_DAYS = 10;

    protected $fillable = [
        'user_id',
        'movie_id',
        'total_movies',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('created_at', '>', now()->subDays(self::RENTAL_DURATION_DAYS));
    }

    public function expiresAt(): Carbon
    {
        return $this->created_at->copy()->addDays(self::RENTAL_DURATION_DAYS);
    }

    public function remainingDays(): int
    {
        return max(0, (int) ceil(now()->diffInSeconds($this->expiresAt(), false) / 86400));
    }
}
