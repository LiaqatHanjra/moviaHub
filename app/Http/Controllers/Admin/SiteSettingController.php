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
            'slug' => 'required',
            'position' => 'nullable',
            'value' => 'nullable|array', // Allow empty array
        ]);

        // Get the value array directly from the request
        $value = $request->input('value', []);

        // Prepare data for saving
        $data = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'position' => $request->input('position'),
            'value' => $value, // Store the array directly
        ];

        // Update or create the setting
        $setting = SiteSetting::updateOrCreate(
            ['slug' => $data['slug']],
            $data
        );

        return response()->json(['message' => 'Successfully added.'], 200);
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
