@extends('layouts.app')

@section('title', 'List TV Shows')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-25 d-flex justify-content-between">
                <h3>Site Settings</h3>
            </div>
        </div>
    </div>
    <ul class="contacts list-unstyled">
        <li class="bg-card">
            <a class="flex-grow-1" href="{{ route('admin.site.banners') }}">
                <div class="ms-3">
                    <h6 class="mb-0">Movies Banner Settings</h6>
                </div>
            </a>
        </li>
        <li class="bg-card">
            <a class="flex-grow-1" href="#" role="button">
                <div class="ms-3">
                    <h6 class="mb-0">Top 10 Movies Settings</h6>
                </div>
            </a>
            <a class="btn btn-info btn-sm me-3 edit-setting" href="#" data-name="Top 10" data-type="Top 10" data-slug="top-10" data-action="edit" data-type-category="movie"><i class="bi bi-pencil"></i></a>
            <a class="btn btn-secondary btn-sm add-setting" href="#" data-name="Top 10" data-type="Top 10" data-slug="top-10" data-action="add" data-type-category="movie"><i class="bi bi-plus"></i></a>
        </li>
        <li class="bg-card">
            <a class="flex-grow-1" href="#" role="button">
                <div class="ms-3">
                    <h6 class="mb-0">Latest Movies Settings</h6>
                </div>
            </a>
            <a class="btn btn-info btn-sm me-3 edit-setting" href="#" data-name="Latest Movies" data-type="Latest" data-slug="latest-movies" data-action="edit" data-type-category="movie"><i class="bi bi-pencil"></i></a>
            <a class="btn btn-secondary btn-sm add-setting" href="#" data-name="Latest Movies" data-type="Latest" data-slug="latest-movies" data-action="add" data-type-category="movie"><i class="bi bi-plus"></i></a>
        </li>
        <li class="bg-card">
            <a class="flex-grow-1" href="#" role="button">
                <div class="ms-3">
                    <h6 class="mb-0">Popular Movies Settings</h6>
                </div>
            </a>
            <a class="btn btn-info btn-sm me-3 edit-setting" href="#" data-name="Popular Movies" data-type="Popular" data-slug="popular-movies" data-action="edit" data-type-category="movie"><i class="bi bi-pencil"></i></a>
            <a class="btn btn-secondary btn-sm add-setting" href="#" data-name="Popular Movies" data-type="Popular" data-slug="popular-movies" data-action="add" data-type-category="movie"><i class="bi bi-plus"></i></a>
        </li>
        <li class="bg-card">
            <a class="flex-grow-1" href="#" role="button">
                <div class="ms-3">
                    <h6 class="mb-0">Popular TV Shows Settings</h6>
                </div>
            </a>
            <a class="btn btn-info btn-sm me-3 edit-setting" href="#" data-name="Popular TV Shows" data-type="Popular" data-slug="popular-tv-shows" data-action="edit" data-type-category="tvshow"><i class="bi bi-pencil"></i></a>
            <a class="btn btn-secondary btn-sm add-setting" href="#" data-name="Popular TV Shows" data-type="Popular" data-slug="popular-tv-shows" data-action="add" data-type-category="tvshow"><i class="bi bi-plus"></i></a>
        </li>
        {{-- <li class="bg-card">
            <a class="flex-grow-1" href="#" role="button">
                <div class="ms-3">
                    <h6 class="mb-0">TV Shows Banner Settings</h6>
                </div>
            </a>
            <a class="btn btn-info btn-sm me-3 edit-setting" href="#" data-name="TV Shows Banner" data-type="Banner" data-slug="tv-shows-banner" data-action="edit" data-type-category="tvshow"><i class="bi bi-pencil"></i></a>
            <a class="btn btn-secondary btn-sm add-setting" href="#" data-name="TV Shows Banner" data-type="Banner" data-slug="tv-shows-banner" data-action="add" data-type-category="tvshow"><i class="bi bi-plus"></i></a>
        </li> --}}
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content z-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Site Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="settingForm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="settingName" class="form-label">Name *</label>
                                    <input type="text" readonly class="form-control" id="settingName" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="settingType" class="form-label">Slug *</label>
                                    <input type="text" readonly class="form-control" id="settingType" name="type" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="settingValue" class="form-label">Value</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                        <select class="form-select select2 z-3" id="settingValue" name="value[]" multiple>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="settingSlug" name="slug">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveSetting">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .select2-container {
            z-index: 1050 !important;
        }
        .select2-dropdown {
            z-index: 1060 !important;
        }
        .modal-open .modal {
            overflow-y: auto !important;
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('exampleModalLive');
            const settingForm = document.getElementById('settingForm');
            const saveButton = document.getElementById('saveSetting');
            let select2Initialized = false;

            // Handle edit and add buttons
            document.querySelectorAll('.edit-setting, .add-setting').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const name = this.getAttribute('data-name');
                    const type = this.getAttribute('data-type');
                    const slug = this.getAttribute('data-slug');
                    const action = this.getAttribute('data-action');
                    const typeCategory = this.getAttribute('data-type-category');

                    // Populate modal fields
                    document.getElementById('settingName').value = name;
                    document.getElementById('settingType').value = slug;
                    document.getElementById('settingSlug').value = slug;
                    document.getElementById('exampleModalLiveLabel').textContent = `${action === 'edit' ? 'Edit' : 'Add'} ${name} Setting`;

                    // Clear previous value and destroy Select2 if initialized
                    const valueSelect = document.getElementById('settingValue');
                    if (select2Initialized) {
                        $(valueSelect).select2('destroy');
                    }
                    valueSelect.innerHTML = '';

                    // Fetch existing setting values for the slug
                    fetch(`/admin/site/settings/values/${slug}`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (!response.ok && response.status !== 404) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(setting => {
                        const existingValues = setting && setting.value ? setting.value : [];

                        // Fetch entertainment data
                        return fetch(`/admin/search-entertainment-name?type=${encodeURIComponent(typeCategory)}`, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.name;
                                valueSelect.appendChild(option);
                            });

                            // Initialize Select2
                            $(valueSelect).select2({
                                placeholder: 'Search and select movies or TV shows...',
                                allowClear: true,
                                width: '100%',
                                closeOnSelect: false,
                                tags: false,
                                tokenSeparators: [',', ' '],
                                dropdownParent: $('#exampleModalLive'),
                                language: {
                                    noResults: function() {
                                        return "No results found";
                                    },
                                    searching: function() {
                                        return "Searching...";
                                    }
                                }
                            }).on('select2:open', function(e) {
                                e.stopPropagation();
                            });

                            // Pre-select existing values
                            if (existingValues.length > 0) {
                                $(valueSelect).val(existingValues.map(String)).trigger('change');
                            }

                            select2Initialized = true;
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));

                    // Show the modal
                    new bootstrap.Modal(modal).show();
                });
            });

            function showNotice(message, isError) {
                let notice = document.getElementById('settingNotice');
                if (!notice) {
                    notice = document.createElement('div');
                    notice.id = 'settingNotice';
                    notice.setAttribute('role', 'alert');
                    document.querySelector('.card.mb-3').insertAdjacentElement('afterend', notice);
                }
                notice.className = 'alert ' + (isError ? 'alert-danger' : 'alert-success');
                notice.textContent = message;
            }

            // Handle save button
            saveButton.addEventListener('click', function () {
                const formData = new FormData(settingForm);
                saveButton.disabled = true;

                fetch('/admin/site/settings/values', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(async response => {
                    const data = await response.json().catch(() => ({}));
                    if (!response.ok) {
                        const message = data.message || 'Could not save this setting.';
                        throw new Error(message);
                    }
                    return data;
                })
                .then(data => {
                    bootstrap.Modal.getInstance(modal).hide();
                    showNotice(data.message || 'Saved successfully.', false);
                })
                .catch(error => {
                    showNotice(error.message || 'Could not save this setting.', true);
                })
                .finally(() => {
                    saveButton.disabled = false;
                });
            });
        });
    </script>
@endsection
