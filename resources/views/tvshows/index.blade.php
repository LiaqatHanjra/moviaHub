@extends('layouts.app')

@section('title', 'List TV Shows')
@section('content')
    <div class="card mb-3">
        <div class="card-body">

            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>TV Shows</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.tvshows.create') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100">Add New TV Show</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="tvshowsTable" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Likes</th>
                            <th>Views</th>
                            <th>Language</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

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
                            Are you sure you want to delete this TV show?
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
        $(document).ready(function () {
            // Prevent any browser confirm dialogs globally
            window.confirm = function(message) {
                return false;
            };

            // Add DataTables error handling
            $.fn.dataTable.ext.errMode = 'none'; // Suppress default error alerts
            $('#tvshowsTable').on('error.dt', function (e, settings, techNote, message) {
                console.error('DataTables error: ', message);
            });

            $('#tvshowsTable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                pageLength: 10,
                ajax: "{{ route('admin.tvshows.index') }}",
                columns: [
                    { data: 'image_name', name: 'name', orderable: false, searchable: true },
                    { data: 'like', name: 'like', orderable: true },
                    { data: 'watch', name: 'watch', orderable: true },
                    { data: 'language', name: 'language' },
                    { data: 'status', name: 'status', orderable: true },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                drawCallback: function() {
                    $('.delete-btn').each(function() {
                    });
                }
            });

            // Delete confirmation with Bootstrap 5 modal
            let deleteUrl = null;

            // Remove any existing click handlers and add new one
            $(document).off('click', '.delete-btn').on('click', '.delete-btn', function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                deleteUrl = $(this).data('url');
                console.log('Delete URL:', deleteUrl);

                const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
                modal.show();
                window._deleteModalInstance = modal;

                return false; // Extra prevention
            });

            $('#confirmDeleteBtn').on('click', function () {
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

            // Handle status toggle for TV shows
            $(document).on('change', '.tvshow-status-toggle', function() {
                var tvshowId = $(this).data('id');
                var state = $(this).is(':checked') ? 1 : 0;
                var checkbox = $(this);
                $.ajax({
                    url: '/admin/tvshows/' + tvshowId + '/toggle-status',
                    type: 'POST',
                    data: {
                        state: state,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                    },
                    error: function(xhr) {
                        checkbox.prop('checked', !state);
                        alert('Failed to update status.');
                    }
                });
            });
        });
    </script>
@endsection
