@extends('guest.app')

@section('title', 'Register')

@section('content')
    <aside class="px-xl-5 px-4 auth-aside" data-bs-theme="none">
        <img class="login-img" src="{{ asset('backend/assets/images/login-img.png') }}" alt="">
    </aside>

    <!-- start: page body area -->
    <div class="px-xl-5 px-4 auth-body d-flex justify-content-center align-items-center flex-column">

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token ?? request('token') }}">
            <div class="px-xl-5 px-4 auth-header text-center" data-bs-theme="none">
                <a href="index-2.html" class="brand-icon text-decoration-none w-100" title="Kwetu Admin Template">
                   <img src="{{ asset('backend/assets/images/site_logo.png') }}" alt="Kwetu" class="img-fluid ms-auto me-auto" width="120">
                </a>
            </div>
            <ul class="row g-3 list-unstyled li_animate">
                <li class="col-12 text-center">
                    <h1 class="h2 title-font">Welcome to Destinaytion</h1>
                </li>
                <li class="col-12">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control form-control-lg" value="{{ old('email', $email ?? request('email')) }}" name="email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-12">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control form-control-lg" placeholder="Enter Password" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-12">
                    <label class="form-label">Confirm password</label>
                    <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="password_confirmation">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>

                <li class="col-12 my-4">
                    <button class="btn btn-lg w-100 btn-primary text-uppercase mb-2" type="submit" title="">Reset Password</button>

                </li>
                <li class="col-12">
                    <span class="text-muted d-flex d-sm-inline-flex"><a class="ms-2"
                            href="{{ route('login') }}" title="">Back to Sign in</a></span>
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
