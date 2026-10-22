@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Add Category</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.genres.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i
                            class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>
            <form action="{{ route('admin.genres.store') }}" method="POST" enctype="multipart/form-data" id="genre-create-form">
                @csrf
                <h6 class="fw-bold border-0 mt-3">Category Info</h6>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-md-4">
                                <h6 class="fw-bold">Image (Optional)</h6>
                                <div class="mb-3">
                                    <label for="file_url" class="image-upload-box" id="poster_box">
                                        <img id="poster_preview" src="#" alt="Poster Preview" style="display:none;" />
                                        <span id="poster_placeholder">
                                            <i class="bi bi-image"></i>
                                        </span>
                                        <input type="file" name="file_url" id="file_url" accept="image/*" style="display:none;">
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
                                        <input type="text" class="form-control ps-2" id="name" name="name"
                                            placeholder="Genre Name" required>
                                    </fieldset>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label fw-bold">Status</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <div class="form-check form-switch">
                                            <input type="hidden" name="status" value="0">
                                            <input class="form-check-input" type="checkbox" name="status" id="status"
                                                value="1" {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <fieldset class="form-icon-group left-icon position-relative ps-2">
                                        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                                    </fieldset>
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
                console.log('File input changed:', event.target.files);
                const file = event.target.files[0];
                const preview = document.getElementById('poster_preview');
                const placeholder = document.getElementById('poster_placeholder');

                if (file) {
                    console.log('File detected:', file);
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            console.log('FileReader onload:', e.target.result);
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                            placeholder.style.display = 'none';
                        };
                        reader.onerror = function(e) {
                            console.error('FileReader error:', e);
                            Swal.fire('Error', 'Failed to read the image file.', 'error');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        console.log('Invalid file type');
                        preview.src = '#';
                        preview.style.display = 'none';
                        placeholder.style.display = 'block';
                        if (!file.type.startsWith('image/')) {
                            Swal.fire('Error', 'Please upload a valid image file.', 'error');
                        }
                    }
                } else {
                    console.log('No file selected');
                    preview.src = '#';
                    preview.style.display = 'none';
                    placeholder.style.display = 'block';
                }
            });

            // Disable all submit buttons and show progress when form is submitted
            document.getElementById('genre-create-form').addEventListener('submit', function(e) {
                const button = document.getElementById('save-btn');
                if (button) {
                    button.disabled = true;
                    button.textContent = 'Process..';
                }
            });
        });
    </script>
    <style>
        .image-upload-box {
            width: 100%;
            height: 140px;
            border: 1px dashed #ccc;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            text-align: center;
            background: #f0f0f0;
        }

        .image-upload-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
        }

        .image-upload-box span {
            z-index: 2;
            color: #888;
            font-size: 44px;
            pointer-events: none;
        }
    </style>
@endsection
