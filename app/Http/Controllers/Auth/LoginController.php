<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\AdminLog;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return back()
                ->withErrors(['email' => 'These credentials do not match our records.'])
                ->withInput($request->only('email'));
        }

        $user = Auth::user();

        if (!$user->email_verified_at) {
            Auth::logout();
            return back()
                ->withErrors(['email' => 'Please activate your account by verifying your email.'])
                ->withInput($request->only('email'));
        }

        AdminLog::create([
            'user_id' => $user->id,
            'username' => $user->name,
            'email' => $user->email,
            'login_at' => Carbon::now(),
        ]);

        if($user->admin === 1){
            return redirect()->route('admin.dashboard.index')->with('success', 'Welcome back, ' . $user->name . '!');
        }else{
            Auth::logout();
            return back()
                ->withErrors(['Sorry, Only Admin can access this application.'])
                ->withInput($request->only('email'));
        }

    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = Auth::user();
        $getUser = User::where('id', $user->id)->first();

        $getUser->password = Hash::make($request->password);
        $getUser->save();

        return response()->json([
            'message' => 'Password changed successfully',
        ]);

    }
}
