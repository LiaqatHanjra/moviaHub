@extends('guest.app')

@section('title', 'Register')

@section('content')

    <!-- start: project logo -->


    <!-- start: page menu link -->
    <aside class="px-xl-5 px-4 auth-aside" data-bs-theme="none">
        <img class="login-img" src="{{ asset('backend/assets/images/login-img.png') }}" alt="">
    </aside>

    <!-- start: page body area -->
    <div class="px-xl-5 px-4 auth-body d-flex justify-content-center align-items-center flex-column">

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="px-xl-5 px-4 auth-header text-center" data-bs-theme="none">
                <a href="index-2.html" class="brand-icon text-decoration-none w-100" title="Kwetu Admin Template">
                   <img src="{{ asset('backend/assets/images/site_logo.png') }}" alt="Kwetu" class="img-fluid ms-auto me-auto" width="120">
                </a>
            </div>
            <ul class="row g-3 list-unstyled li_animate">
                <li class="col-12 text-center">
                    <h1 class="h2 title-font">Welcome to Destinaytion</h1>
                </li>
                <li class="col-6">
                    <label class="form-label">Full name</label>
                    <input type="text" class="form-control form-control-lg" placeholder="First Name" name="first_name">
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-6">
                    <label class="form-label">&nbsp;</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Last Name" name="last_name">
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-12">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control form-control-lg" placeholder="Enter email" name="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control form-control-lg" placeholder="Enter Password" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-6">
                    <label class="form-label">Confirm password</label>
                    <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="password_confirmation">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="TermsConditions">
                        <label class="form-check-label" for="TermsConditions">
                            I accept the <a href="#" title="" class="text-primary">Terms and Conditions</a>
                        </label>
                    </div>
                </li>
                <li class="col-12 my-4">
                    <button class="btn btn-lg w-100 btn-primary text-uppercase mb-2" type="submit" title="">SIGN UP</button>

                </li>
                <li class="col-12">
                    <span class="text-muted d-flex d-sm-inline-flex mt-3 mt-sm-0">Already have an account? <a class="ms-2" href="{{ route('login') }}">Sign in here</a></span>
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
