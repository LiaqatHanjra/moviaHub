@extends('layouts.app')

@section('title', 'List Movies')
@section('content')
    <div class="card mb-3">
        <div class="card-body">

            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Movies</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.movies.create') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100">Add New Movie</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="moviesTable" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th class="text-dark-emphasis bg-light-subtle "
                                style="    border-top-left-radius: 5px;border-bottom-left-radius: 5px;"></th>
                            <th class="text-dark-emphasis bg-light-subtle ">Like</th>
                            <th class="text-dark-emphasis bg-light-subtle ">Watch</th>
                            <th class="text-dark-emphasis bg-light-subtle ">Language</th>
                            <th class="text-dark-emphasis bg-light-subtle ">Status</th>
                            <th class="text-dark-emphasis bg-light-subtle "
                                style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;width:120px;
                                ">
                                Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
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
                    Are you sure you want to delete this movie?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#moviesTable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                pageLength: 10,
                ajax: "{{ route('admin.movies.index') }}",
                columns: [{
                        data: 'image_name',
                        name: 'name',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'like',
                        name: 'like',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'watch',
                        name: 'watch',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'language',
                        name: 'language',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                drawCallback: function() {
                    $('.delete-btn').each(function() {
                    });
                }
            });

            // Prevent any browser confirm dialogs globally
            window.confirm = function(message) {
                return false;
            };

            // Delete confirmation with Bootstrap 5 modal
            let deleteUrl = null;
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                deleteUrl = $(this).data('url');
                const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
                modal.show();
                window._deleteModalInstance = modal;
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

            // Status toggle with AJAX
            $(document).on('change', '.movie-status-toggle', function() {
                var movieId = $(this).data('id');
                var checkbox = $(this);
                var isChecked = checkbox.is(':checked') ? 1 : 0;

                $.ajax({
                    url: '/admin/movies/' + movieId + '/toggle-status',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        state: isChecked
                    },
                    success: function(response) {
                    },
                    error: function(xhr, status, error) {
                        checkbox.prop('checked', !checkbox.prop('checked'));
                        alert('Failed to update status. Please try again.');
                    }
                });
            });
        });
    </script>
@endsection
