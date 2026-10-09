@extends('layouts.app')

@section('title', 'List Seasons')
@section('content')
    <div class="card mb-3">
        <div class="card-body">

            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Seasons</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.seasons.create') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100">Add Season</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="seasonsTable" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                <thead>
                    <tr>
                        <th>Season</th>
                        <th>TV Show</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this season?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Prevent any browser confirm dialogs globally
            window.confirm = function(message) {
                console.log('Browser confirm prevented:', message);
                return false;
            };

            // Delete confirmation with Bootstrap 5 modal
            let deleteUrl = null;

            // Remove any existing click handlers and add new one
            $(document).off('click', '.delete-season-btn').on('click', '.delete-season-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                console.log('Delete button clicked, preventing default behavior');

                deleteUrl = $(this).data('url');
                console.log('Delete URL:', deleteUrl);

                const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
                modal.show();
                window._deleteModalInstance = modal;

                return false; // Extra prevention
            });

            $('#confirmDeleteBtn').on('click', function() {
                if (deleteUrl) {
                    // Create a form dynamically and submit it
                    const form = $('<form>', {
                        'method': 'POST',
                        'action': deleteUrl
                    });

                    // Add CSRF token
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': '{{ csrf_token() }}'
                    }));

                    // Add method field for DELETE
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': '_method',
                        'value': 'DELETE'
                    }));

                    // Append form to body and submit
                    $('body').append(form);
                    form.submit();

                    // Hide modal
                    if (window._deleteModalInstance) {
                        window._deleteModalInstance.hide();
                        window._deleteModalInstance = null;
                    }

                    // Reset deleteUrl
                    deleteUrl = null;
                }
            });

            $('#seasonsTable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                pageLength: 10,
                ajax: '{{ route('admin.seasons.index') }}',
                columns: [
                    {
                        data: 'season',
                        name: 'season',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'tv_show',
                        name: 'tv_show',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                drawCallback: function() {
                    // Ensure delete buttons are properly configured after each draw
                    console.log('DataTable drawn, checking delete buttons');
                    $('.delete-season-btn').each(function() {
                        console.log('Delete button found:', $(this).data('url'));
                    });
                }
            });

            // AJAX status toggle
            $(document).on('change', '.season-status-toggle', function() {
                var seasonId = $(this).data('id');
                var status = $(this).is(':checked') ? 1 : 0;
                $.ajax({
                    url: '/admin/seasons/' + seasonId + '/toggle-status',
                    method: 'POST',
                    data: {
                        status: status,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Optionally show a success message
                        } else {
                            alert('Failed to update status');
                        }
                    },
                    error: function() {
                        alert('Error updating status');
                    }
                });
            });
        });
    </script>
@endsection
