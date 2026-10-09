@extends('layouts.app')

@section('title', 'Banners')

@section('content')
    <div class="card mb-3">
        <div class="card-body">

            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Banners</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.site.banners.create') }}" class="btn btn-primary">Add New Banner</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="banners-table" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#banners-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.site.banners') }}',
                columns: [
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'type', name: 'type' },
                    { data: 'type_name', name: 'type_name' },
                    { data: 'status', name: 'status', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                drawCallback: function() {
                    $('.banner-status-toggle').on('change', function() {
                        let bannerId = $(this).data('id');
                        let status = $(this).is(':checked') ? 1 : 0;
                        $.ajax({
                            url: '{{ route('admin.site.banners.update-status') }}',
                            type: 'POST',
                            data: {
                                id: bannerId,
                                status: status,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                alert('Status updated successfully.');
                            },
                            error: function() {
                                alert('Failed to update status.');
                            }
                        });
                    });

                    $('.delete-banner-btn').on('click', function(e) {
                        e.preventDefault(); // Prevent default form submission
                        if (confirm('Are you sure you want to delete this banner?')) {
                            let form = $(this).closest('form');
                            $.ajax({
                                url: form.attr('action'),
                                data: form.serialize(),
                                success: function(response) {
                                    $('#banners-table').DataTable().ajax.reload();
                                    alert(response.message || 'Banner deleted successfully.');
                                },
                                error: function(xhr) {
                                    alert('Failed to delete banner. ' + (xhr.responseJSON?.message || ''));
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
