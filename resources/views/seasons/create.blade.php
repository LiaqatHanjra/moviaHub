@extends('layouts.app')
@section('title', 'Add Season')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Create Season</h3>
                <div class="create_movie_button_container">
                    <a href="javascript:history.back()"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>
            <form action="{{ route('admin.seasons.store') }}" method="POST" enctype="multipart/form-data" id="season-create-form">
                @csrf
                <h6 class="fw-bold border-0 mt-3">About TV Show Season</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-md-4">
                                <h6 class="fw-bold">Poster</h6>
                                <div class="mb-3">
                                    <label for="poster_url" class="image-upload-box" id="poster_box">
                                        <img id="poster_preview" src="#" alt="Poster Preview"
                                            style="display:none;" />
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
                                    <label for="name" class="form-label fw-bold">Season Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="text" name="name"
                                        class="form-control ps-2 @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" required placeholder="Enter season name">
                                    </fieldset>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tvshow_id" class="form-label fw-bold">TV Shows *</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    @if(isset($selectedTvShow) && $selectedTvShow)
                                        {{-- Show readonly field when TV show is pre-selected --}}
                                        <input type="text" class="form-control" value="{{ $tvshows->first()->name ?? '' }}" readonly>
                                        <input type="hidden" name="tvshow_id" value="{{ $selectedTvShow }}">
                                    @else
                                        {{-- Show searchable dropdown when no pre-selection --}}
                                        <select name="tvshow_id"
                                            class="form-select select2-ajax @error('tvshow_id') is-invalid @enderror"
                                            data-url="{{ route('admin.search-tvshows') }}" required>
                                            <option value="">-- Select TV Show --</option>
                                            @foreach ($tvshows as $tvshow)
                                                <option value="{{ $tvshow->id }}"
                                                    {{ (old('tvshow_id', $selectedTvShow ?? null) == $tvshow->id) ? 'selected' : '' }}>
                                                    {{ $tvshow->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    </fieldset>
                                    @error('tvshow_id')
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
                                        <input class="form-check-input" type="checkbox" name="status"
                                            id="status" value="1"
                                            {{ old('status', '1') == '1' ? 'checked' : '' }} required>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="short_description" class="form-label fw-bold">Short Description</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <textarea name="short_description"
                                        class="form-control ps-2 @error('short_description') is-invalid @enderror"
                                        rows="4">{{ old('short_description') }}</textarea>
                                    </fieldset>
                                    @error('short_description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">Description</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <textarea name="description"
                                        class="form-control ps-2 @error('description') is-invalid @enderror"
                                        rows="4">{{ old('description') }}</textarea>
                                    </fieldset>
                                    @error('description')
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
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Search...',
                minimumInputLength: 0,
                ajax: {
                    delay: 250,
                    url: function() {
                        return $(this).data('url');
                    },
                    data: function(params) {
                        return {
                            q: params.term || ''
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map(item => ({
                                id: item.id,
                                text: item.name
                            }))
                        };
                    }
                }
            }).on('select2:open', function() {
                let select = $(this);
                let searchField = $('.select2-container--open .select2-search__field');
                if (!searchField.val()) {
                    searchField.trigger('input');
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
            return false; // No file selected
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
        document.getElementById('season-create-form').addEventListener('submit', function(e) {

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
        height: 135px;
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
