<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirmation']));
        }
        // dd($request->all());

        try {
            // Create the user
            $user = User::create([
                'name' => trim($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(), // Auto-verify for now, you can change this later
            ]);


            return redirect()->route('login')
                ->with('success', 'Account created successfully! Login to continue' );

        } catch (\Exception $e) {
            return back()
                ->withErrors(['email' => 'An error occurred while creating your account. Please try again.'])
                ->withInput($request->except(['password', 'password_confirmation']));
        }
    }
}
