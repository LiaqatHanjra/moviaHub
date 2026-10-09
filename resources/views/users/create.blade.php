@extends('layouts.app')

@section('title', 'Create User')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Create User</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.users.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" id="user-create-form">
                @csrf
                <h6 class="fw-bold border-0 mt-3">About User</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="fw-bold">Image</h6>
                                <div class="mb-3">
                                    <label for="profile_image" class="image-upload-box" id="poster_box">
                                        <img id="poster_preview" src="#" alt="Poster Preview" style="display:none;" />
                                        <span id="poster_placeholder">
                                            <i class="bi bi-image"></i>
                                        </span>
                                    </label>
                                    <input type="file" name="profile_image" id="profile_image" accept="image/*" style="display:none;">
                                    @error('profile_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-bold">Gender</h6>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-check me-3 ps-4 ms-1">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="gender_male">Male</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender_female">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_other" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender_other">Other</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 ps-4">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label fw-bold">First Name</label>
                                    <input type="text" class="form-control ps-2 @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required placeholder="Enter first name">
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control ps-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Password</label>
                                    <input type="password" class="form-control ps-2 @error('password') is-invalid @enderror" name="password" required placeholder="Enter password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label fw-bold">Date of Birth</label>
                                    <input type="text" name="dob" class="form-control ps-2 f-basic flatpickr-input @error('dob') is-invalid @enderror" value="{{ old('dob') }}" placeholder="Select Date..." readonly="readonly">
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 ps-4">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label fw-bold">Last Name</label>
                                    <input type="text" class="form-control ps-2 @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required placeholder="Enter last name">
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label fw-bold">Contact Number</label>
                                    <input type="text" class="form-control ps-2 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter contact number">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                                    <input type="password" class="form-control ps-2 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required placeholder="Confirm password">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Status Checkbox -->
                                <div class="mb-3">
                                    <h6 class="fw-bold">Status</h6>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="status" value="0"> <!-- Hidden input for unchecked state -->
                                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                    @error('status')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Subscribe Checkbox -->
                                <div class="mb-3">
                                    <h6 class="fw-bold">Subscrib Access</h6>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="is_subscribe" value="0"> <!-- Hidden input for unchecked state -->
                                        <input class="form-check-input" type="checkbox" name="is_subscribe" id="is_subscribe" value="1" {{ old('is_subscribe', '0') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_subscribe">Active</label>
                                    </div>
                                    @error('is_subscribe')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label fw-bold">Address</label>
                                    <textarea name="address" class="form-control ps-2 @error('address') is-invalid @enderror" rows="4">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-md-3 offset-md-9 text-end">
                                <button type="submit" class="btn btn-info py-3 px-4">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Initialize Flatpickr for date picker
            $(".f-basic").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            // Trigger file input click only if no file is selected
            $('#poster_box').on('click', function(e) {
                e.preventDefault(); // Prevent default label behavior
                e.stopPropagation(); // Stop event bubbling
                const fileInput = $('#profile_image');
                if (!fileInput.val()) { // Only trigger if no file is selected
                    fileInput.click();
                }
            });

            // Prevent label click from re-triggering after file selection
            $('#profile_image').on('click', function(e) {
                e.stopPropagation(); // Prevent bubbling to label
            });

            // File size validation removed
            function validateFileSize(inputId) {
                let input = document.getElementById(inputId);
                if (input.files && input.files[0]) {
                    removeFileSizeError(inputId);
                    return true;
                }
                removeFileSizeError(inputId);
                return true;
            }

            // Show error message
            function showFileSizeError(inputId, message) {
                let input = document.getElementById(inputId);
                let errorDiv = input.parentElement.querySelector('.file-size-error');
                if (!errorDiv) {
                    errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback d-block file-size-error';
                    input.parentElement.appendChild(errorDiv);
                }
                errorDiv.textContent = message;
                input.value = ''; // Clear invalid file
            }

            // Remove error message
            function removeFileSizeError(inputId) {
                let input = document.getElementById(inputId);
                let errorDiv = input.parentElement.querySelector('.file-size-error');
                if (errorDiv) {
                    errorDiv.remove();
                }
            }

            // Preview selected image
            function readAndPreview(input, previewId, placeholderId) {
                const preview = document.getElementById(previewId);
                const placeholder = document.getElementById(placeholderId);
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                        placeholder.style.display = 'none';
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = '#';
                    preview.style.display = 'none';
                    placeholder.style.display = 'block';
                }
            }

            // Handle file input change
            $('#profile_image').on('change', function() {
                if (validateFileSize('profile_image')) {
                    readAndPreview(this, 'poster_preview', 'poster_placeholder');
                }
            });

            // Handle form submission via AJAX
            // Handle form submission via AJAX
$('#user-create-form').on('submit', function(e) {
    e.preventDefault();
    if (!validateFileSize('profile_image')) {
        return false;
    }
    const form = $(this);
    const buttons = form.find('button[type="submit"]');
    buttons.prop('disabled', true).html('Processing...');

    const formData = new FormData(form[0]);

    // Ensure status and is_subscribe are included
    formData.set('status', form.find('input[name="status"]:checked').length ? '1' : '0');
    formData.set('is_subscribe', form.find('input[name="is_subscribe"]:checked').length ? '1' : '0');

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            buttons.prop('disabled', false).html('Save');
            if (response.success) {
                Swal.fire('Success', response.message, 'success').then(() => {
                    window.location.href = '{{ route('admin.users.index') }}';
                });
            } else {
                Swal.fire('Error', 'Unexpected response from server', 'error');
            }
        },
        error: function(xhr) {
            buttons.prop('disabled', false).html('Save');
            let errorMessage = 'Something went wrong';
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                errorMessage = Object.values(errors).flat().join('<br>');
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: errorMessage,
                confirmButtonText: 'OK'
            });
        }
    });
});
        });
    </script>
    <style>
        .image-upload-box {
            width: 360px;
            height: 215px;
            border: 1px dashed #ccc;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
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
        .image-upload-box span {
            z-index: 2;
            color: #888;
            font-size: 44px;
        }
    </style>
@endsection
