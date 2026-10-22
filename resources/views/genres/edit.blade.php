@extends('layouts.app')

@section('title', 'Edit Category')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-25 d-flex justify-content-between">
                <h3>Edit Category</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.genres.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i
                            class="bi bi-chevron-double-left"></i> Back</a></a>
                </div>
            </div>

            <form action="{{ route('admin.genres.update', $genre->id) }}" method="POST" enctype="multipart/form-data" id="genre-update-form">
                @csrf
                @method('PUT')
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-md-4">
                                <h6 class="fw-bold">Image</h6>
                                <div class="mb-3">
                                    <label for="file_url" class="image-upload-box" id="poster_box">
                                        @if($genre->file_url)
                                            <img id="poster_preview" src="{{ getImageUrl($genre->file_url) }}" alt="Poster Preview" style="display:block;" />
                                            <span id="poster_placeholder" style="display:none;">
                                                <i class="bi bi-image"></i>
                                            </span>
                                        @else
                                            <img id="poster_preview" src="#" alt="Poster Preview" style="display:none;" />
                                            <span id="poster_placeholder">
                                                <i class="bi bi-image"></i>
                                            </span>
                                        @endif
                                        <input type="file" name="file_url" id="file_url" accept="image/*" style="display:none;" placeholder="Select poster image">
                                        @if($genre->file_url)
                                            <input type="hidden" name="existing_file_url" value="{{ $genre->file_url }}">
                                        @endif
                                    </label>
                                    @error('file_url')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative ps-2">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $genre->name) }}" placeholder="Genre Name" required>
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
                                            <input class="form-check-input" type="checkbox" name="status"
                                                id="status" value="1"
                                                {{ old('status', $genre->status) == '1' ? 'checked' : '' }} required>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <fieldset class="form-icon-group left-icon position-relative ps-2">
                                        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $genre->description) }}</textarea>
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

                        // Clear existing file URL when new file is selected
                        const existingInput = document.querySelector('input[name="existing_file_url"]');
                        if (existingInput) {
                            existingInput.remove();
                        }
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
            document.getElementById('genre-update-form').addEventListener('submit', function(e) {
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
