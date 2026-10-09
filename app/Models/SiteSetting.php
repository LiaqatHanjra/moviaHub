<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = "site_settings";
    protected $fillable = ['name', 'value', 'slug', 'position'];

    protected $casts = ['value' => 'array'];

    public static function getValueBySlug($slug)
    {
        $setting = self::where('slug', $slug)->first();

        return $setting ? $setting->value : null;
    }
}
