@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="ps-md-4 pe-md-3 px-2 py-3 page-body">
        <div class="card border-0">
            <div class="card-header bg-card pb-3">
                <h6 class="card-title mb-0">My Profile</h6>
                <div class="dropdown card-action">
                    <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full Screen">
                        <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 16m0 1a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1z"></path>
                            <path d="M4 12v-6a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-6"></path>
                            <path d="M12 8h4v4"></path>
                            <path d="M16 8l-5 5"></path>
                        </svg>
                    </a>
                    <a href="#" class="dropdown-toggle after-none" data-bs-toggle="dropdown" aria-expanded="false"
                        title="More Action">
                        <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M8 12l0 .01"></path>
                            <path d="M12 12l0 .01"></path>
                            <path d="M16 12l0 .01"></path>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow rounded-4 p-2">
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-share"></i>Share</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-pencil"></i>Rename</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-link"></i>Copy Link Address</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-folder"></i>Move to</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-copy"></i>Copy to</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-edit"></i>Make Private</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-download"></i>Download</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill card-options-remove"
                            data-toggle="card-remove"><i class="me-2 fa fa-trash"></i>Delete</a>
                    </div>
                </div>

                <div class="d-flex align-items-md-start align-items-center flex-column flex-md-row mt-4 w-100">
                    <div class="position-relative profile-image-container">
                        <div class="profile-image-container-section image-upload-box">
                            <img src="{{ auth()->user()->profile->image ? auth()->user()->profile->image : 'https://via.placeholder.com/140?text=No+Image' }}"
                                 id="currentProfileImage" class="rounded-4 w-100 h-100">
                            <span id="image_placeholder" style="display: none;">
                                <i class="bi bi-image"></i>
                            </span>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm position-absolute bottom-0 end-0 rounded-circle"
                            style="width: 30px; height: 30px; padding: 0; font-size: 12px; z-index: 10;" title="Edit Image"
                            onclick="document.getElementById('profileImage').click();">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <input type="file" id="profileImage" name="profile_image" accept="image/*" style="display: none;">
                        @error('profile_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center">
                        @php
                            $nameParts = explode(' ', auth()->user()->name ?? '', 2);
                            $firstName = ucfirst($nameParts[0] ?? '');
                            $lastName = isset($nameParts[1]) ? ucfirst($nameParts[1]) : '';
                        @endphp
                        <h4 class="mb-1" id="profileName">{{ $firstName }} {{ $lastName }}</h4>
                        <p>{{ auth()->user()->email ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row g-4">
                    <div class="col-xl-12 col-lg-12">
                        <h4 class="card-title mb-0">Edit Profile</h4>
                        <form id="profileForm" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3 my-3">
                                <div class="col-sm-6 col-md-6">
                                    <label class="col-form-label fw-bold">First Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ old('first_name', $nameParts[0] ?? '') }}" required>
                                        <div class="form-icon position-absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                            </svg>
                                        </div>
                                    </fieldset>
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label class="col-form-label fw-bold">Last Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ old('last_name', $nameParts[1] ?? '') }}">
                                        <div class="form-icon position-absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                            </svg>
                                        </div>
                                    </fieldset>
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', auth()->user()->email ?? '') }}" readonly>
                                        <div class="form-icon position-absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                            </svg>
                                        </div>
                                    </fieldset>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info py-2 px-4 update-profile-btn">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-dismiss alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });

            // Preview image before upload
            const profileImageInput = document.getElementById('profileImage');
            if (profileImageInput) {
                profileImageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        // Validate file type (file size validation removed - uploading to S3)
                        if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
                            showAlert('Please select a valid image file (JPEG, PNG, GIF).', 'danger');
                            this.value = '';
                            return;
                        }
                        // File size validation removed

                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const currentImage = document.getElementById('currentProfileImage');
                            const placeholder = document.getElementById('image_placeholder');
                            if (currentImage) {
                                currentImage.src = e.target.result;
                                currentImage.style.display = 'block';
                                placeholder.style.display = 'none';
                            }
                            // Update header image
                            const headerImg = document.querySelector('.nav-profile-img');
                            if (headerImg) {
                                headerImg.src = e.target.result;
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Handle form submission
            const profileForm = document.getElementById('profileForm');
            if (profileForm) {
                profileForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const submitBtn = this.querySelector('.update-profile-btn');
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = 'Processing...';

                    const formData = new FormData(this);
                    const profileImageInput = document.getElementById('profileImage');
                    if (profileImageInput && profileImageInput.files.length > 0) {
                        formData.append('profile_image', profileImageInput.files[0]);
                    }

                    fetch(this.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Update Profile';

                        if (data.success) {
                            // Update header image
                            const headerImg = document.querySelector('.nav-profile-img');
                            if (data.image_url && headerImg) {
                                headerImg.src = data.image_url;
                            }

                            // Update displayed name
                            const nameElement = document.getElementById('profileName');
                            if (data.first_name || data.last_name) {
                                nameElement.textContent = `${data.first_name || ''} ${data.last_name || ''}`.trim();
                            }

                            showAlert(data.message || 'Profile updated successfully!', 'success');
                        } else {
                            // Display validation errors or server message
                            if (data.errors) {
                                Object.values(data.errors).forEach(error => {
                                    showAlert(error[0], 'danger');
                                });
                            } else {
                                showAlert(data.message || 'Error updating profile.', 'danger');
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Update Profile';
                        showAlert('Error updating profile. Please try again.', 'danger');
                    });
                });
            }

            // Function to show alerts
            function showAlert(message, type) {
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
                alertDiv.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                const cardBody = document.querySelector('.card-body');
                cardBody.insertBefore(alertDiv, cardBody.firstChild);
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alertDiv);
                    bsAlert.close();
                }, 5000);
            }
        });
    </script>
@endsection

<style>
    .profile-image-container {
        width: 140px;
        height: 140px;
        position: relative;
    }

    .profile-image-container-section.image-upload-box {
        width: 100%;
        height: 100%;
        border: 1px dashed #ccc;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: linear-gradient(135deg, #e0e0e0, #f5f5f5);
    }

    .profile-image-container-section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    .profile-image-container-section span {
        z-index: 2;
        color: #888;
        font-size: 44px;
    }
</style>
