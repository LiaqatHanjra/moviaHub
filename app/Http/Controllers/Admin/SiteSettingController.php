<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{

    public function settings()
    {
        return view("settings.settings");
    }

    public function addSettingValues(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'position' => 'nullable|integer',
            'value' => 'nullable|array',
            'value.*' => 'integer',
        ]);

        $slug = $request->input('slug');
        $value = array_values(array_map('intval', $request->input('value', [])));
        $position = $request->input('position');

        if ($position === null || $position === '') {
            $position = $this->defaultPosition($slug);
        }

        $setting = SiteSetting::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => $request->input('name'),
                'slug' => $slug,
                'position' => (int) $position,
                'value' => $value,
            ]
        );

        return response()->json([
            'message' => 'Saved successfully.',
            'setting' => $setting,
        ], 200);
    }

    private function defaultPosition(string $slug): int
    {
        return match ($slug) {
            'top-10' => 1,
            'latest-movies' => 2,
            'popular-movies' => 3,
            'popular-tv-shows' => 4,
            default => 0,
        };
    }

    public function getSettingBySlug($slug)
    {
        $setting = SiteSetting::where('slug', $slug)->first();

        if (!$setting) {
            return response()->json(null, 404);
        }

        return response()->json($setting, 200);
    }


}
