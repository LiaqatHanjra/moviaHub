@extends('layouts.app')

@section('title', 'List Episodes')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Episodes</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.episodes.create') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100">Add Episode</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="episodesTable" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Season</th>
                            <th>TV Show</th>
                            <th>Release Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this episode?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var formToDelete;
            // Intercept delete button click
            $(document).on('click', '.delete-episode-btn', function(e) {
                e.preventDefault();
                formToDelete = $(this).closest('form');
                var modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
                modal.show();
            });
            // Confirm delete in modal
            $('#confirmDeleteBtn').on('click', function() {
                if (formToDelete) {
                    formToDelete.submit();
                }
                var modal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
                modal.hide();
            });

            $('#episodesTable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                pageLength: 10,
                ajax: '{{ route('admin.episodes.index') }}',
                columns: [
                    { data: 'name', name: 'name', orderable: true, searchable: true },
                    { data: 'season', name: 'season', orderable: true, searchable: true },
                    { data: 'tv_show', name: 'tv_show', orderable: false, searchable: true },
                    { data: 'release_date', name: 'release_date', orderable: true, searchable: true },
                    { data: 'status', name: 'status', orderable: false},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // AJAX status toggle for episodes
            $(document).on('change', '.episode-status-toggle', function() {
                var episodeId = $(this).data('id');
                var status = $(this).is(':checked') ? 1 : 0;
                $.ajax({
                    url: '/admin/episodes/' + episodeId + '/toggle-status',
                    method: 'POST',
                    data: {
                        state: status, // Use 'state' to match the controller parameter
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status) {
                            console.log('Status updated successfully');
                            // Optionally update the UI or show a success message
                            toastr.success('Status updated successfully'); // Requires toastr.js
                        } else {
                            alert('Failed to update status');
                            $(this).prop('checked', !status); // Revert checkbox if failed
                        }
                    },
                    error: function() {
                        alert('Error updating status');
                        $(this).prop('checked', !status); // Revert checkbox if error
                    }
                });
            });
        });
    </script>
@endsection
