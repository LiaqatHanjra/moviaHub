@extends('layouts.app')

@section('title', 'List Genres')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Genres</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.genres.create') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100">Add New Genre</a>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="genresTable" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
$(document).ready(function() {
    $('#genresTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: true,
        pageLength: 10,
        ajax: "{{ route('admin.genres.index') }}",
        columns: [
            { data: 'image', name: 'image', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'description', name: 'description' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    $(document).on('change', '.movie-status-toggle', function() {
        var genreId = $(this).data('id');
        var checkbox = $(this);
        var isChecked = checkbox.is(':checked') ? 1 : 0;

        $.ajax({
            url: '/admin/genres/' + genreId + '/toggle-status',
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

    // Delete confirmation
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this genre?')) {
            $(this).closest('form').submit();
        }
    });
});
</script>
@endsection
