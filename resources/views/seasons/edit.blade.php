@extends('layouts.app')
@section('title', 'Edit Season')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Edit Season</h3>
                <div class="create_movie_button_container">
                    <a href="javascript:history.back()"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>
            <form action="{{ route('admin.seasons.update', $season->id) }}" method="POST" enctype="multipart/form-data" id="season-update-form">

                @method('PUT')
                <h6 class="fw-bold border-0 mt-3">About TV Show Season</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-md-4">
                                <h6 class="fw-bold">Poster</h6>
                                <div class="mb-3">
                                    <label for="poster_url" class="image-upload-box" id="poster_box">
                                        @if (!empty($season->poster_url))
                                            <img id="poster_preview" src="{{ filter_var($season->poster_url, FILTER_VALIDATE_URL) ? $season->poster_url : getImageUrl($season->poster_url) }}" alt="Poster Preview" style="display:block; max-width:100%; max-height:135px; margin-bottom:8px; border-radius:8px;" />
                                        @else
                                            <img id="poster_preview" src="#" alt="Poster Preview" style="display:none;" />
                                        @endif
                                        <span id="poster_placeholder" style="{{ !empty($season->poster_url) ? 'display:none;' : '' }}">
                                            <i class="bi bi-image"></i>
                                        </span>
                                        <input type="file" name="poster_url" id="poster_url" accept="image/*"
                                            style="display:none;" placeholder="Select poster image">
                                        @if($season->poster_url)
                                            <input type="hidden" name="poster_url" value="{{ $season->poster_url }}">
                                        @endif
                                    </label>
                                    @error('poster_url')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Movie Name</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="text" name="name"
                                        class="form-control ps-2 @error('name') is-invalid @enderror"
                                        value="{{ old('name', $season->name) }}" placeholder="Enter movie name">
                                    </fieldset>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">

                                    <label for="tvshow_id" class="form-label fw-bold">TV Shows *</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <select name="tvshow_id"
                                        class="form-select ps-2 @error('tvshow_id') is-invalid @enderror"
                                        data-url="{{ route('admin.search-tvshows') }}" >
                                        <option value="">-- Select TV Show --</option>
                                        @foreach ($tvshows as $tvshow)
                                            <option value="{{ $tvshow->id }}"
                                                {{ old('tvshow_id', $season->entertainment_id) == $tvshow->id ? 'selected' : '' }}>
                                                {{ $tvshow->name }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                            {{ old('status', $season->status) == '1' ? 'checked' : '' }}>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">Short Description</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <textarea name="description"
                                        class="form-control ps-2 @error('description') is-invalid @enderror"
                                        rows="4">{{ old('description', $season->description) }}</textarea>
                                    </fieldset>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Only one description textarea --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">Description</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <textarea name="description"
                                        class="form-control ps-2 @error('description') is-invalid @enderror"
                                        rows="4">{{ old('description', $season->description) }}</textarea>
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
                        <button type="submit" class="btn btn-info py-3 px-4" id="save-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.select2-ajax').select2({
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
            // 'this' refers to the select element that just opened
            let select = $(this);
            let searchField = $('.select2-container--open .select2-search__field');

            // Prevent multiple triggers
            if (!searchField.val()) {
                searchField.trigger('input');
            }
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
                // Disable all submit buttons and show progress when form is submitted
        document.getElementById('season-update-form').addEventListener('submit', function(e) {
            let posterValid = validateFileSize('poster_url');
            if (!posterValid) {
                e.preventDefault();
                return false;
            }

            const buttons = this.querySelectorAll('button[type="submit"]');
            buttons.forEach(function(btn) {
                btn.disabled = true;
                btn.dataset.originalText = btn.innerHTML;
                btn.innerHTML = 'Process..';
            });
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
