@extends('layouts.app')

@section('title', 'Edit Tv Show')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 d-flex justify-content-between align-items-center">
                <h3>Edit Tv Show</h3>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-info rounded-1" id="editTvShowBtn">
                        <i class="bi bi-pencil-square"></i> Edit TV Show Details
                    </button>
                    <a href="{{ route('admin.tvshows.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>
            <form action="{{ route('admin.tvshows.update', $tvshow->id) }}" method="POST"
                enctype="multipart/form-data" id="tvshow-edit-form" style="display: none;">
                @csrf
                @method('PUT')
                <h6 class="fw-bold border-0 mt-3">About TV Show</h6>
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
                                                    <label for="poster_url" class="image-upload-box"
                                                        id="poster_box">
                                                        @if ($tvshow->poster_url)
                                                            <img id="poster_preview"
                                                                src="{{ getImageUrl($tvshow->poster_url) }}"
                                                                alt="Poster Preview" style="display:block;" />
                                                            <span id="poster_placeholder"
                                                                style="display:none;">Click to select
                                                                Poster</span>
                                                        @else
                                                            <img id="poster_preview" src="#"
                                                                alt="Poster Preview" style="display:none;" />
                                                            <span id="poster_placeholder">Click to select
                                                                Poster</span>
                                                        @endif
                                                        <input type="file" name="poster_url" id="poster_url"
                                                            accept="image/*" style="display:none;">
                                                        @if($tvshow->poster_url)
                                                            <input type="hidden" name="poster_url" value="{{ $tvshow->poster_url }}">
                                                        @endif
                                                    </label>
                                                    @error('poster_url')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="thumbnail_url" class="image-upload-box"
                                                        id="thumbnail_box">
                                                        @if ($tvshow->thumbnail_url)
                                                            <img id="thumbnail_preview"
                                                                src="{{ getImageUrl($tvshow->thumbnail_url) }}"
                                                                alt="Thumbnail Preview" style="display:block;" />
                                                            <span id="thumbnail_placeholder"
                                                                style="display:none;">Click to select
                                                                Thumbnail</span>
                                                        @else
                                                            <img id="thumbnail_preview" src="#"
                                                                alt="Thumbnail Preview" style="display:none;" />
                                                            <span id="thumbnail_placeholder">Click to select
                                                                Thumbnail</span>
                                                        @endif
                                                        <input type="file" name="thumbnail_url"
                                                            id="thumbnail_url" accept="image/*"
                                                            style="display:none;">
                                                        @if($tvshow->thumbnail_url)
                                                            <input type="hidden" name="thumbnail_url" value="{{ $tvshow->thumbnail_url }}">
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
                                    <input type="text" name="name"
                                        class="form-control ps-2 @error('name') is-invalid @enderror"
                                        value="{{ old('name', $tvshow->name) }}"
                                        placeholder="Enter movie name">
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
                                    <textarea name="description"
                                        class="form-control ps-2 @error('description') is-invalid @enderror"
                                        rows="4">{{ old('description', $tvshow->description) }}</textarea>
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
                                    <fieldset class="form-icon-group left-icon position-relative ps-2">
                                    <select name="language"
                                        class="form-select @error('language') is-invalid @enderror"
                                        >
                                        <option value="">Select Language</option>
                                        <option value="English"
                                            {{ old('language', $tvshow->language) == 'English' ? 'selected' : '' }}>
                                            English</option>
                                        <option value="Hindi"
                                            {{ old('language', $tvshow->language) == 'Hindi' ? 'selected' : '' }}>
                                            Hindi</option>
                                        <option value="Korean"
                                            {{ old('language', $tvshow->language) == 'Korean' ? 'selected' : '' }}>
                                            Korean</option>
                                        <option value="Spanish"
                                            {{ old('language', $tvshow->language) == 'Spanish' ? 'selected' : '' }}>
                                            Spanish</option>
                                        <option value="French"
                                            {{ old('language', $tvshow->language) == 'French' ? 'selected' : '' }}>
                                            French</option>
                                        <option value="Japanese"
                                            {{ old('language', $tvshow->language) == 'Japanese' ? 'selected' : '' }}>
                                            Japanese
                                        </option>
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
                                    <fieldset class="form-icon-group left-icon position-relative ps-2">
                                    <select name="genres[]"
                                        class="form-select select2 @error('genres') is-invalid @enderror"
                                        multiple>
                                        @php
                                            $selectedGenres = old(
                                                'genres',
                                                $tvshow->entertainmentGenerMappings
                                                    ? $tvshow->entertainmentGenerMappings
                                                        ->pluck('genre_id')
                                                        ->toArray()
                                                    : [],
                                            );
                                        @endphp
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}"
                                                {{ in_array($genre->id, $selectedGenres) ? 'selected' : '' }}>
                                                {{ $genre->name }}
                                            </option>
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
                                    <label for="tmdb_id" class="form-label fw-bold">Country</label>
                                    <fieldset class="form-icon-group left-icon position-relative">
                                    <select name="countries[]"
                                        class="form-select select2 ps-2 @error('countries') is-invalid @enderror"
                                        multiple>
                                        @php
                                            $selectedCountry = old(
                                                'genres',
                                                $tvshow->entertainmentCountryMappings
                                                    ? $tvshow->entertainmentCountryMappings
                                                        ->pluck('country_id')
                                                        ->toArray()
                                                    : [],
                                            );
                                        @endphp
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ in_array($country->id, $selectedCountry) ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </fieldset>
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
                                        value="{{ old('IMDb_rating', $tvshow->IMDb_rating) }}"
                                        placeholder="IMDb rating (e.g. 7.5)">
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
                                        value="{{ old('duration', $tvshow->duration) }}"
                                        placeholder="e.g. 2:10">
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
                                    <input type="date" name="release_date"
                                        class="form-control f-basic flatpickr-input ps-2 @error('release_date') is-invalid @enderror"
                                        value="{{ old('release_date', $tvshow->release_date ? $tvshow->release_date->format('Y-m-d') : '') }}"
                                        placeholder="Select release date">
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
                                    <div class="form-check form-switch ">
                                        <input type="hidden" name="status" value="0">
                                        <input class="form-check-input" name="status" id="status"
                                            type="checkbox" value="1"
                                            {{ old('status', $tvshow->status) == '1' ? 'checked' : '' }}>
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
                                        class="form-select select2 ps-2 @error('actors') is-invalid @enderror"
                                        multiple>
                                        @php
                                            $selectedActors = old('actors');
                                            if ($selectedActors === null) {
                                                $selectedActors = $tvshow->entertainmentTalentMappings
                                                    ? $tvshow->entertainmentTalentMappings->filter(function($m) {
                                                        return $m->talentprofile && $m->talentprofile->type === 'actor';
                                                    })->pluck('cast_id')->toArray()
                                                    : [];
                                            }
                                            $selectedDirectors = old('directors');
                                            if ($selectedDirectors === null) {
                                                $selectedDirectors = $tvshow->entertainmentTalentMappings
                                                    ? $tvshow->entertainmentTalentMappings->filter(function($m) {
                                                        return $m->talentprofile && $m->talentprofile->type === 'director';
                                                    })->pluck('cast_id')->toArray()
                                                    : [];
                                            }
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
                                    <select name="directors[]"
                                        class="form-select select2 ps-2 @error('directors') is-invalid @enderror"
                                        multiple>
                                        @php
                                            $selectedDirectors = old('directors');
                                            if ($selectedDirectors === null) {
                                                $selectedDirectors = $tvshow->entertainmentTalentMappings
                                                    ? $tvshow->entertainmentTalentMappings->filter(function($m) {
                                                        return $m->talentprofile && $m->talentprofile->type === 'director';
                                                    })->pluck('cast_id')->toArray()
                                                    : [];
                                            }
                                        @endphp
                                        @foreach ($directors as $director)
                                            <option value="{{ $director->id }}" {{ in_array($director->id, $selectedDirectors) ? 'selected' : '' }}>{{ $director->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('directors')
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

      {{-- Seasons Datatable --}}
      <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold">Seasons ({{ $seasons->count() }})</h5>
                <a href="{{ route('admin.seasons.create') }}?entertainment_id={{ $tvshow->id }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Add Season
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="seasonsTable">
                    <thead>
                        <tr>
                            <th>S#</th>
                            <th>Poster</th>
                            <th>Season Name</th>
                            <th>Season Index</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seasons as $index => $season)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ getImageUrl($season->poster_url) }}" alt="{{ $season->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                </td>
                                <td>{{ $season->name }}</td>
                                <td>Season {{ $season->season_index }}</td>
                                <td>
                                    <span class="badge {{ $season->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $season->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.seasons.upload', $season->id) }}?entertainment_id={{ $tvshow->id }}" class="btn btn-sm btn-info" title="Upload Files">
                                        <i class="bi bi-cloud-upload"></i>
                                    </a>
                                    <a href="{{ route('admin.seasons.edit', $season->id) }}?entertainment_id={{ $tvshow->id }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger delete-season-btn" data-id="{{ $season->id }}" data-name="{{ $season->name }}" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Delete Season Confirmation Modal --}}
    <div class="modal fade" id="deleteSeasonModal" tabindex="-1" aria-labelledby="deleteSeasonModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteSeasonModalLabel">
                        <i class="bi bi-exclamation-triangle"></i> Confirm Delete Season
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Are you sure you want to delete "<strong id="seasonNameToDelete"></strong>"?</p>
                    <div class="alert alert-warning mb-0">
                        <i class="bi bi-exclamation-circle"></i>
                        <strong>Warning:</strong> This will also delete all episodes associated with this season.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteSeason">
                        <i class="bi bi-trash"></i> Delete Season
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Episode Confirmation Modal --}}
    <div class="modal fade" id="deleteEpisodeModal" tabindex="-1" aria-labelledby="deleteEpisodeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteEpisodeModalLabel">
                        <i class="bi bi-exclamation-triangle"></i> Confirm Delete Episode
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete "<strong id="episodeNameToDelete"></strong>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteEpisode">
                        <i class="bi bi-trash"></i> Delete Episode
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Episodes Datatable --}}
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold">Episodes ({{ $episodes->count() }})</h5>
                <a href="{{ route('admin.episodes.create') }}?entertainment_id={{ $tvshow->id }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Add Episode
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="episodesTable">
                    <thead>
                        <tr>
                            <th>S#</th>
                            <th>Poster</th>
                            <th>Episode Name</th>
                            <th>Season</th>
                            <th>Episode #</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($episodes as $index => $episode)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ getImageUrl($episode->poster_url) }}" alt="{{ $episode->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                </td>
                                <td>{{ $episode->name }}</td>
                                <td>{{ $episode->seasondata ? $episode->seasondata->name : 'N/A' }}</td>
                                <td>Episode {{ $episode->episode_number }}</td>
                                <td>{{ $episode->duration ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $episode->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $episode->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.episodes.upload', $episode->id) }}?entertainment_id={{ $tvshow->id }}" class="btn btn-sm btn-info" title="Upload Files">
                                        <i class="bi bi-cloud-upload"></i>
                                    </a>
                                    <a href="{{ route('admin.episodes.edit', $episode->id) }}?entertainment_id={{ $tvshow->id }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger delete-episode-btn" data-id="{{ $episode->id }}" data-name="{{ $episode->name }}" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit TV Show Modal -->
    <div class="modal fade" id="editTvShowModal" tabindex="-1" aria-labelledby="editTvShowModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTvShowModalLabel">
                        <i class="bi bi-pencil-square"></i> Edit TV Show Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalFormContainer">
                    <!-- Form will be moved here via JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-info" id="saveModalBtn">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Handle Edit TV Show Button Click
            $('#editTvShowBtn').on('click', function() {
                const form = $('#tvshow-edit-form');
                const modalContainer = $('#modalFormContainer');

                // Move form to modal
                form.detach().appendTo(modalContainer);
                form.show();

                // Reinitialize Select2 in modal
                modalContainer.find('.select2').select2({
                    placeholder: 'Search and select...',
                    allowClear: true,
                    width: '100%',
                    closeOnSelect: false,
                    tags: false,
                    tokenSeparators: [',', ' '],
                    dropdownParent: $('#editTvShowModal'),
                    language: {
                        noResults: function() {
                            return "No results found";
                        },
                        searching: function() {
                            return "Searching...";
                        }
                    }
                });

                // Reinitialize Flatpickr in modal
                modalContainer.find(".f-basic").flatpickr({
                    enableTime: false,
                    dateFormat: "Y-m-d",
                });

                // Show modal
                const editModal = new bootstrap.Modal(document.getElementById('editTvShowModal'));
                editModal.show();
            });

            // Handle Save Button in Modal
            $('#saveModalBtn').on('click', function() {
                $('#tvshow-edit-form').submit();
            });

            // When modal is closed, move form back to original location
            $('#editTvShowModal').on('hidden.bs.modal', function() {
                const form = $('#tvshow-edit-form');
                const originalContainer = $('.card-body').first();

                form.detach().appendTo(originalContainer);
                form.hide();
            });

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

            // Initialize DataTables for Seasons and Episodes
            if ($.fn.DataTable) {
                $('#seasonsTable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "pageLength": 10,
                    "order": [[0, 'asc']],
                    "columnDefs": [
                        { "orderable": false, "targets": [1, 5] }
                    ],
                    "language": {
                        "emptyTable": "No seasons available for this TV show",
                        "zeroRecords": "No matching seasons found"
                    }
                });

                $('#episodesTable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "pageLength": 10,
                    "order": [[0, 'asc']],
                    "columnDefs": [
                        { "orderable": false, "targets": [1, 7] }
                    ],
                    "language": {
                        "emptyTable": "No episodes available for this TV show",
                        "zeroRecords": "No matching episodes found"
                    }
                });
            }

            // Set initial visibility of plan_id_container based on movie_access
            const movieAccess = document.getElementById('movie_access').value;
            const planContainer = document.getElementById('plan_id_container');
            planContainer.style.display = movieAccess === 'Paid' ? 'block' : 'none';

            // Delete Season Handler - Show Modal
            let seasonToDelete = null;
            $(document).on('click', '.delete-season-btn', function() {
                seasonToDelete = {
                    id: $(this).data('id'),
                    name: $(this).data('name')
                };

                $('#seasonNameToDelete').text(seasonToDelete.name);
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteSeasonModal'));
                deleteModal.show();
            });

            // Confirm Delete Season
            $('#confirmDeleteSeason').on('click', function() {
                if (!seasonToDelete) return;

                const btn = $(this);
                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Deleting...');

                $.ajax({
                    url: `{{ url('admin/seasons') }}/${seasonToDelete.id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        bootstrap.Modal.getInstance(document.getElementById('deleteSeasonModal')).hide();
                        location.reload();
                    },
                    error: function(xhr) {
                        btn.prop('disabled', false).html('<i class="bi bi-trash"></i> Delete Season');
                        bootstrap.Modal.getInstance(document.getElementById('deleteSeasonModal')).hide();
                        alert('Error deleting season. Please try again.');
                        console.error(xhr);
                    }
                });
            });

            // Delete Episode Handler - Show Modal
            let episodeToDelete = null;
            $(document).on('click', '.delete-episode-btn', function() {
                episodeToDelete = {
                    id: $(this).data('id'),
                    name: $(this).data('name')
                };

                $('#episodeNameToDelete').text(episodeToDelete.name);
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteEpisodeModal'));
                deleteModal.show();
            });

            // Confirm Delete Episode
            $('#confirmDeleteEpisode').on('click', function() {
                if (!episodeToDelete) return;

                const btn = $(this);
                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Deleting...');

                $.ajax({
                    url: `{{ url('admin/episodes') }}/${episodeToDelete.id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        bootstrap.Modal.getInstance(document.getElementById('deleteEpisodeModal')).hide();
                        location.reload();
                    },
                    error: function(xhr) {
                        btn.prop('disabled', false).html('<i class="bi bi-trash"></i> Delete Episode');
                        bootstrap.Modal.getInstance(document.getElementById('deleteEpisodeModal')).hide();
                        alert('Error deleting episode. Please try again.');
                        console.error(xhr);
                    }
                });
            });
        });

        // Helper to show error message
        function showError(inputId, message, errorClass) {
            const errorDiv = document.querySelector(`.${errorClass}`);
            if (errorDiv) {
                errorDiv.textContent = message;
                errorDiv.style.display = 'block';
            }
        }

        // Helper to remove error message
        function removeError(inputId, errorClass) {
            const errorDiv = document.querySelector(`.${errorClass}`);
            if (errorDiv) {
                errorDiv.style.display = 'none';
            }
        }

        // Validate file size (2MB = 2 * 1024 * 1024 bytes)
        function validateFileSize(inputId) {
            const input = document.getElementById(inputId);
            if (input.files && input.files[0]) {
                if (input.files[0].size > 5 * 1024 * 1024) {
                    showError(inputId, 'Please upload a file of 2MB max.', `${inputId}-error`);
                    input.value = ''; // Clear the input
                    return false;
                }
                removeError(inputId, `${inputId}-error`);
                return true;
            }
            removeError(inputId, `${inputId}-error`);
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
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Validate name list (for actors and directors)
        function validateNameList(inputId, errorClass) {
            const input = document.getElementById(inputId);
            const value = input.value.trim();
            if (!value) {
                showError(inputId, 'This field is required.', errorClass);
                return false;
            }

            // Split by comma, trim whitespace, and filter out empty strings
            const names = value.split(',')
                .map(name => name.trim())
                .filter(name => name.length > 0);

            if (names.length === 0) {
                showError(inputId, 'Please enter at least one valid name.', errorClass);
                return false;
            }

            // Validate each name to allow Unicode letters, spaces, hyphens, and apostrophes
            const nameRegex = /^[\p{L}\s'-]+$/u; // \p{L} matches any Unicode letter
            for (const name of names) {
                if (!nameRegex.test(name)) {
                    showError(inputId, 'Names can only contain letters, spaces, hyphens, or apostrophes.', errorClass);
                    return false;
                }
                // Optional: Enforce minimum/maximum length for each name
                if (name.length < 1 || name.length > 100) {
                    showError(inputId, 'Each name must be between 1 and 100 characters.', errorClass);
                    return false;
                }
            }

            removeError(inputId, errorClass);
            return names; // Return the array of names
        }

        // Event listeners for file inputs
        document.getElementById('poster_url').addEventListener('change', function() {
            validateFileSize('poster_url');
            readAndPreview(this, 'poster_preview', 'poster_placeholder');
        });

        document.getElementById('thumbnail_url').addEventListener('change', function() {
            validateFileSize('thumbnail_url');
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
        document.getElementById('tvshow-edit-form').addEventListener('submit', function(e) {
            let isValid = true;

            // Validate file sizes
            const posterValid = validateFileSize('poster_url');
            const thumbValid = validateFileSize('thumbnail_url');
            if (!posterValid || !thumbValid) {
                isValid = false;
            }

            // Validate directors
            const directorsNames = validateNameList('directors', 'directors-error');
            if (!directorsNames) {
                isValid = false;
            } else {
                const directorsInput = document.getElementById('directors');
                directorsInput.name = ''; // Disable original input
                directorsNames.forEach((name, index) => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'directors[]';
                    hiddenInput.value = name;
                    this.appendChild(hiddenInput);
                });
            }

            // Validate actors
            const actorsNames = validateNameList('actors', 'actors-error');
            if (!actorsNames) {
                isValid = false;
            } else {
                const actorsInput = document.getElementById('actors');
                actorsInput.name = ''; // Disable original input
                actorsNames.forEach((name, index) => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'actors[]';
                    hiddenInput.value = name;
                    this.appendChild(hiddenInput);
                });
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
