<?php
use App\Models\User;
use App\Models\UserMultiProfile;
use Illuminate\Http\Request;
use App\Models\Device;

function getApiUser($user_id = '')
{
    if (empty($user_id)) {
        if (\auth('sanctum')->user()) {
            return User::find(\auth('sanctum')->user()->id);
        } else {
            return \auth('sanctum')->user();
        }
    } else {
        return User::query()->find($user_id);
    }
}

function getImageUrl($image, $default = null)
{
    if (empty($image)) {
        return $default ?? asset('uploads/default.jpg');
    }

    // Check if $image is a valid URL
    if (filter_var($image, FILTER_VALIDATE_URL)) {
        return $image;
    }

    // Otherwise, assume it's a local file in the uploads directory
    return asset('storage/' . $image);
}

/**
 * Get the active profile ID based on PROFILE_SESSION configuration
 *
 * @param Request $request
 * @param int|null $requestedProfileId
 * @return int|null
 */
function getActiveProfileId(Request $request, $requestedProfileId = null)
{
    // Check if profile session is enabled

    if ($requestedProfileId) {
        // Validate that the profile belongs to the authenticated user
        $user = auth('sanctum')->user();
        if ($user) {
            $profile = UserMultiProfile::where('id', $requestedProfileId)
                ->where('user_id', $user->id)
                ->first();

            if ($profile) {
                return $requestedProfileId;
            }
        }
    }

    return null;
}

/**
 * Get the active profile object based on PROFILE_SESSION configuration
 *
 * @param Request $request
 * @param int|null $requestedProfileId
 * @return UserMultiProfile|null
 */
function getCurrentProfile($user_id, $request)
{
    $device_id = $request->ip();

    return Device::where('user_id', $user_id)
        ->where('device_id', $device_id)
        ->value('active_profile');
}

/**
 * Validate if the requested profile ID is valid for the authenticated user
 *
 * @param int $profileId
 * @return bool
 */
function validateProfileId($profileId)
{
    $user = auth('sanctum')->user();
    if (!$user) {
        return false;
    }

    return UserMultiProfile::where('id', $profileId)
        ->where('user_id', $user->id)
        ->exists();
}

function getIdsBySlug($slug)
{
    return json_decode(App\Models\SiteSetting::getValueBySlug($slug));
}

/**
 * Get device limits for the authenticated user
 *
 * @param int|null $userId
 * @return array
 */
function getUserDeviceLimits($userId = null)
{
    $user = $userId ? User::find($userId) : getApiUser();

    if (!$user) {
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

    return $user->getDeviceLimit();
}

/**
 * Check if authenticated user's device type is supported
 *
 * @param string $deviceType
 * @param int|null $userId
 * @return bool
 */
function isUserDeviceTypeSupported($deviceType, $userId = null)
{
    $user = $userId ? User::find($userId) : getApiUser();

    if (!$user) {
        return $deviceType === 'mobile'; // Default: only mobile supported
    }

    return $user->isDeviceTypeSupported($deviceType);
}

/**
 * Get maximum device count for authenticated user
 *
 * @param int|null $userId
 * @return int
 */
function getUserMaxDeviceCount($userId = null)
{
    $user = $userId ? User::find($userId) : getApiUser();

    if (!$user) {
        return 1; // Default: 1 device
    }

    return $user->getMaxDeviceCount();
}

