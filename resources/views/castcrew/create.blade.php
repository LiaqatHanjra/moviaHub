<!-- resources/views/admin/cast-crews/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create Cast & Crew')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Add Cast & Crew</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.cast-crews.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100">
                        <i class="bi bi-chevron-double-left"></i> Back
                    </a>
                </div>
            </div>
            <form action="{{ route('admin.cast-crews.store') }}" method="POST" enctype="multipart/form-data" id="castCrewForm">
                @csrf
                <h6 class="fw-bold border-0 mt-3">Cast Info</h6>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-md-4">
                                <h6 class="fw-bold">Image</h6>
                                <div class="mb-3">
                                    <label for="file_url" class="image-upload-box" id="poster_box">
                                        <img id="poster_preview" src="#" alt="Poster Preview" style="display:none;" />
                                        <span id="poster_placeholder">
                                            <i class="bi bi-image"></i>
                                        </span>
                                        <input type="file" name="file_url" id="file_url" accept="image/jpeg,image/png,image/gif"
                                            style="display:none;" placeholder="Select poster image" required>
                                    </label>
                                    <div id="image_error" class="invalid-feedback d-block" style="display:none;"></div>
                                    @error('file_url')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" class="form-control ps-2" name="name" id="name"
                                            placeholder="Name" value="{{ old('name') }}" required>
                                    </fieldset>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="designation" class="form-label fw-bold">Designation</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" class="form-control ps-2" id="designation" name="designation"
                                            placeholder="Designation" value="{{ old('designation') }}" required>
                                    </fieldset>
                                    @error('designation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label fw-bold">Type</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select class="form-control ps-2 @error('type') is-invalid @enderror" id="type"
                                            name="type" required>
                                            <option value="">Select Type</option>
                                            <option value="actor" {{ old('type') == 'actor' ? 'selected' : '' }}>Actor</option>
                                            <option value="director" {{ old('type') == 'director' ? 'selected' : '' }}>Director</option>
                                        </select>
                                    </fieldset>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="dob" class="form-label fw-bold">Date of Birth</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" class="form-control flatpickr-input ps-2" id="dob"
                                            name="dob" placeholder="e.g., 1974-07-24" value="{{ old('dob') }}">
                                    </fieldset>
                                    @error('dob')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="place_of_birth" class="form-label fw-bold">Birth Place</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" class="form-control ps-2" id="place_of_birth"
                                            name="place_of_birth" placeholder="e.g., New York" value="{{ old('place_of_birth') }}">
                                    </fieldset>
                                    @error('place_of_birth')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="email" class="form-control ps-2" id="email"
                                            name="email" placeholder="e.g., hello@example.com" value="{{ old('email') }}">
                                    </fieldset>
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="bio" class="form-label fw-bold">Bio</label>
                                    <fieldset class="form-icon-group left-icon position-relative ps-2">
                                        <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" rows="4">{{ old('bio') }}</textarea>
                                    </fieldset>
                                    @error('bio')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-3 offset-md-9 text-end">
                        <button type="submit" class="btn btn-info py-3 px-4" id="save-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        // Initialize Flatpickr for date of birth
        flatpickr("#dob", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });

        // Image preview and validation logic
        const fileInput = document.getElementById('file_url');
        const posterPreview = document.getElementById('poster_preview');
        const posterPlaceholder = document.getElementById('poster_placeholder');
        const imageError = document.getElementById('image_error');

        // Debug click event on poster_box
        const posterBox = document.getElementById('poster_box');
        posterBox.addEventListener('click', function(event) {
            console.log('Poster box clicked'); // Debug log
        });

        // Handle image selection and validation
        fileInput.addEventListener('change', function(event) {
            console.log('File input changed'); // Debug log
            const file = event.target.files[0];
            if (file) {
                // Validate file type
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validImageTypes.includes(file.type)) {
                    imageError.textContent = 'Please select a valid image file (JPEG, PNG, or GIF).';
                    imageError.style.display = 'block';
                    fileInput.value = ''; // Reset input
                    posterPreview.style.display = 'none';
                    posterPlaceholder.style.display = 'block';
                    return;
                }

                // File size validation removed - uploading directly to S3

                // Display image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    posterPreview.src = e.target.result;
                    posterPreview.style.display = 'block';
                    posterPlaceholder.style.display = 'none';
                    imageError.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                posterPreview.style.display = 'none';
                posterPlaceholder.style.display = 'block';
                imageError.style.display = 'none';
            }
        });

        // Form submission validation
        document.getElementById('castCrewForm').addEventListener('submit', function(event) {
            console.log('Form submission triggered'); // Debug log
            const file = fileInput.files[0];
            if (!file) {
                event.preventDefault();
                imageError.textContent = 'Please select an image.';
                imageError.style.display = 'block';
                return;
            }

            // Disable submit button to prevent multiple submissions
            const submitButton = document.getElementById('save-btn');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Processing...';
            }
        });
    </script>
@endsection

<style>
    .image-upload-box {
        width: 100%;
        height: 225px;
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

    .image-upload-box:hover {
        border-color: #666;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875em;
    }
</style>
