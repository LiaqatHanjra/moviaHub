@extends('layouts.app')

@section('title', 'Create TV Show')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Create TV Show</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.tvshows.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>

            <form action="{{ route('admin.tvshows.store') }}" method="POST" enctype="multipart/form-data"
                id="tvshow-create-form">
                @csrf
                <h6 class="fw-bold border-0 mt-3">About TV Show</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body px-5 py-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="fw-bold">Poster</h6>
                                                <div class="mb-3">
                                                    <label for="poster_url" class="image-upload-box" id="poster_box">
                                                        <img id="poster_preview" src="#" alt="Poster Preview"
                                                            style="display:none;" />
                                                        <span id="poster_placeholder">
                                                            <i class="bi bi-file-plus"></i>
                                                        </span>
                                                        <input type="file" name="poster_url" id="poster_url"
                                                            accept="image/*" style="display:none;"
                                                            placeholder="Select poster image">
                                                    </label>
                                                    <div class="invalid-feedback d-block poster-error" style="display:none;"></div>
                                                    @error('poster_url')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 ps-4">
                                                <h6 class="fw-bold">Thumbnail</h6>
                                                <div class="mb-3">
                                                    <label for="thumbnail_url" class="image-upload-box" id="thumbnail_box">
                                                        <img id="thumbnail_preview" src="#" alt="Thumbnail Preview"
                                                            style="display:none;" />
                                                        <span id="thumbnail_placeholder">
                                                            <i class="bi bi-file-plus"></i>
                                                        </span>
                                                        <input type="file" name="thumbnail_url" id="thumbnail_url"
                                                            accept="image/*" style="display:none;"
                                                            placeholder="Select thumbnail image">
                                                    </label>
                                                    <div class="invalid-feedback d-block thumbnail-error" style="display:none;"></div>
                                                    @error('thumbnail_url')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">TV Show Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" name="name"
                                            class="form-control ps-2 @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" required placeholder="Enter TV show name">
                                    </fieldset>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">Description</label>
                                    <fieldset class="form-icon-group left-icon position-relative ps-2">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                                    </fieldset>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold border-0">Basic Info</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="language" class="form-label fw-bold">Language</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="language"
                                            class="form-select ps-2 @error('language') is-invalid @enderror" required>
                                            <option value="">Select Language</option>
                                            <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>
                                                English</option>
                                            <option value="Hindi" {{ old('language') == 'Hindi' ? 'selected' : '' }}>
                                                Hindi</option>
                                            <option value="Korean" {{ old('language') == 'Korean' ? 'selected' : '' }}>
                                                Korean</option>
                                            <option value="Spanish" {{ old('language') == 'Spanish' ? 'selected' : '' }}>
                                                Spanish</option>
                                            <option value="French" {{ old('language') == 'French' ? 'selected' : '' }}>
                                                French</option>
                                            <option value="Japanese"
                                                {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                        </select>
                                    </fieldset>
                                    @error('language')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="genres" class="form-label fw-bold">Genres</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="genres[]"
                                            class="form-select select2 ps-2 @error('genres') is-invalid @enderror" multiple required>
                                            <option value="" disabled>--Select Genre--</option>
                                            @foreach ($genres as $genre)
                                                <option value="{{ $genre->id }}"
                                                    {{ in_array($genre->id, old('genres', [])) ? 'selected' : '' }}>
                                                    {{ $genre->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    @error('genres')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="countries" class="form-label fw-bold">Country</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="countries[]"
                                            class="form-select select2 ps-2 @error('countries') is-invalid @enderror" multiple required>
                                            <option value="" disabled>--Select Country--</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ in_array($country->id, old('countries', [])) ? 'selected' : '' }}>
                                                    {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    @error('countries')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="IMDb_rating" class="form-label fw-bold">IMDb Rating</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="number" step="0.1" name="IMDb_rating"
                                            class="form-control ps-2 @error('IMDb_rating') is-invalid @enderror"
                                            value="{{ old('IMDb_rating') }}" placeholder="IMDb rating (e.g. 7.5)">
                                    </fieldset>
                                    @error('IMDb_rating')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="duration" class="form-label fw-bold">Duration</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" name="duration"
                                            class="form-control ps-2 @error('duration') is-invalid @enderror"
                                            value="{{ old('duration') }}" placeholder="e.g. 1:30">
                                    </fieldset>
                                    @error('duration')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="release_date" class="form-label fw-bold">Release Date</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" name="release_date"
                                            class="form-control ps-2 f-basic flatpickr-input @error('release_date') is-invalid @enderror"
                                            value="{{ old('release_date') }}" placeholder="Select release date" readonly="readonly">
                                    </fieldset>
                                    @error('release_date')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-4">
                                <h6 class="fw-bold" style="margin-bottom: 13px;">Status</h6>
                                <fieldset class="form-icon-group left-icon position-relative">
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="status" value="0">
                                        <input class="form-check-input" type="checkbox" name="status" id="status"
                                            value="1" {{ old('status', '1') == '1' ? 'checked' : '' }} required>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold border-0">Actors & Directors</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="actors" class="form-label fw-bold">Actors</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="actors[]"
                                            class="form-select select2 ps-2 @error('actors') is-invalid @enderror" multiple required>
                                            <option value="" disabled>--Select Actor--</option>
                                            @foreach ($actors as $actor)
                                                <option value="{{ $actor->id }}"
                                                    {{ in_array($actor->id, old('actors', [])) ? 'selected' : '' }}>
                                                    {{ $actor->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    @error('actors')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="directors" class="form-label fw-bold">Directors</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="directors[]"
                                            class="form-select select2 ps-2 @error('directors') is-invalid @enderror" multiple required>
                                            <option value="" disabled>--Select Director--</option>
                                            @foreach ($directors as $director)
                                                <option value="{{ $director->id }}"
                                                    {{ in_array($director->id, old('directors', [])) ? 'selected' : '' }}>
                                                    {{ $director->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    @error('directors')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-3 offset-md-9 text-end">
                        <button type="submit" class="btn btn-info py-3 px-4" id="save-btn">Save & Continue..</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Initialize Select2 for multiselect fields
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Search and select...',
                allowClear: true,
                width: '100%',
                closeOnSelect: false,
                tags: false,
                tokenSeparators: [',', ' '],
                language: {
                    noResults: function() {
                        return "No results found";
                    },
                    searching: function() {
                        return "Searching...";
                    }
                }
            });

            // Initialize Flatpickr for date picker
            $(".f-basic").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            // Set initial visibility of plan_id_container based on movie_access
            const movieAccess = document.getElementById('movie_access').value;
            const planContainer = document.getElementById('plan_id_container');
            planContainer.style.display = movieAccess === 'Paid' ? 'block' : 'none';
        });

        // Helper to show error message
        function showFileError(inputId, message, errorClass) {
            const errorDiv = document.querySelector(`.${errorClass}`);
            if (errorDiv) {
                errorDiv.textContent = message;
                errorDiv.style.display = 'block';
            }
        }

        // Helper to remove error message
        function removeFileError(inputId, errorClass) {
            const errorDiv = document.querySelector(`.${errorClass}`);
            if (errorDiv) {
                errorDiv.style.display = 'none';
            }
        }

        // File size validation removed
        function validateFileSize(inputId, errorClass) {
            const input = document.getElementById(inputId);
            if (input.files && input.files[0]) {
                removeFileError(inputId, errorClass);
                return true;
            }
            return false; // No file selected
        }

        // Validate file presence
        function validateFilePresence(inputId, errorClass) {
            const input = document.getElementById(inputId);
            if (!input.files || input.files.length === 0) {
                showFileError(inputId, 'This field is required.', errorClass);
                return false;
            }
            removeFileError(inputId, errorClass);
            return true;
        }

        // Preview image
        function readAndPreview(input, previewId, placeholderId) {
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                placeholder.style.display = 'block';
            }
        }

        // Event listeners for file inputs
        document.getElementById('poster_url').addEventListener('change', function() {
            const isPresent = validateFilePresence('poster_url', 'poster-error');
            if (isPresent) {
                validateFileSize('poster_url', 'poster-error');
            }
            readAndPreview(this, 'poster_preview', 'poster_placeholder');
        });

        document.getElementById('thumbnail_url').addEventListener('change', function() {
            const isPresent = validateFilePresence('thumbnail_url', 'thumbnail-error');
            if (isPresent) {
                validateFileSize('thumbnail_url', 'thumbnail-error');
            }
            readAndPreview(this, 'thumbnail_preview', 'thumbnail_placeholder');
        });

        // Movie access toggle functionality
        document.getElementById('movie_access').addEventListener('change', function() {
            const planContainer = document.getElementById('plan_id_container');
            if (this.value === 'Paid') {
                planContainer.style.display = 'block';
            } else {
                planContainer.style.display = 'none';
                planContainer.querySelector('select').value = '';
            }
        });

        // Form submission validation
        document.getElementById('tvshow-create-form').addEventListener('submit', function(e) {
            let isValid = true;

            // Validate poster_url
            const posterPresent = validateFilePresence('poster_url', 'poster-error');
            const posterSizeValid = validateFileSize('poster_url', 'poster-error');
            if (!posterPresent || !posterSizeValid) {
                isValid = false;
            }

            // Validate thumbnail_url
            const thumbnailPresent = validateFilePresence('thumbnail_url', 'thumbnail-error');
            const thumbnailSizeValid = validateFileSize('thumbnail_url', 'thumbnail-error');
            if (!thumbnailPresent || !thumbnailSizeValid) {
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                return false;
            }

            // Disable submit button during submission
            const buttons = this.querySelectorAll('button[type="submit"]');
            buttons.forEach(function(btn) {
                btn.disabled = true;
                btn.dataset.originalText = btn.innerHTML;
                btn.innerHTML = 'Processing...';
            });
        });

        // Form submit handling
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    // Change button text to "Processing..." and disable it
                    const saveBtn = document.getElementById('save-btn');
                    if (saveBtn) {
                        saveBtn.textContent = 'Processing...';
                        saveBtn.disabled = true;
                        console.log('Button text changed to Processing...');
                    }
                });
            }
        });
    </script>
@endsection

<style>
    .image-upload-box {
        width: 200px;
        height: 200px;
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
