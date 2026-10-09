@extends('layouts.app')

@section('title', 'Upload Tv Show Files')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Upload Files for: {{ $season->name }}</h3>
                <div class="create_movie_button_container">
                    <a href="javascript:history.back()"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i
                            class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>

            <form id="upload-files-form" action="{{ route('admin.seasons.update', $season->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="trailer_url_type" class="form-label fw-bold">Trailer URL Type</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select name="trailer_url_type" id="trailer_url_type"
                                            class="form-select ps-2 @error('trailer_url_type') is-invalid @enderror" required>
                                            <option value="" disabled
                                                {{ !old('trailer_url_type', $season->trailer_url_type) ? 'selected' : '' }}>
                                                Select URL Type</option>
                                            <option value="HSL"
                                                {{ old('trailer_url_type', $season->trailer_url_type) == 'HSL' ? 'selected' : '' }}>
                                                HSL</option>
                                            <option value="URL"
                                                {{ old('trailer_url_type', $season->trailer_url_type) == 'URL' ? 'selected' : '' }}>
                                                URL</option>
                                            <option value="Cloud"
                                                {{ old('trailer_url_type', $season->trailer_url_type) == 'Cloud' ? 'selected' : '' }}>
                                                Cloud</option>
                                            <option value="Local"
                                                {{ old('trailer_url_type', $season->trailer_url_type) == 'Local' ? 'selected' : '' }}>
                                                Local</option>
                                        </select>
                                        @error('trailer_url_type')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3" id="trailer_url_container"
                                    style="display: {{ old('trailer_url_type', $season->trailer_url_type) && old('trailer_url_type', $season->trailer_url_type) !== 'Local' ? 'block' : 'none' }};">
                                    <label for="trailer_url" class="form-label fw-bold">Trailer URL</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="url" name="trailer_url" id="trailer_url"
                                            class="form-control ps-2 @error('trailer_url') is-invalid @enderror"
                                            value="{{ old('trailer_url', $season->trailer_url) }}"
                                            placeholder="Paste trailer URL">
                                        @error('trailer_url')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                    <div class="mt-2" id="watch_trailer_btn_container" style="display: none;">
                                        <button type="button" class="btn btn-sm btn-outline-primary" id="watch_trailer_btn">
                                            <i class="bi bi-play-circle"></i> Watch Trailer
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3" id="trailer_file_container"
                                    style="display: {{ old('trailer_url_type', $season->trailer_url_type) === 'Local' ? 'block' : 'none' }};">
                                    <label for="trailer_file" class="form-label fw-bold">Trailer File</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <input type="file" name="trailer_file" id="trailer_file"
                                            class="form-control ps-2 @error('trailer_file') is-invalid @enderror"
                                            accept="video/*" placeholder="Select trailer file">
                                        @if ($season->trailer_url_type === 'Local' && $season->trailer_url)
                                            <div class="mt-2 text-muted">{{ basename($season->trailer_url) }}</div>
                                        @endif
                                        <div class="progress mt-2" style="height: 20px; display:none;" id="trailer_upload_progress_wrap">
                                            <div id="trailer_upload_progress" class="progress-bar" role="progressbar" style="width: 0%">0%</div>
                                        </div>
                                        <div id="trailer_upload_result" class="mt-2"></div>
                                        @error('trailer_file')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                    <div class="mt-2" id="watch_trailer_file_btn_container" style="display: none;">
                                        <button type="button" class="btn btn-sm btn-outline-primary" id="watch_trailer_file_btn">
                                            <i class="bi bi-play-circle"></i> Watch Trailer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-3 offset-md-9 text-end">
                        <button id="submit-btn" type="submit" class="btn btn-info py-3 px-4">Update Files</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Video Player Modal -->
    <div class="modal fade" id="videoPlayerModal" tabindex="-1" aria-labelledby="videoPlayerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoPlayerModalLabel">Video Player</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <video id="modalVideoPlayer" controls style="width: 100%; height: 100%;">
                            <source src="" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <iframe id="modalIframePlayer" style="display: none; width: 100%; height: 100%; border: none;" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let isTrailerUploading = false;

        function uploadFileInChunks(fileInput, seasonId, type, progressWrapId, progressBarId, resultId, hiddenInputId, name, uploadFlag) {
            const file = fileInput.files[0];
            // If no file is selected but a hidden input exists, use its value
            if (!file && document.getElementById(hiddenInputId) && document.getElementById(hiddenInputId).value) {
                console.log(`${type} file already uploaded:`, document.getElementById(hiddenInputId).value);
                return; // Skip upload if already processed
            } else if (!file) {
                console.error('No file selected');
                alert('Please select a file to upload.');
                fileInput.value = ''; // Clear the input to reset
                return;
            }

            window[uploadFlag] = true;
            updateSubmitButton();

            const chunkSize = 2 * 1024 * 1024; // 2MB
            const totalChunks = Math.ceil(file.size / chunkSize);
            let currentChunk = 0;
            let uploadedSize = 0;

            const progressWrap = document.getElementById(progressWrapId);
            const progressBar = document.getElementById(progressBarId);
            const resultDiv = document.getElementById(resultId);
            progressWrap.style.display = 'block';
            progressBar.style.width = '0%';
            progressBar.innerText = '0%';
            progressBar.classList.remove('bg-success', 'bg-danger');

            async function uploadNextChunk() {
                const start = currentChunk * chunkSize;
                const end = Math.min(start + chunkSize, file.size);
                const chunk = file.slice(start, end);

                const formData = new FormData();
                formData.append('chunk', chunk);
                formData.append('file_name', file.name);
                formData.append('chunk_number', currentChunk + 1); // 1-based indexing for backend
                formData.append('total_chunks', totalChunks);
                formData.append('type', type); // 'trailer' or 'video'
                formData.append('_token', document.querySelector('input[name="_token"]').value);

                try {
                    const response = await fetch(`/admin/seasons/${seasonId}/upload-chunk`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                        }
                    });
                    const data = await response.json();
                    if (data.success) {
                        currentChunk++;
                        uploadedSize += chunk.size;
                        const percent = Math.floor((uploadedSize / file.size) * 100);
                        progressBar.style.width = percent + '%';
                        progressBar.innerText = percent + '%';

                        if (currentChunk < totalChunks) {
                            await uploadNextChunk();
                        } else {
                            progressBar.classList.add('bg-success');
                            progressBar.innerText = 'Upload Complete';
                            resultDiv.innerHTML = `<span class='text-success'>${type.charAt(0).toUpperCase() + type.slice(1)} uploaded: ${data.path}</span>`;
                            if (data.path) {
                                let hidden = document.getElementById(hiddenInputId);
                                if (!hidden) {
                                    hidden = document.createElement('input');
                                    hidden.type = 'hidden';
                                    hidden.name = name;
                                    hidden.id = hiddenInputId;
                                    document.getElementById('upload-files-form').appendChild(hidden);
                                }
                                hidden.value = data.path;
                                console.log(`${name} file path set:`, data.path);
                                fileInput.removeAttribute('name');
                                fileInput.value = '';
                                fileInput.disabled = true;
                                toggleWatchButtons(); // Update watch buttons after upload
                            } else {
                                progressBar.classList.add('bg-danger');
                                progressBar.innerText = 'Upload Failed: No file path received';
                                resultDiv.innerHTML = `<span class='text-danger'>Upload Failed: No file path received</span>`;
                            }
                            window[uploadFlag] = false;
                            updateSubmitButton();
                        }
                    } else {
                        progressBar.classList.add('bg-danger');
                        progressBar.innerText = 'Upload Failed: ' + (data.message || 'Unknown error');
                        resultDiv.innerHTML = `<span class='text-danger'>Upload Failed: ${data.message || 'Unknown error'}</span>`;
                        window[uploadFlag] = false;
                        updateSubmitButton();
                    }
                } catch (error) {
                    progressBar.classList.add('bg-danger');
                    progressBar.innerText = 'Upload Failed: ' + error.message;
                    resultDiv.innerHTML = `<span class='text-danger'>Upload Failed: ${error.message}</span>`;
                    console.error('Upload error:', {
                        message: error.message,
                        stack: error.stack,
                        response: error.response ? error.response : 'No response data'
                    });
                    window[uploadFlag] = false;
                    updateSubmitButton();
                }
            }

            uploadNextChunk();
        }

        // Update submit button state
        function updateSubmitButton() {
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = isTrailerUploading;
        }

        // Function to check if URL is valid and show/hide watch buttons
        function toggleWatchButtons() {
            const trailerUrl = document.getElementById('trailer_url').value.trim();
            const trailerUrlType = document.getElementById('trailer_url_type').value;

            const watchTrailerBtn = document.getElementById('watch_trailer_btn_container');
            const watchTrailerFileBtn = document.getElementById('watch_trailer_file_btn_container');

            // Show/hide trailer watch button (for URL type)
            if (trailerUrl && isValidUrl(trailerUrl) && document.getElementById('trailer_url_container').style.display !== 'none') {
                watchTrailerBtn.style.display = 'block';
            } else {
                watchTrailerBtn.style.display = 'none';
            }

            // Show/hide trailer file watch button (for Local type)
            if (trailerUrlType === 'Local' && document.getElementById('trailer_file_container').style.display !== 'none') {
                // Check if there's an existing trailer file or uploaded file
                const uploadedTrailerPath = document.getElementById('uploaded_trailer_path');
                const seasonTrailerUrl = '{{ $season->trailer_url }}';

                if ((uploadedTrailerPath && uploadedTrailerPath.value) || seasonTrailerUrl) {
                    watchTrailerFileBtn.style.display = 'block';
                } else {
                    watchTrailerFileBtn.style.display = 'none';
                }
            } else {
                watchTrailerFileBtn.style.display = 'none';
            }
        }

        // Function to validate URL
        function isValidUrl(string) {
            try {
                new URL(string);
                return true;
            } catch (_) {
                return false;
            }
        }

        // Function to detect video type and play accordingly
        function playVideo(url, title) {
            const modal = new bootstrap.Modal(document.getElementById('videoPlayerModal'));
            const modalTitle = document.getElementById('videoPlayerModalLabel');
            const videoPlayer = document.getElementById('modalVideoPlayer');
            const iframePlayer = document.getElementById('modalIframePlayer');

            modalTitle.textContent = title;

            // Hide both players first
            videoPlayer.style.display = 'none';
            iframePlayer.style.display = 'none';

            // Check if it's a YouTube URL
            if (url.includes('youtube.com') || url.includes('youtu.be')) {
                let embedUrl = url;
                if (url.includes('youtu.be')) {
                    const videoId = url.split('youtu.be/')[1].split('?')[0];
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                } else if (url.includes('youtube.com/watch')) {
                    const videoId = url.split('v=')[1].split('&')[0];
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
                iframePlayer.src = embedUrl;
                iframePlayer.style.display = 'block';
            }
            // Check if it's a Vimeo URL
            else if (url.includes('vimeo.com')) {
                const videoId = url.split('vimeo.com/')[1].split('?')[0];
                const embedUrl = `https://player.vimeo.com/video/${videoId}`;
                iframePlayer.src = embedUrl;
                iframePlayer.style.display = 'block';
            }
            // Check if it's a direct video file
            else if (url.match(/\.(mp4|webm|ogg|avi|mov|wmv|flv|mkv)(\?.*)?$/i)) {
                videoPlayer.src = url;
                videoPlayer.style.display = 'block';
            }
            // For other URLs, try to embed them
            else {
                iframePlayer.src = url;
                iframePlayer.style.display = 'block';
            }

            modal.show();
        }

        // Function to clear video sources when modal is hidden
        function clearVideoSources() {
            const videoPlayer = document.getElementById('modalVideoPlayer');
            const iframePlayer = document.getElementById('modalIframePlayer');

            videoPlayer.src = '';
            iframePlayer.src = '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const seasonId = {{ $season->id }};

            // Trailer URL Type toggle
            document.getElementById('trailer_url_type').addEventListener('change', function() {
                const trailerUrlContainer = document.getElementById('trailer_url_container');
                const trailerFileContainer = document.getElementById('trailer_file_container');
                const trailerUrlInput = document.getElementById('trailer_url');
                const trailerFileInput = document.getElementById('trailer_file');

                trailerUrlContainer.style.display = 'none';
                trailerFileContainer.style.display = 'none';

                // Always disable and remove required from both first
                trailerUrlInput.disabled = true;
                trailerFileInput.disabled = true;
                trailerUrlInput.required = false;
                trailerFileInput.required = false;

                // Remove name from both first
                trailerUrlInput.removeAttribute('name');
                trailerFileInput.removeAttribute('name');

                // Enable and require only the relevant input, and set name
                if (this.value === 'Local') {
                    trailerFileContainer.style.display = 'block';
                    const hiddenTrailerPath = document.getElementById('uploaded_trailer_path');
                    if (hiddenTrailerPath && hiddenTrailerPath.value) {
                        trailerFileInput.disabled = true; // Already uploaded, disable input
                        trailerFileInput.removeAttribute('name');
                    } else {
                        trailerFileInput.disabled = false;
                        trailerFileInput.setAttribute('name', 'trailer_file');
                    }
                } else if (this.value) {
                    trailerUrlContainer.style.display = 'block';
                    trailerUrlInput.disabled = false;
                    trailerUrlInput.required = true;
                    trailerUrlInput.setAttribute('name', 'trailer_url');
                }
                // Clear existing hidden file path input if switching types
                const existingHidden = document.getElementById('uploaded_trailer_path');
                if (existingHidden && this.value !== 'Local') {
                    existingHidden.remove();
                }
                const existingResult = document.getElementById('trailer_upload_result');
                existingResult.innerHTML = '';
                trailerFileInput.value = '';
                updateSubmitButton();
                toggleWatchButtons(); // Update watch buttons visibility
            });

            // Add event listeners for URL input to show/hide watch buttons
            document.getElementById('trailer_url').addEventListener('input', toggleWatchButtons);

            // Add event listeners for watch buttons
            document.getElementById('watch_trailer_btn').addEventListener('click', function() {
                const trailerUrl = document.getElementById('trailer_url').value.trim();
                if (trailerUrl) {
                    playVideo(trailerUrl, 'Watch Trailer');
                }
            });

            // Add event listeners for file watch buttons
            document.getElementById('watch_trailer_file_btn').addEventListener('click', function() {
                // Get the trailer file URL from existing file or uploaded file
                const uploadedTrailerPath = document.getElementById('uploaded_trailer_path');
                let trailerFileUrl = '';

                if (uploadedTrailerPath && uploadedTrailerPath.value) {
                    trailerFileUrl = uploadedTrailerPath.value;
                } else {
                    // For existing files, we need to get the URL from the server
                    // Since we can't access the full URL from the filename, we'll use the trailer_url from the season data
                    const seasonTrailerUrl = '{{ $season->trailer_url }}';
                    if (seasonTrailerUrl) {
                        trailerFileUrl = seasonTrailerUrl;
                    }
                }

                if (trailerFileUrl) {
                    playVideo(trailerFileUrl, 'Watch Trailer');
                } else {
                    alert('No trailer file available to play.');
                }
            });

            // Clear video sources when modal is hidden
            document.getElementById('videoPlayerModal').addEventListener('hidden.bs.modal', clearVideoSources);

            // Trailer file upload
            document.getElementById('trailer_file').addEventListener('change', function(e) {
                if (document.getElementById('trailer_url_type').value !== 'Local') {
                    this.value = '';
                    return;
                }
                const hiddenTrailerPath = document.getElementById('uploaded_trailer_path');
                if (hiddenTrailerPath && hiddenTrailerPath.value) {
                    this.value = '';
                    return;
                }
                uploadFileInChunks(
                    this,
                    seasonId,
                    'trailer',
                    'trailer_upload_progress_wrap',
                    'trailer_upload_progress',
                    'trailer_upload_result',
                    'uploaded_trailer_path',
                    'trailer_url',
                    'isTrailerUploading'
                );
            });


            // Form submit handling
            document.getElementById('upload-files-form').addEventListener('submit', function(e) {
                const trailerType = document.getElementById('trailer_url_type').value;
                const trailerUrlInput = document.getElementById('trailer_url');
                const trailerFileInput = document.getElementById('trailer_file');
                const hiddenTrailerPath = document.getElementById('uploaded_trailer_path');

                // Remove name and disable from file input by default
                trailerFileInput && trailerFileInput.removeAttribute('name');
                trailerFileInput && (trailerFileInput.disabled = true);

                // Only enable and set name for the file input if user is uploading a new file
                if (trailerType === 'Local' && !(hiddenTrailerPath && hiddenTrailerPath.value) && trailerFileInput.files.length === 0) {
                    trailerFileInput.setAttribute('name', 'trailer_file');
                    trailerFileInput.disabled = false;
                }

                // Remove required from all
                trailerFileInput && trailerFileInput.removeAttribute('required');
                trailerUrlInput && trailerUrlInput.removeAttribute('required');

                // Trailer must be provided
                let trailerProvided = false;
                if (trailerType === 'Local') {
                    trailerProvided = hiddenTrailerPath && hiddenTrailerPath.value;
                } else if (trailerType === 'URL' || trailerType === 'HSL') {
                    trailerProvided = trailerUrlInput && trailerUrlInput.value;
                }
                if (!trailerProvided) {
                    e.preventDefault();
                    alert('Please provide a trailer.');
                    return false;
                }

                const buttons = this.querySelectorAll('button[type="submit"]');
                buttons.forEach(function(btn) {
                    btn.disabled = true;
                    btn.dataset.originalText = btn.innerHTML;
                    btn.innerHTML = 'Processing...';
                });
            });

            // Monitor form inputs for changes
            document.getElementById('upload-files-form').addEventListener('input', updateSubmitButton);

            // Initialize on page load
            const trailerUrlType = document.getElementById('trailer_url_type');
            if (trailerUrlType) {
                trailerUrlType.dispatchEvent(new Event('change'));
            }
            updateSubmitButton();
            toggleWatchButtons(); // Initial check for watch buttons
        });
    </script>
@endsection

<style>
    .progress {
        height: 20px;
        background-color: #f5f5f5;
        border-radius: 4px;
        margin-top: 8px;
        display: none;
    }
    .progress-bar {
        background-color: #17a2b8;
        color: #fff;
        text-align: center;
        line-height: 20px;
        border-radius: 4px;
        transition: width 0.3s ease-in-out;
    }
    .form-icon-group .form-icon {
        top: 50%;
        transform: translateY(-50%);
        left: 10px;
    }
    .form-icon-group input {
        padding-left: 35px;
    }
</style>
