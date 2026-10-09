<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class SettingsController extends Controller
{
    public function showByType($type)
    {
        
        $setting = Setting::where('type', $type)->first();

        
        if ($setting) {
            return response()->json($setting, 200);
        } else {
            return response()->json(['error' => 'Setting not found'], 404);
        }
    }
    
    
    
    public function update(Request $request, $id)
    {
        try {
            
            $request->validate([
                'type' => 'required|string',
                'config' => 'required|array', 
            ]);
            
            $setting = Setting::findOrFail($id);
            
            $setting->type = $request->input('type');
            $setting->config = json_encode($request->input('config')); 
            $setting->save();
            
            return response()->json(['message' => 'Settings updated successfully'], 200);

        } catch (ValidationException $e) {
            
            return response()->json(['errors' => $e->errors()], 422);

        } catch (ModelNotFoundException $e) {
            
            return response()->json(['error' => 'Setting not found'], 404);
            
        } catch (\Exception $e) {
            
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }
}
