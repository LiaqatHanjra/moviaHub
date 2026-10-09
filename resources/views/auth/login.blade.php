@extends('guest.app')

@section('title', 'Login')

@section('content')

    <!-- start: page menu link -->
    <aside class="px-xl-5 px-4 auth-aside" data-bs-theme="none">
        <img class="login-img" src="{{ asset('backend/assets/images/login-img.png') }}" alt="">
    </aside>

    <!-- start: page body area -->
    <div class="px-xl-5 px-4 auth-body">
        <form action="{{ route('login.post') }}" method="POST">

            @csrf
            <div class="px-xl-5 px-4 auth-header text-center" data-bs-theme="none">
                <a href="/" class="brand-icon text-decoration-none w-100" title="Kwetu Admin Template">
                    <img src="{{ asset('backend/assets/images/site_logo.png') }}" alt="TVKing"
                        class="img-fluid ms-auto me-auto" width="120">
                </a>
            </div>
            <ul class="row g-3 list-unstyled li_animate">
                <li class="col-12 text-center">
                    <h1 class="h2 title-font">Welcome to Destinaytion</h1>

                </li>
                <li class="col-12">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control form-control-lg" placeholder="Enter Email"
                        name="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-12">
                    <div class="form-label">
                        <span class="d-flex justify-content-between align-items-center">
                            Password
                            <a class="text-primary" href="{{ route('password.request') }}">Forgot Password?</a>
                        </span>
                    </div>
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-12">
                    <div class="form-check fs-5">
                        <input class="form-check-input" type="checkbox" value="" id="Rememberme">
                        <label class="form-check-label fs-6" for="Rememberme">Remeber this Device</label>
                    </div>
                </li>
                <li class="col-12 my-lg-4">
                    <button class="btn btn-lg w-100 btn-primary text-uppercase mb-2" type="submit" title="sign in">SIGN
                        IN</button>

                </li>
            </ul>
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
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Logging in...';
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
