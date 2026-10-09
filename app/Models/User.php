<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\CustomResetPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'email_verified_at',
        'email_verification_token',
        'gender',
        'phone',
        'is_banned',
        'is_subscribe',
        'status',
        'dob',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token, $this->email));
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

      public function userMultiProfile()
    {
        return $this->hasMany(UserMultiProfile::class, 'user_id', 'id');
    }

    public function subscriptionPackage()
    {
        return $this->hasOne(Subscription::class, 'user_id', $this->id)->latest();
    }

    public function getCurrentPlan()
    {
        $activeSubscriptions = Subscription::where('user_id', $this->id)
                                ->where('status', 1)
                                ->latest()
                                ->first();

        if (!$activeSubscriptions) {
            return null;
        }

        return $activeSubscriptions->plan_id;
    }

    /**
     * Get user's device limit based on their active subscription plan
     *
     * @return array
     */
    public function getDeviceLimit()
    {
        $activeSubscription = Subscription::where('user_id', $this->id)
            ->where('status', 'active')
            ->orderBy('id', 'desc')
            ->first();

        if (!$activeSubscription) {
            return [
                'device_limit' => 1,
                'supported_devices' => [
                    'mobile' => 1,
                    'tablet' => 0,
                    'laptop' => 0
                ],
                'has_subscription' => false
            ];
        }

        // Get the plan and its limitations
        $plan = $activeSubscription->plan;
        if (!$plan) {
            return [
                'device_limit' => 1,
                'supported_devices' => [
                    'mobile' => 1,
                    'tablet' => 0,
                    'laptop' => 0
                ],
                'has_subscription' => false
            ];
        }

        $planLimitations = $plan->planLimitation;

        $deviceLimit = 1; // Default device limit
        $supportedDevices = [
            'mobile' => 1,  // Mobile is always supported
            'tablet' => 0,
            'laptop' => 0
        ];

        // Extract device limit and supported device types from plan limitations
        foreach ($planLimitations as $limitation) {
            switch ($limitation->limitation_slug) {
                case 'device-limit':
                    $deviceLimit = (int) $limitation->limit;
                    break;

                case 'supported-device-type':
                    $deviceTypes = json_decode($limitation->limit, true);
                    if (is_array($deviceTypes)) {
                        $supportedDevices = array_merge($supportedDevices, $deviceTypes);
                    }
                    break;
            }
        }

        return [
            'device_limit' => $deviceLimit,
            'supported_devices' => $supportedDevices,
            'has_subscription' => true,
            'plan_name' => $plan->name,
            'subscription_end_date' => $activeSubscription->end_date
        ];
    }

    /**
     * Check if a specific device type is supported by user's plan
     *
     * @param string $deviceType (mobile, tablet, laptop)
     * @return bool
     */
    public function isDeviceTypeSupported($deviceType)
    {
        $deviceLimits = $this->getDeviceLimit();
        return isset($deviceLimits['supported_devices'][$deviceType]) &&
               $deviceLimits['supported_devices'][$deviceType] == 1;
    }

    /**
     * Get the maximum number of devices user can use simultaneously
     *
     * @return int
     */
    public function getMaxDeviceCount()
    {
        $deviceLimits = $this->getDeviceLimit();
        return $deviceLimits['device_limit'];
    }

    /**
     * Get the user's favorite personalities
     */
    public function favoritePersonalities()
    {
        return $this->hasMany(FavoritePersonality::class);
    }

}
