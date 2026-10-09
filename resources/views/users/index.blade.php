@extends('layouts.app')

@section('title', 'Users List')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Users</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.users.create') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100">Add User</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="usersTable" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Contact Number</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            const table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                pageLength: 10,
                ajax: '{{ route('admin.users.index') }}',
                columns: [
                    { data: 'user', name: 'name', orderable: true, searchable: true },
                    { data: 'contact_number', name: 'phone', orderable: true, searchable: false },
                    { data: 'gender', name: 'gender', orderable: true, searchable: false },
                    { data: 'status', name: 'status', orderable: true, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[0, 'desc']]
            });

            // Handle status toggle
            $(document).on('change', '.users-status-toggle', function() {
                const userId = $(this).data('id');
                const status = $(this).is(':checked') ? 1 : 0;
                $.ajax({
                    url: '/admin/users/' + userId + '/toggle-status',
                    method: 'POST',
                    data: {
                        status: status,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Success', 'Status updated successfully', 'success');
                        } else {
                            Swal.fire('Error', 'Failed to update status', 'error');
                            table.ajax.reload(); // Revert on failure
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Error updating status', 'error');
                        table.ajax.reload(); // Revert on failure
                    }
                });
            });

            // Handle delete button
            $(document).on('click', '.delete-user', function() {
                const userId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ url('admin/users') }}/' + userId,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Deleted!', response.message, 'success').then(() => {
                                        table.ajax.reload();
                                    });
                                } else {
                                    Swal.fire('Error', 'Unexpected response from server', 'error');
                                }
                            },
                            error: function(xhr) {
                                let errorMessage = 'Something went wrong';
                                if (xhr.status === 422) {
                                    const errors = xhr.responseJSON.errors;
                                    errorMessage = Object.values(errors).flat().join('<br>');
                                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
                                }
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    html: errorMessage,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
    <style>
        .dataTable img.rounded-circle {
            vertical-align: middle;
        }
    </style>
@endsection
