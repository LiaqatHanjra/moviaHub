@extends('layouts.app')

@section('title', 'Cast & Crew List')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Cast & Crews</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.cast-crews.create') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100">Add Cast</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="castCrewTable" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Designation</th>
                            <th>Date of Birth</th>
                            <th>Place of Birth</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this cast/crew member? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#castCrewTable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                pageLength: 10,

                ajax: '{{ route('admin.cast-crews.index') }}',
                columns: [{
                        data: 'image',
                        name: 'file_url',
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'type',
                        name: 'type',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'designation',
                        name: 'designation',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'dob',
                        name: 'dob'
                    },
                    {
                        data: 'place_of_birth',
                        name: 'place_of_birth',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
            });

            // Handle delete button click
            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                var url = $(this).data('url');
                var name = $(this).data('name');

                // Update modal content with cast/crew name
                $('#deleteModal .modal-body p').html('Are you sure you want to delete <strong>' + name + '</strong>? This action cannot be undone.');

                // Store the delete URL in the confirm button
                $('#confirmDelete').data('url', url);

                // Show the modal
                $('#deleteModal').modal('show');
            });

            // Handle confirm delete button click
            $('#confirmDelete').click(function() {
                var url = $(this).data('url');

                // Create a form and submit it
                var form = $('<form>', {
                    'method': 'POST',
                    'action': url
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
            });
        });
    </script>
@endsection
