<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'balance',
        'payment_method',
        'stripe_id',
        'jazz_cash_id',
        'easy_pay_id',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(WalletTransaction::class, 'wallet_id');
    }
}
