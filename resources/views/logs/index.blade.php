@extends('layouts.app')

@section('title', 'Users List')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Logs</h3>
            </div>
            <div class="mb-3">
                <button id="btnAdminLogs" type="button" class="btn btn-outline-primary btn-sm me-2">Admin Log</button>
                <button id="btnUserLogs" type="button" class="btn btn-outline-primary btn-sm">Users Log</button>
            </div>
            <div class="dataTables_wrapper dt-bootstrap5 no-footer mt-4">
                <table id="usersTable" class="table dataTable table-hover mb-0 w-100 nowrap no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Login At</th>
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
            let currentLogType = 'all';

            const table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                pageLength: 10,
                ajax: {
                    url: '{{ route('admin.logs') }}',
                    data: function(d) {
                        d.log_type = currentLogType;
                    }
                },
                columns: [
                    { data: 'user', name: 'username', orderable: true, searchable: true },
                    { data: 'email', name: 'email', orderable: true, searchable: true },
                    { data: 'login_at', name: 'login_at', orderable: true, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[0, 'desc']]
            });

            function setLogType(type) {
                if (currentLogType === type) {
                    return;
                }

                currentLogType = type;

                $('#btnAdminLogs, #btnUserLogs').removeClass('btn-primary').addClass('btn-outline-primary');

                if (type === 'admin') {
                    $('#btnAdminLogs').removeClass('btn-outline-primary').addClass('btn-primary');
                } else if (type === 'users') {
                    $('#btnUserLogs').removeClass('btn-outline-primary').addClass('btn-primary');
                }

                table.ajax.reload();
            }

            $('#btnAdminLogs').on('click', function() {
                setLogType('admin');
            });

            $('#btnUserLogs').on('click', function() {
                setLogType('users');
            });
        });
    </script>
    <style>
        .dataTable img.rounded-circle {
            vertical-align: middle;
        }
    </style>
@endsection
