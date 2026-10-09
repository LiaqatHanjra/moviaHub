@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

    <!-- start: page body area -->
    <div class="px-xl-5 px-4 auth-body d-flex justify-content-center align-items-center flex-column">

        <form action="{{ route('admin.password.change.store') }}" method="POST">
            @csrf
            <ul class="row g-3 list-unstyled li_animate">
                <li class="col-12 text-center">
                    <h1 class="h2 title-font">Change Password</h1>
                </li>
                <li class="col-12">
                    <label class="form-label">Old Password</label>
                    <input type="password" class="form-control form-control-lg" name="old_password" required>
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-12">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control form-control-lg" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-12">
                    <label class="form-label">Confirm password</label>
                    <input type="password" class="form-control form-control-lg" name="password_confirmation">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>

                <li class="col-12 my-4">
                    <button class="btn btn-lg w-100 btn-primary text-uppercase mb-2" type="submit" title="">Change Password</button>

                </li>
                <li class="col-12">
                    <span class="text-muted d-flex d-sm-inline-flex"><a class="ms-2"
                            href="{{ route('admin.dashboard.index') }}" title="">Back to Dashboard</a></span>
                </li>
            </ul><!--[ ul.row end ]-->
        </form>
    </div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('.needs-validation');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');

        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Creating Account...';
        submitBtn.disabled = true;
    });

    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script>
@endsection
