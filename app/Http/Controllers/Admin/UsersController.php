<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminLog;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::with(['profile'])->whereNot('admin', 1)
                ->orderBy('id', 'desc')
                ->select(['id', 'name', 'email', 'phone', 'gender', 'is_banned', 'is_subscribe', 'status']);

            return DataTables::of($users)
                ->addColumn('user', function ($user) {
                    $profileImage = $user->profile && $user->profile->image
                        ? $user->profile->image
                        : asset('backend/assets/images/profile_av.png');
                    return '
                        <div class="d-flex align-items-center">
                            <img src="' . $profileImage . '" alt="' . e($user->name) . '" class="rounded-circle me-2" width="40" height="40">
                            <div>
                                <strong>' . e($user->name) . '</strong><br>
                                <small>' . e($user->email) . '</small>
                            </div>
                        </div>';
                })
                ->addColumn('contact_number', function ($user) { // Match Blade's 'contact_number'
                    return $user->phone ? e($user->phone) : '--';
                })
                ->addColumn('gender', function ($user) { // Use 'gender' instead of 'gander'
                    return $user->gender ? ucfirst(e($user->gender)) : '--';
                })
                ->addColumn('status', function ($user) {
                    $checked = $user->status ? 'checked' : '';
                    return '
                    <div class="form-check form-switch">
                        <input class="form-check-input users-status-toggle" type="checkbox" data-id="' . $user->id . '" ' . $checked . '>
                    </div>';
                })
                ->addColumn('action', function ($user) {
                    return '
                        <div class="d-flex justify-content-center align-items-center">
                        <a href="' . route('admin.users.show', $user->id) . '" class="btn btn-sm btn-primary me-1"><i class="bi bi-eye"></i></a>
                            <a href="' . route('admin.users.edit', $user->id) . '" class="btn btn-sm btn-primary me-1"><i class="bi bi-pencil"></i></a>
                            <form class="mb-0" action="' . route('admin.users.destroy', $user->id) . '" method="POST" onsubmit="return confirm(\'Are you sure?\');">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>';
                })
                ->rawColumns(['user', 'status', 'action'])
                ->toJson();
        }

        return view('users.index'); // Match the Blade template path
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'gender' => 'required|in:male,female,other',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'profile_image' => 'nullable',
            'is_subscribe' => 'nullable|boolean',
        ]);

        $userData = [
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'dob' => $validated['dob'],
            'address' => $validated['address'],
            'status' => filter_var($validated['status'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            'is_subscribe' => filter_var($validated['is_subscribe'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
        ];

        // Create the user
        $user = User::create($userData);

        // Create the profile
        $profileData = ['user_id' => $user->id];
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profiles', 'spaces');
            $profileData['image'] = Storage::disk('spaces')->url($path);
        }else{
            $profileData['image'] = $request->profile_image;
        }
        $profile = Profile::create($profileData);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'User created successfully']);
        }

        return redirect()->route('admin.users.index')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->with('profile')->first();

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->with('profile')->first();

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female,other',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'profile_image' => 'nullable',
            'is_subscribe' => 'nullable|boolean',
        ]);

        $userData = [
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'dob' => $validated['dob'],
            'address' => $validated['address'],
            'status' => filter_var($validated['status'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            'is_subscribe' => filter_var($validated['is_subscribe'],FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)
        ];

        $user->update($userData);

        // Update or create the profile
        $profile = $user->profile ?? Profile::create(['user_id' => $user->id]);

        if ($request->hasFile('profile_image')) {
            if ($profile->image) {
                $parsed = parse_url($profile->image, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');
                if (!empty($oldPath) && Storage::disk('spaces')->exists($oldPath)) {
                    Storage::disk('s3')->delete($oldPath);
                }
            }

            $path = $request->file('profile_image')->store('profiles', 'spaces');
            $profile_image_path = Storage::disk('spaces')->url($path);
            $profile->update(['image' => $profile_image_path]);
        }else{
            $profile->update(['image' => $request->profile_image]);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        }

        return redirect()->route('admin.users.index')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $user = User::with('profile')->findOrFail($id);

        if ($user->profile && $user->profile->image) {
            $parsed = parse_url($user->profile->image, PHP_URL_PATH);
            $oldPath = ltrim($parsed, '/');
            if (!empty($oldPath) && Storage::disk('spaces')->exists($oldPath)) {
                Storage::disk('spaces')->delete($oldPath);
            }
        }

        $user->delete();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'User deleted successfully']);
        }

        return redirect()->route('admin.users.index')->with('message', 'User deleted successfully');
    }

    public function toggleStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => true]);
    }


    public function adminLogs(Request $request)
    {
        if ($request->ajax()) {
            $adminLogs = AdminLog::select(['admin_logs.id', 'admin_logs.username', 'admin_logs.email', 'admin_logs.login_at'])
                ->leftJoin('users', 'users.id', 'admin_logs.user_id')
                ->orderBy('admin_logs.id', 'desc');

            $logType = $request->get('log_type');
            if ($logType === 'admin') {
                $adminLogs->where('users.admin', 1);
            } elseif ($logType === 'users') {
                $adminLogs->where('users.admin', 0);
            }

            return DataTables::of($adminLogs)
                ->addColumn('user', function ($log) {
                    return '
                        <div class="d-flex align-items-center">
                            <div>
                                <strong>' . e($log->username) . '</strong><br>
                                <small>' . e($log->email) . '</small>
                            </div>
                        </div>';
                })
                ->addColumn('action', function () {
                    return '';
                })
                ->rawColumns(['user', 'action'])
                ->toJson();
        }

        return view('logs.index');
    }
}
