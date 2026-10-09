/**
 * Reusable Pre-signed URL Upload Functionality
 * This script provides pre-signed URL upload functionality for all upload forms
 */

class PresignedUpload {
    constructor(options = {}) {
        this.itemId = options.itemId;
        this.itemType = options.itemType; // 'episodes', 'movies', 'podcasts', 'seasons', 'tvshows'

        // Get CSRF token with error handling
        const csrfInput = document.querySelector('input[name="_token"]');
        if (csrfInput) {
            this.csrfToken = csrfInput.value;
            console.log('CSRF token found');
        } else {
            console.error('CSRF token not found!');
            this.csrfToken = '';
        }

        this.uploadingFlags = {};
        this.uploadedData = {};

        console.log('PresignedUpload constructor called with:', {
            itemId: this.itemId,
            itemType: this.itemType,
            csrfToken: this.csrfToken ? 'found' : 'missing'
        });

        this.addProgressStyles();
        this.init();
    }

    addProgressStyles() {
        // Add CSS styles for progress bar if they don't exist
        if (!document.getElementById('presigned-upload-styles')) {
            const style = document.createElement('style');
            style.id = 'presigned-upload-styles';
            style.textContent = `
                .progress {
                    height: 20px;
                    background-color: #f5f5f5;
                    border-radius: 4px;
                    margin-top: 8px;
                    display: none;
                    border: 1px solid #ddd;
                }
                .progress-bar {
                    background-color: #17a2b8;
                    color: #fff;
                    text-align: center;
                    line-height: 20px;
                    border-radius: 4px;
                    transition: width 0.3s ease-in-out;
                    font-weight: bold;
                    font-size: 12px;
                    min-width: 2em;
                }
                .progress-bar.bg-success {
                    background-color: #28a745 !important;
                }
                .progress-bar.bg-danger {
                    background-color: #dc3545 !important;
                }
            `;
            document.head.appendChild(style);
        }
    }

    init() {
        this.bindEvents();
    }

    bindEvents() {
        console.log('Binding events for PresignedUpload');

        // Bind file input change events
        document.addEventListener('change', (e) => {
            if (e.target.type === 'file') {
                console.log('File input changed:', e.target.id);
                const fileInput = e.target;
                const type = this.getFileType(fileInput);
                console.log('Detected file type:', type);
                if (type) {
                    console.log('Calling handleFileUpload for type:', type);
                    this.handleFileUpload(fileInput, type);
                }
            }
        });

        // Update submit button states
        this.updateSubmitButton();

        console.log('Events bound successfully');
    }

    getFileType(fileInput) {
        const id = fileInput.id;
        console.log('Getting file type for input ID:', id);
        if (id.includes('trailer')) {
            console.log('Detected trailer file type');
            return 'trailer';
        }
        if (id.includes('video')) {
            console.log('Detected video file type');
            return 'video';
        }
        console.log('No matching file type found for ID:', id);
        return null;
    }

    async handleFileUpload(fileInput, type) {
        console.log('handleFileUpload called with type:', type);
        const file = fileInput.files[0];
        if (!file) {
            console.log('No file selected');
            return false;
        }

        console.log('Selected file:', file.name, 'Size:', file.size);

        const uploadFlag = `is${type.charAt(0).toUpperCase() + type.slice(1)}Uploading`;
        const progressWrapId = `${type}_upload_progress_wrap`;
        const progressBarId = `${type}_upload_progress`;
        const resultId = `${type}_upload_result`;

        console.log('Progress element IDs:', {
            progressWrapId,
            progressBarId,
            resultId
        });

        // Check if elements exist
        const progressWrap = document.getElementById(progressWrapId);
        const progressBar = document.getElementById(progressBarId);
        const resultDiv = document.getElementById(resultId);

        console.log('Elements found:', {
            progressWrap: !!progressWrap,
            progressBar: !!progressBar,
            resultDiv: !!resultDiv
        });

        // Create progress elements if they don't exist
        if (!progressWrap) {
            console.log('Creating progress wrap element');
            const progressWrapElement = document.createElement('div');
            progressWrapElement.id = progressWrapId;
            progressWrapElement.className = 'progress mt-2';
            progressWrapElement.style.cssText = 'height: 20px; display: none;';

            const progressBarElement = document.createElement('div');
            progressBarElement.id = progressBarId;
            progressBarElement.className = 'progress-bar';
            progressBarElement.setAttribute('role', 'progressbar');
            progressBarElement.style.cssText = 'width: 0%;';
            progressBarElement.textContent = '0%';

            progressWrapElement.appendChild(progressBarElement);

            // Insert after the file input
            fileInput.parentNode.insertBefore(progressWrapElement, fileInput.nextSibling);
        }

        if (!resultDiv) {
            console.log('Creating result div element');
            const resultDivElement = document.createElement('div');
            resultDivElement.id = resultId;
            resultDivElement.className = 'mt-2';

            // Insert after the progress wrap
            const progressWrapAfter = document.getElementById(progressWrapId);
            if (progressWrapAfter) {
                progressWrapAfter.parentNode.insertBefore(resultDivElement, progressWrapAfter.nextSibling);
            } else {
                // Fallback: insert after file input
                fileInput.parentNode.insertBefore(resultDivElement, fileInput.nextSibling);
            }
        }

        // Check if URL type is set to Local
        const urlTypeSelect = document.getElementById(`${type}_url_type`) ||
                             document.getElementById(`${type}_upload_type`);

        console.log('URL type select element:', urlTypeSelect, 'Value:', urlTypeSelect?.value);

        if (urlTypeSelect && urlTypeSelect.value !== 'Local') {
            console.log('URL type is not Local, clearing file input');
            fileInput.value = '';
            return;
        }

        this.uploadingFlags[type] = true;
        this.updateSubmitButton();

        // Show progress immediately
        console.log('Starting upload for type:', type);
        this.showProgress(progressWrapId, progressBarId, resultId);
        this.updateProgress(progressBarId, 10);

        try {
            this.updateProgress(progressBarId, 20);

            // Step 1: Get presigned URL from Laravel backend
            const presignedUrl = `/admin/${this.itemType}/${this.itemId}/presigned-url`;
            console.log('Requesting presigned URL from:', presignedUrl);
            console.log('Request data:', {
                file_name: file.name,
                file_type: type,
                content_type: file.type
            });

            const presignedResponse = await fetch(presignedUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({
                    file_name: file.name,
                    file_type: type,
                    content_type: file.type
                })
            });

            console.log('Presigned URL response status:', presignedResponse.status);

            if (!presignedResponse.ok) {
                const errorText = await presignedResponse.text();
                console.error('Presigned URL response error:', errorText);
                throw new Error('Failed to get presigned URL');
            }

            const presignedData = await presignedResponse.json();
            console.log('Presigned URL data:', presignedData);

            if (!presignedData.success) {
                throw new Error(presignedData.message);
            }

            this.updateProgress(progressBarId, 30);

            // Step 2: Upload file directly to DigitalOcean Spaces using presigned URL
            const uploadPromise = new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();

                xhr.upload.addEventListener('progress', (e) => {
                    if (e.lengthComputable) {
                        const percentComplete = Math.round((e.loaded / e.total) * 60) + 30; // 30-90%
                        this.updateProgress(progressBarId, Math.min(percentComplete, 90));
                    }
                });

                xhr.addEventListener('load', () => {
                    if (xhr.status === 200) {
                        resolve();
                    } else {
                        reject(new Error(`Upload failed with status: ${xhr.status}`));
                    }
                });

                xhr.addEventListener('error', () => {
                    reject(new Error('Network error during upload'));
                });

                xhr.open('PUT', presignedData.presigned_url);
                xhr.setRequestHeader('Content-Type', file.type);
                xhr.send(file);
            });

            await uploadPromise;
            this.updateProgress(progressBarId, 90);

            // Step 3: Notify Laravel backend that upload is complete
            const completeResponse = await fetch(`/admin/${this.itemType}/${this.itemId}/upload-complete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({
                    file_type: type,
                    file_path: presignedData.file_path,
                    file_url: presignedData.final_url,
                    file_name: file.name
                })
            });

            if (!completeResponse.ok) {
                throw new Error('Failed to complete upload');
            }

            const completeData = await completeResponse.json();
            if (!completeData.success) {
                throw new Error(completeData.message);
            }

            this.updateProgress(progressBarId, 100);

            // Store uploaded data for form submission
            this.uploadedData[type] = {
                file_url: presignedData.final_url,
                file_name: file.name,
                file_path: presignedData.file_path
            };

            this.showResult(progressBarId, resultId, `${type.charAt(0).toUpperCase() + type.slice(1)} uploaded successfully!`, true);

            // Update the file input to show uploaded file name
            this.updateFileInputDisplay(fileInput, file.name);

        } catch (error) {
            console.error('Upload error:', error);
            this.showResult(progressBarId, resultId, 'Upload failed: ' + error.message, false);
        } finally {
            this.uploadingFlags[type] = false;
            this.updateSubmitButton();
        }

        return true;
    }

    showProgress(progressWrapId, progressBarId, resultId) {
        const progressWrap = document.getElementById(progressWrapId);
        const progressBar = document.getElementById(progressBarId);
        const resultDiv = document.getElementById(resultId);

        console.log('Showing progress for:', progressWrapId, progressBarId, resultId);

        if (progressWrap) {
            progressWrap.style.display = 'block';
            console.log('Progress wrap displayed');
        } else {
            console.error('Progress wrap element not found:', progressWrapId);
        }

        if (progressBar) {
            progressBar.style.width = '0%';
            progressBar.innerText = '0%';
            progressBar.classList.remove('bg-success', 'bg-danger');
            console.log('Progress bar initialized');
        } else {
            console.error('Progress bar element not found:', progressBarId);
        }

        if (resultDiv) {
            resultDiv.innerHTML = '';
            console.log('Result div cleared');
        } else {
            console.error('Result div element not found:', resultId);
        }
    }

    updateProgress(progressBarId, percent) {
        const progressBar = document.getElementById(progressBarId);
        if (progressBar) {
            progressBar.style.width = percent + '%';
            progressBar.innerText = percent + '%';
            console.log('Progress updated to:', percent + '%');
        } else {
            console.error('Progress bar element not found for update:', progressBarId);
        }
    }

    hideProgress(progressWrapId) {
        const progressWrap = document.getElementById(progressWrapId);
        if (progressWrap) {
            progressWrap.style.display = 'none';
            console.log('Progress hidden:', progressWrapId);
        } else {
            console.error('Progress wrap element not found for hiding:', progressWrapId);
        }
    }

    showResult(progressBarId, resultId, message, isSuccess = true) {
        const progressBar = document.getElementById(progressBarId);
        const resultDiv = document.getElementById(resultId);

        if (progressBar) {
            if (isSuccess) {
                progressBar.classList.add('bg-success');
                progressBar.innerText = '100%';
                progressBar.style.width = '100%';
            } else {
                progressBar.classList.add('bg-danger');
            }
        }

        if (resultDiv) {
            const className = isSuccess ? 'text-success' : 'text-danger';
            resultDiv.innerHTML = `<span class='${className}'>${message}</span>`;
        }

        if (isSuccess) {
            setTimeout(() => this.hideProgress(resultId.replace('_result', '_progress_wrap')), 5000);
        }
    }

    updateFileInputDisplay(fileInput, fileName) {
        const nextElement = fileInput.nextElementSibling;
        if (nextElement && nextElement.classList.contains('mt-2')) {
            nextElement.style.display = 'block';
            nextElement.innerHTML = `<div class="mt-2 text-success">✓ ${fileName}</div>`;
        }
    }

    updateSubmitButton() {
        const submitBtn = document.getElementById('submit-btn');
        if (submitBtn) {
            const isUploading = Object.values(this.uploadingFlags).some(flag => flag);
            submitBtn.disabled = isUploading;
        }
    }

    // Method to check if files are uploaded (for form validation)
    hasUploadedFile(type) {
        return this.uploadedData[type] !== undefined;
    }

    // Method to get uploaded file data
    getUploadedData(type) {
        return this.uploadedData[type];
    }

    // Test function to verify progress bar is working
    testProgressBar(type = 'trailer') {
        console.log('Testing progress bar for type:', type);
        const progressWrapId = `${type}_upload_progress_wrap`;
        const progressBarId = `${type}_upload_progress`;
        const resultId = `${type}_upload_result`;

        this.showProgress(progressWrapId, progressBarId, resultId);

        let percent = 0;
        const interval = setInterval(() => {
            percent += 10;
            this.updateProgress(progressBarId, percent);

            if (percent >= 100) {
                clearInterval(interval);
                this.showResult(progressBarId, resultId, 'Test completed successfully!', true);

                setTimeout(() => {
                    this.hideProgress(progressWrapId);
                }, 3000);
            }
        }, 200);
    }
}

// Add test function to window for debugging
window.testProgressBar = function(type = 'trailer') {
    if (window.presignedUpload) {
        window.presignedUpload.testProgressBar(type);
    } else {
        console.error('PresignedUpload not initialized');
    }
};

// Initialize upload functionality when DOM is loaded
function initializePresignedUpload() {
    console.log('PresignedUpload script loaded');

    // Auto-detect item type and ID from the current page
    const pathParts = window.location.pathname.split('/');
    let itemType = null;
    let itemId = null;

    console.log('Path parts:', pathParts);

    // Extract item type and ID from URL
    for (let i = 0; i < pathParts.length; i++) {
        if (pathParts[i] === 'admin' && i + 1 < pathParts.length) {
            itemType = pathParts[i + 1];
            if (i + 3 < pathParts.length && pathParts[i + 2] === 'upload') {
                itemId = pathParts[i + 3];
            } else if (i + 2 < pathParts.length && !isNaN(pathParts[i + 2])) {
                itemId = pathParts[i + 2];
            }
            break;
        }
    }

    console.log('Detected itemType:', itemType, 'itemId:', itemId);

    if (itemType && itemId) {
        // Initialize the presigned upload functionality
        window.presignedUpload = new PresignedUpload({
            itemId: itemId,
            itemType: itemType
        });
        console.log('PresignedUpload initialized for:', itemType, itemId);
    } else {
        console.warn('Could not detect itemType or itemId from URL');
        // Try to initialize anyway for testing
        console.log('Attempting to initialize without itemType/itemId for testing');
        try {
            window.presignedUpload = new PresignedUpload({
                itemId: '1',
                itemType: 'episodes'
            });
            console.log('PresignedUpload initialized with default values');
        } catch (error) {
            console.error('Failed to initialize PresignedUpload:', error);
        }
    }
}

// Try multiple initialization methods
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializePresignedUpload);
} else {
    // DOM is already loaded
    console.log('DOM already loaded, initializing immediately');
    initializePresignedUpload();
}

// Fallback initialization after a short delay
setTimeout(() => {
    if (!window.presignedUpload) {
        console.log('Fallback initialization triggered');
        initializePresignedUpload();
    }
}, 1000);
