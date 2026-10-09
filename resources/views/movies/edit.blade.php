@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Edit Movie</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.movies.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>

            <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" id="movie-edit-form">
                @csrf
                @method('PUT')
                <h6 class="fw-bold border-0 mt-3">About Movie</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {{-- Poster and Thumbnail --}}
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="poster_url" class="image-upload-box" id="poster_box">
                                                        @if ($movie->poster_url)
                                                            <img id="poster_preview" src="{{ getImageUrl($movie->poster_url) }}" alt="Poster Preview" style="display:block;" />
                                                            <span id="poster_placeholder" style="display:none;">Click to select Poster</span>
                                                        @else
                                                            <img id="poster_preview" src="#" alt="Poster Preview" style="display:none;" />
                                                            <span id="poster_placeholder">Click to select Poster</span>
                                                        @endif
                                        <input type="file" name="poster_url" id="poster_url" accept="image/*" style="display:none;">
                                        @if($movie->poster_url)
                                            <input type="hidden" name="existing_poster_url" value="{{ $movie->poster_url }}">
                                        @endif
                                                    </label>
                                                    @error('poster_url')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="thumbnail_url" class="image-upload-box" id="thumbnail_box">
                                                        @if ($movie->thumbnail_url)
                                                            <img id="thumbnail_preview" src="{{ getImageUrl($movie->thumbnail_url) }}" alt="Thumbnail Preview" style="display:block;" />
                                                            <span id="thumbnail_placeholder" style="display:none;">Click to select Thumbnail</span>
                                                        @else
                                                            <img id="thumbnail_preview" src="#" alt="Thumbnail Preview" style="display:none;" />
                                                            <span id="thumbnail_placeholder">Click to select Thumbnail</span>
                                                        @endif
                                        <input type="file" name="thumbnail_url" id="thumbnail_url" accept="image/*" style="display:none;">
                                        @if($movie->thumbnail_url)
                                            <input type="hidden" name="existing_thumbnail_url" value="{{ $movie->thumbnail_url }}">
                                        @endif
                                                    </label>
                                                    @error('thumbnail_url')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Main Details --}}
                            <div class="col-md-6 pt-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Movie Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="text" name="name" class="form-control ps-2  @error('name') is-invalid @enderror" value="{{ old('name', $movie->name) }}" required placeholder="Enter movie name">
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
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" rows="4">{{ old('description', $movie->description) }}</textarea>
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
                                    <select name="language" class="form-select  @error('language') is-invalid @enderror">
                                        <option value="">Select Language</option>
                                        <option value="English" {{ old('language', $movie->language) == 'English' ? 'selected' : '' }}>English</option>
                                        <option value="Hindi" {{ old('language', $movie->language) == 'Hindi' ? 'selected' : '' }}>Hindi</option>
                                        <option value="Korean" {{ old('language', $movie->language) == 'Korean' ? 'selected' : '' }}>Korean</option>
                                        <option value="Spanish" {{ old('language', $movie->language) == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                                        <option value="French" {{ old('language', $movie->language) == 'French' ? 'selected' : '' }}>French</option>
                                        <option value="Japanese" {{ old('language', $movie->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
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
                                    <select name="genres[]" class="form-select select2 @error('genres') is-invalid @enderror" multiple>
                                        @php
                                            $selectedGenres = old('genres', $movie->entertainmentGenerMappings ? $movie->entertainmentGenerMappings->pluck('genre_id')->toArray() : []);
                                        @endphp
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}" {{ in_array($genre->id, $selectedGenres) ? 'selected' : '' }}>{{ $genre->name }}</option>
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
                                    <select name="countries[]" class="form-select select2 @error('countries') is-invalid @enderror" multiple>
                                        @php
                                            $selectedCountries = old('countries', $movie->entertainmentCountryMappings ? $movie->entertainmentCountryMappings->pluck('country_id')->toArray() : []);
                                        @endphp
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ in_array($country->id, $selectedCountries) ? 'selected' : '' }}>{{ $country->name }}</option>
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
                                    <input type="number" step="0.1" name="IMDb_rating" class="form-control ps-2  @error('IMDb_rating') is-invalid @enderror" value="{{ old('IMDb_rating', $movie->IMDb_rating) }}" placeholder="IMDb rating (e.g. 7.5)">
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
                                    <input type="text" name="duration" class="form-control ps-2  @error('duration') is-invalid @enderror" value="{{ old('duration', $movie->duration) }}" placeholder="e.g. 2:10">
                                    </fieldset>
                                    @error('duration')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">

                                    <label for="release_date" class="form-label fw-bold">Release Date</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="date" name="release_date" class="form-control ps-2 f-basic flatpickr-input  @error('release_date') is-invalid @enderror" value="{{ old('release_date', $movie->release_date ? $movie->release_date->format('Y-m-d') : '') }}" placeholder="Select release date">
                                    </fieldset>
                                    @error('release_date')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="fw-bold" style="margin-bottom: 13px;">Status</h6>
                                <fieldset class="form-icon-group left-icon position-relative">
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="status" value="0">
                                        <input class="form-check-input" name="status" id="status" type="checkbox" value="1" {{ old('status', $movie->status) == '1' ? 'checked' : '' }}>
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
                                    <select name="actors[]" id="actors" class="form-select select2 @error('actors') is-invalid @enderror" multiple>
                                        <option value="" disabled>--Select Actor--</option>
                                        @php
                                            $selectedActors = old('actors', $movie->entertainmentTalentMappings ? $movie->entertainmentTalentMappings->where('talentprofile.type', 'actor')->pluck('cast_id')->toArray() : []);
                                        @endphp
                                        @foreach ($actors as $actor)
                                            <option value="{{ $actor->id }}" {{ in_array($actor->id, $selectedActors) ? 'selected' : '' }}>{{ $actor->name }}</option>
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
                                    <select name="directors[]" id="directors" class="form-select select2 @error('directors') is-invalid @enderror" multiple>
                                        <option value="" disabled>--Select Director--</option>
                                        @php
                                            $selectedDirectors = old('directors', $movie->entertainmentTalentMappings ? $movie->entertainmentTalentMappings->where('talentprofile.type', 'director')->pluck('cast_id')->toArray() : []);
                                        @endphp
                                        @foreach ($directors as $director)
                                            <option value="{{ $director->id }}" {{ in_array($director->id, $selectedDirectors) ? 'selected' : '' }}>{{ $director->name }}</option>
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

                <div class="row mt-4">
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
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Search and select...',
                allowClear: true,
                width: '100%',
                closeOnSelect: false,
                tags: false,
                tokenSeparators: [',', ' '],
                language: {
                    noResults: function() { return "No results found"; },
                    searching: function() { return "Searching..."; }
                }
            });
        });

        // Helper to show error message
        function showFileSizeError(inputId, message) {
            let input = document.getElementById(inputId);
            let errorDiv = input.parentElement.querySelector('.file-size-error');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.className = 'invalid-feedback d-block file-size-error';
                input.parentElement.appendChild(errorDiv);
            }
            errorDiv.textContent = message;
            input.value = '';
        }
        // Helper to remove error message
        function removeFileSizeError(inputId) {
            let input = document.getElementById(inputId);
            let errorDiv = input.parentElement.querySelector('.file-size-error');
            if (errorDiv) {
                errorDiv.remove();
            }
        }
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

        // Image preview functionality
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

        document.getElementById('poster_url').addEventListener('change', function() {
            validateFileSize('poster_url');
            readAndPreview(this, 'poster_preview', 'poster_placeholder');

            // Clear existing poster URL when new file is selected
            if (this.files && this.files[0]) {
                const existingInput = document.querySelector('input[name="existing_poster_url"]');
                if (existingInput) {
                    existingInput.remove();
                }
            }
        });

        document.getElementById('thumbnail_url').addEventListener('change', function() {
            validateFileSize('thumbnail_url');
            readAndPreview(this, 'thumbnail_preview', 'thumbnail_placeholder');

            // Clear existing thumbnail URL when new file is selected
            if (this.files && this.files[0]) {
                const existingInput = document.querySelector('input[name="existing_thumbnail_url"]');
                if (existingInput) {
                    existingInput.remove();
                }
            }
        });
        document.getElementById('movie_access').addEventListener('change', function() {
            const planContainer = document.getElementById('plan_id_container');
            if (this.value === 'Paid') {
                planContainer.style.display = 'block';
            } else {
                planContainer.style.display = 'none';
                planContainer.querySelector('select').value = '';
            }
        });
        // Run on page load
        document.addEventListener('DOMContentLoaded', function() {
            const planContainer = document.getElementById('plan_id_container');
            const movieAccess = document.getElementById('movie_access');
            if (movieAccess.value === 'Paid') {
                planContainer.style.display = 'block';
            } else {
                planContainer.style.display = 'none';
                planContainer.querySelector('select').value = '';
            }
        });
        // Prevent form submission if file is too large
        document.getElementById('movie-edit-form').addEventListener('submit', function(e) {
            let posterValid = validateFileSize('poster_url');
            let thumbValid = validateFileSize('thumbnail_url');
            if (!posterValid || !thumbValid) {
                e.preventDefault();
                return false;
            }

            // Change button text to "Processing..." and disable it
            const saveBtn = document.getElementById('save-btn');
            saveBtn.textContent = 'Processing...';
            saveBtn.disabled = true;
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
    }

    .image-upload-box span {
        z-index: 2;
        color: #888;
        font-size: 14px;
    }
</style>
