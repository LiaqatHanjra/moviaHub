
@extends('layouts.app')

@section('title', 'View User')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>View User</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.users.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h6 class="fw-bold border-0">User Details</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="fw-bold">Profile Image</h6>
                            <div class="mb-3">
                                <div class="image-upload-box">
                                    <img src="{{ $user->profile && $user->profile->image ? asset('storage/' . $user->profile->image) : asset('backend/assets/images/profile_av.png') }}"
                                         alt="Profile Image"
                                         style="display:block;" />
                                </div>
                            </div>
                            <h6 class="fw-bold">Gender</h6>
                            <p>{{ $user->gender ? ucfirst($user->gender) : 'Not specified' }}</p>
                        </div>
                        <div class="col-md-4 ps-4">
                            <h6 class="fw-bold">First Name</h6>
                            <p>{{ explode(' ', $user->name)[0] ?? 'Not specified' }}</p>
                            <h6 class="fw-bold">Email</h6>
                            <p>{{ $user->email }}</p>
                            <h6 class="fw-bold">Date of Birth</h6>
                            <p>{{ $user->dob ? $user->dob : 'Not specified' }}</p>
                        </div>
                        <div class="col-md-4 ps-4">
                            <h6 class="fw-bold">Last Name</h6>
                            <p>{{ explode(' ', $user->name)[1] ?? 'Not specified' }}</p>
                            <h6 class="fw-bold">Contact Number</h6>
                            <p>{{ $user->phone ?? 'Not specified' }}</p>
                            <h6 class="fw-bold">Status</h6>
                            <p>{{ $user->status ? 'Active' : 'Inactive' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="fw-bold">Address</h6>
                            <p>{{ $user->address ?? 'Not specified' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .image-upload-box {
            width: 360px;
            height: 215px;
            border: 1px dashed #ccc;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .image-upload-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            padding: 20px;
            border-radius: 25px;
        }
    </style>
@endsection
