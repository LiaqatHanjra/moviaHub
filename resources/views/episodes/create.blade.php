@extends('layouts.app')

@section('title', 'Add Episode')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Create Episode</h3>
                <div class="create_movie_button_container">
                    <a href="javascript:history.back()"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>
            <form id="movie-create-form" action="{{ route('admin.episodes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h6 class="fw-bold border-0 mt-3">About Episode</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-2">
                            <div class="col-md-4">
                                <h6 class="fw-bold">Poster</h6>
                                <div class="mb-3">
                                    <label for="poster_url" class="image-upload-box" id="poster_box">
                                        <img id="poster_preview" src="#" alt="Poster Preview" style="display:none;" />
                                        <span id="poster_placeholder">
                                            <i class="bi bi-image"></i>
                                        </span>
                                        <input type="file" name="poster_url" id="poster_url" accept="image/*"
                                            style="display:none;" placeholder="Select poster image">
                                    </label>
                                    @error('poster_url')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="entertainment_id" class="form-label fw-bold">TV Shows *</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        @if(isset($selectedTvShow) && $selectedTvShow)
                                            {{-- Show readonly field when TV show is pre-selected --}}
                                            <input type="text" class="form-control" value="{{ $tvshows->first()->name ?? '' }}" readonly>
                                            <input type="hidden" name="entertainment_id" id="entertainment_id" value="{{ $selectedTvShow }}">
                                        @else
                                            {{-- Show dropdown when no pre-selection --}}
                                            <select name="entertainment_id" id="entertainment_id"
                                                class="form-select select2 @error('entertainment_id') is-invalid @enderror"
                                                required>
                                                <option value="">-- Select TV Show --</option>
                                                @foreach ($tvshows as $tvshow)
                                                    <option value="{{ $tvshow->id }}"
                                                        {{ (old('entertainment_id', $selectedTvShow ?? null) == $tvshow->id) ? 'selected' : '' }}>
                                                        {{ $tvshow->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </fieldset>
                                    @error('entertainment_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Episode Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" name="name"
                                            class="form-control ps-2 @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                            required placeholder="Enter episode name">
                                    </fieldset>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="season_id" class="form-label fw-bold">Season</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="season_id" id="season_id"
                                            class="form-select ps-2 @error('season_id') is-invalid @enderror">
                                            <option value="">-- Select Season --</option>
                                        </select>
                                    </fieldset>
                                    @error('season_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="short_desp" class="form-label fw-bold">Short Description</label>
                                    <fieldset class="form-icon-group left-icon position-relative ps-2">
                                        <textarea name="short_desp" class="form-control @error('short_desp') is-invalid @enderror" rows="4">{{ old('short_desp') }}</textarea>
                                    </fieldset>
                                    @error('short_desp')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
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
                <h6 class="fw-bold border-0 mt-3">Basic Info</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-2">
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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="release_date" class="form-label fw-bold">Release Date</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="text" name="release_date"
                                            class="form-control ps-2 f-basic flatpickr-input @error('release_date') is-invalid @enderror"
                                            value="{{ old('release_date') }}" placeholder="Select release date">
                                    </fieldset>
                                    @error('release_date')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="status" class="form-label fw-bold">Status</label>
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
        let isTrailerUploading = false;
        let isVideoUploading = false;

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
        });

        // Initialize Flatpickr for date picker
        $(".f-basic").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
        });

        // Fetch and populate seasons
        function fetchAndPopulateSeasons(tvshowId, selectedSeasonId = null) {
            const seasonSelect = document.getElementById('season_id');
            if (!tvshowId) {
                seasonSelect.innerHTML = '<option value="">-- Select Season --</option>';
                seasonSelect.disabled = true;
                return;
            }

            seasonSelect.innerHTML = '<option value="">Loading...</option>';
            seasonSelect.disabled = true;

            fetch(`/admin/seasons/by-tvshow/${tvshowId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                let options = '<option value="">-- Select Season --</option>';
                data.forEach(season => {
                    const selected = selectedSeasonId == season.id ? ' selected' : '';
                    options += `<option value="${season.id}"${selected}>${season.name}</option>`;
                });
                seasonSelect.innerHTML = options;
                seasonSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error fetching seasons:', error);
                seasonSelect.innerHTML = '<option value="">Error loading seasons</option>';
                seasonSelect.disabled = true;
            });
        }

        const tvshowSelect = document.getElementById('entertainment_id');
        if (tvshowSelect) {
            tvshowSelect.addEventListener('change', function() {
                fetchAndPopulateSeasons(this.value);
            });
            $(tvshowSelect).on('select2:select', function(e) {
                fetchAndPopulateSeasons(e.target.value);
            });
            // On page load, if a TV show is already selected, load its seasons
            if (tvshowSelect.value) {
                fetchAndPopulateSeasons(tvshowSelect.value, '{{ old('season_id') }}');
            }
        }

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

        // File size validation removed - uploading directly to S3
        function validateFileSize(inputId) {
            let input = document.getElementById(inputId);
            if (input.files && input.files[0]) {
                removeFileSizeError(inputId);
                return true;
            }
            removeFileSizeError(inputId);
            return true;
        }

        // Poster preview
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

        // Form submit handling
        document.getElementById('movie-create-form').addEventListener('submit', function(e) {
            // Check if trailer or video is uploading
            if (typeof isTrailerUploading !== 'undefined' && isTrailerUploading) {
                e.preventDefault();
                alert('Please wait until all uploads are complete.');
                return;
            }
            if (typeof isVideoUploading !== 'undefined' && isVideoUploading) {
                e.preventDefault();
                alert('Please wait until all uploads are complete.');
                return;
            }

            // Check if poster image is selected
            const posterInput = document.getElementById('poster_url');
            if (!posterInput.files || posterInput.files.length === 0) {
                e.preventDefault();
                showFileSizeError('poster_url', 'Poster image is required.');
                return;
            }

            // Validate poster file size
            let posterValid = validateFileSize('poster_url');
            if (!posterValid) {
                e.preventDefault();
                return;
            }

            // Change button text to "Processing..." and disable it
            const saveBtn = document.getElementById('save-btn');
            if (saveBtn) {
                saveBtn.textContent = 'Processing...';
                saveBtn.disabled = true;
                console.log('Button text changed to Processing...');
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
</style>
