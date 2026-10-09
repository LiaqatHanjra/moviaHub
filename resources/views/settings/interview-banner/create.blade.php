@extends('layouts.app')

@section('title', 'Create Banner')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Add Banner</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.podcast.banners') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i
                            class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>

            <form action="{{ route('admin.podcast.banners.store') }}" method="POST" enctype="multipart/form-data"
                id="banner-create-form">
                @csrf
                <h6 class="fw-bold border-0 mt-3">About Banner</h6>
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-md-7">
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
                                                            <i class="bi bi-image"></i>
                                                        </span>
                                                        <input type="file" name="poster_url" id="poster_url"
                                                            accept="image/*" style="display:none;"
                                                            placeholder="Select poster image">
                                                    </label>
                                                    <input type="hidden" name="poster_url_existing" id="poster_url_existing">
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
                                                            <i class="bi bi-image"></i>
                                                        </span>
                                                        <input type="file" name="thumbnail_url" id="thumbnail_url"
                                                            accept="image/*" style="display:none;"
                                                            placeholder="Select thumbnail image">
                                                    </label>
                                                    <input type="hidden" name="thumbnail_url_existing" id="thumbnail_url_existing">
                                                    @error('thumbnail_url')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="fw-bold" style="margin-bottom: 13px;">Status</h6>
                                                <fieldset class="form-icon-group left-icon position-relative">
                                                    <div class="form-check form-switch mt-2">
                                                        <input type="hidden" name="status" value="0">
                                                        <input class="form-check-input" type="checkbox" name="status"
                                                            id="status" value="1"
                                                            {{ old('status', '1') == '1' ? 'checked' : '' }} required>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="type" class="form-label fw-bold">Type</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="type" id="entertainment_type"
                                            class="form-select @error('type') is-invalid @enderror" required>
                                            <option value="">Select Type</option>
                                            <option value="movie_page"
                                                {{ old('type') == 'movie_page' ? 'selected' : '' }}>Movie
                                            </option>
                                            <option value="interview"
                                                {{ old('type') == 'interview' ? 'selected' : '' }}>Interview
                                            </option>
                                            <option value="podcast"
                                                {{ old('type') == 'podcast' ? 'selected' : '' }}>Podcast
                                            </option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>

                                <div class="mb-3">
                                    <label for="type_id" class="form-label fw-bold">Name *</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="type_id" id="type_id"
                                            class="form-select select2 @error('type_id') is-invalid @enderror"
                                            data-entertainment-url="{{ route('admin.search.entertainment') }}"
                                            data-podcast-url="{{ route('admin.search.podcast') }}" required>
                                            <option value="">--Enter name--</option>
                                        </select>
                                        <input type="hidden" name="type_name" id="type_name">
                                        @error('type_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
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
        $(document).ready(function() {
            // Function to get the appropriate URL based on type
            function getSearchUrl() {
                var type = $('#entertainment_type').val();
                if (type === 'movie_page') {
                    return $('#type_id').data('entertainment-url');
                } else if (type === 'interview' || type === 'podcast') {
                    return $('#type_id').data('podcast-url');
                }
                return $('#type_id').data('entertainment-url'); // Default
            }

            // Function to initialize Select2
            function initializeSelect2() {
                // Destroy existing Select2 if it exists
                if ($('#type_id').hasClass("select2-hidden-accessible")) {
                    $('#type_id').select2('destroy');
                }

                // Initialize Select2 for type_id
                $('#type_id').select2({
                    placeholder: 'Search and select...',
                    allowClear: true,
                    width: '100%',
                    ajax: {
                        url: function() {
                            return getSearchUrl();
                        },
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                query: params.term || '',
                                type: $('#entertainment_type').val() || ''
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.map(function(item) {
                                    return {
                                        id: item.id,
                                        text: item.name,
                                        poster_url: item.poster_url,
                                        thumbnail_url: item.thumbnail_url
                                    };
                                })
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 1,
                    language: {
                        noResults: function() {
                            return "No results found";
                        },
                        searching: function() {
                            return "Searching...";
                        }
                    }
                });
            }

            // Initialize Select2 on page load
            initializeSelect2();

            // Handle type change
            $('#entertainment_type').on('change', function() {
                $('#type_id').val(null).trigger('change');
                $('#type_name').val('');
                $('#poster_url_existing').val('');
                $('#thumbnail_url_existing').val('');
                $('#poster_preview').attr('src', '#').hide();
                $('#poster_placeholder').show();
                $('#thumbnail_preview').attr('src', '#').hide();
                $('#thumbnail_placeholder').show();

                // Reinitialize Select2 with new URL
                initializeSelect2();
            });

            // Handle selection of entertainment
            $('#type_id').on('select2:select', function(e) {
                var data = e.params.data;
                // Set type_name
                $('#type_name').val(data.text);

                // Update poster preview and hidden input
                if (data.poster_url) {
                    $('#poster_preview').attr('src', data.poster_url).show();
                    $('#poster_placeholder').hide();
                    $('#poster_url_existing').val(data.poster_url);
                }

                // Update thumbnail preview and hidden input
                if (data.thumbnail_url) {
                    $('#thumbnail_preview').attr('src', data.thumbnail_url).show();
                    $('#thumbnail_placeholder').hide();
                    $('#thumbnail_url_existing').val(data.thumbnail_url);
                }
            });

            // Clear previews and hidden inputs when clearing selection
            $('#type_id').on('select2:clear', function() {
                $('#type_name').val('');
                $('#poster_url_existing').val('');
                $('#thumbnail_url_existing').val('');
                $('#poster_preview').attr('src', '#').hide();
                $('#poster_placeholder').show();
                $('#thumbnail_preview').attr('src', '#').hide();
                $('#thumbnail_placeholder').show();
            });

            // Handle manual file input for poster
            $('#poster_url').on('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#poster_preview').attr('src', e.target.result).show();
                        $('#poster_placeholder').hide();
                        $('#poster_url_existing').val(''); // Clear existing URL if new file is uploaded
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Handle manual file input for thumbnail
            $('#thumbnail_url').on('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnail_preview').attr('src', e.target.result).show();
                        $('#thumbnail_placeholder').hide();
                        $('#thumbnail_url_existing').val(''); // Clear existing URL if new file is uploaded
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Trigger image upload when clicking the image box
            $('.image-upload-box').on('click', function() {
                $(this).find('input[type="file"]').click();
            });

            // Form submit handling
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
