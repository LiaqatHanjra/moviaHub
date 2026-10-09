<!-- resources/views/admin/cast-crews/create.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Cast & Crew')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Add Genre</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.cast-crews.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i
                            class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>
            <form action="{{ route('admin.cast-crews.update', $castCrew->id) }}" method="POST" enctype="multipart/form-data" id="castcrew-update-form">
                @csrf
                @method('PUT')
                <h6 class="fw-bold border-0 mt-3">Genre Info</h6>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-md-4">
                                <h6 class="fw-bold">Image</h6>
                                <div class="mb-3">
                                    <label for="file_url" class="image-upload-box" id="poster_box">
                                        @if($castCrew->file_url)
                                            <img id="poster_preview" src="{{ getImageUrl($castCrew->file_url) }}" alt="Poster Preview" style="display:block;" />
                                            <span id="poster_placeholder" style="display:none;">
                                                <i class="bi bi-image"></i>
                                            </span>
                                        @else
                                            <img id="poster_preview" src="#" alt="Poster Preview" style="display:none;" />
                                            <span id="poster_placeholder">
                                                <i class="bi bi-image"></i>
                                            </span>
                                        @endif
                                        <input type="file" name="file_url" id="file_url" accept="image/*"
                                            style="display:none;" placeholder="Select poster image">
                                    </label>
                                    @error('file_url')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" class="form-control ps-2" id="name"
                                            name="name" value="{{ old('name', $castCrew->name) }}" placeholder="Name" required>
                                    </fieldset>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="designation" class="form-label fw-bold">Designation</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="text" class="form-control ps-2"
                                        id="designation" name="designation" value="{{ old('designation', $castCrew->designation) }}" placeholder="Designation" required>
                                    </fieldset>
                                    @error('designation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label fw-bold">Type</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <select class="form-control ps-2 @error('type') is-invalid @enderror"
                                        id="type" name="type">
                                        <option value="">Select Type</option>
                                        <option value="actor" {{ old('type', $castCrew->type) == 'actor' ? 'selected' : '' }}>Actor</option>
                                        <option value="director" {{ old('type', $castCrew->type) == 'director' ? 'selected' : '' }}>Director</option>
                                    </select>
                                    </fieldset>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                @php
                                    $dob = old('dob', $castCrew->dob ? \Carbon\Carbon::parse($castCrew->dob)->format('d M Y') : '');
                                @endphp
                                <div class="mb-3">
                                    <label for="dob" class="form-label fw-bold">Date Of Birth*</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="text" class="form-control ps-2 f-basic flatpickr-input" id="dob"
                                        name="dob" value="{{ $dob }}" placeholder="e.g 12 Jul 2025" >
                                    </fieldset>
                                    @error('dob')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="place_of_birth" class="form-label fw-bold">Birth Place*</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="text" class="form-control ps-2"
                                        id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth', $castCrew->place_of_birth) }}" placeholder="e.g. Karachi" >
                                    </fieldset>
                                    @error('place_of_birth')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Actor Email*</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="email" class="form-control ps-2 " id="email"
                                        name="email" value="{{ old('email', $castCrew->email) }}" placeholder="e.g. actor@email.com" >
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
                                    <label for="bio" class="form-label fw-bold">Bio *</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <textarea name="bio"
                                        class="form-control ps-2 @error('bio') is-invalid @enderror"
                                        rows="4" >{{ old('bio', $castCrew->bio) }}</textarea>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize flatpickr
            $(".f-basic").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            // File size validation removed

            // Clear image preview on click
            document.getElementById('poster_preview').addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const input = document.getElementById('file_url');
                input.value = '';
                this.src = '#';
                this.style.display = 'none';
                document.getElementById('poster_placeholder').style.display = 'block';
            });

            // Handle file input change
            document.getElementById('file_url').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('poster_preview');
                const placeholder = document.getElementById('poster_placeholder');

                if (file) {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                            placeholder.style.display = 'none';
                        };
                        reader.onerror = function(e) {
                            alert('Failed to read the image file.');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = '#';
                        preview.style.display = 'none';
                        placeholder.style.display = 'block';
                        if (!file.type.startsWith('image/')) {
                            alert('Please upload a valid image file.');
                        }
                    }
                } else {
                    preview.src = '#';
                    preview.style.display = 'none';
                    placeholder.style.display = 'block';
                }
            });

            // Disable all submit buttons and show progress when form is submitted
            document.getElementById('castcrew-update-form').addEventListener('submit', function(e) {
                const button = document.getElementById('save-btn');
                if (button) {
                    button.disabled = true;
                    button.textContent = 'Process..';
                }
            });
        });
    </script>
@endsection

<style>
    .image-upload-box {
        width: 100%;
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
