@extends('guest.moviehub')

@section('title', 'Register')

@section('content')
<div class="mv-fixed mv-inset-0 pe-none mv-bg-6c2854"></div><main class="mv-w-full min-vh-100 mv-relative mv-z-10 d-flex flex-column align-items-center justify-content-center"><div class="d-flex flex-column mv-w-full min-vh-100 mv-relative align-items-center justify-content-center mv-p-4 mv-sm-p-6 mv-lg-p-8">
<!-- Dynamic Cinematic Dark Backdrop with Vignette -->
<div class="mv-absolute mv-inset-0 overflow-hidden pe-none mv-z-0">
<div class="mv-w-full h-100 mv-bg-cover mv-bg-center mv-opacity-60 mv-scale-105 mv-blur-sm" data-alt="A cinematic action movie poster with a hero silhouetted in a neon-lit city at night" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBHcqpZNuJhb8hJ1Wjhp0R_tMeZwU2Ca-zpkLv-yV709dG_llaGhteRVEHXwsh0VbUdW0L546AhdWl320wv62rmJvAKWqwkxa4-i0LnLnKIr4FYZiCTipgdFje0WPjX_C0Y5vV2qhgUVH1igIzZA_v3eulTkJki7F4tAKT4cGWaTKFv_DrLlStL7qBt4EoZoB2gV_t1I5zx7vZlXvdFJFHJAfAU-XKKq3Q525K2__RbihXucGyNE_ZizA')">
</div>
<!-- Dual Gradient Vignette for pure cinematic submersion -->
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_45 mv-to-surface-container-lowest_30"></div>
<div class="mv-absolute mv-inset-0 mv-bg-a007b0"></div>
</div>
<!-- Registration Glass Card -->
<div class="mv-relative mv-z-10 mv-w-full mv-max-w-835d18 mv-bg-surface-container-low_95 mv-backdrop-blur-xl mv-rounded-xl mv-shadow-2xl mv-p-6 mv-sm-p-8 mv-md-p-10 d-flex flex-column align-items-center">
<!-- MovieHub Branding Badge -->
<div class="d-flex align-items-center mv-gap-space-sm mb-3">
  <a href="/browse" class="d-flex align-items-center mv-gap-2p5">
   <div class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center mv-shadow-da2bcf mv-group-hover-scale-105 mv-transition-transform">
            <span class="material-symbols-outlined mv-text-c28550">play_arrow</span></div>
<span class="mv-font-headline-md mv-text-headline-md mv-tracking-tight mv-text-on-surface d-flex align-items-center mv-font-bold">
        Movie<span class="mv-text-primary-container">Hub</span>
</span>
  </a>

</div>
<!-- Title and Value Proposition -->
<div class="text-center mb-4">
<h1 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-semibold mv-tracking-tight">Create your account</h1>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Start streaming blockbusters in 4K HDR</p>
</div>
<!-- Registration Form -->
<form class="mv-w-full d-flex flex-column mv-gap-4" id="registerForm" method="POST" action="{{ route('register.post') }}">
@csrf
@if (session('success'))
<div class="mv-w-full mv-rounded-xl mv-px-4 mv-py-3 mv-mb-3 mv-font-body-sm" style="background:#0a3d2e;color:#b7f7dc;">{{ session('success') }}</div>
@endif
@if (session('status'))
<div class="mv-w-full mv-rounded-xl mv-px-4 mv-py-3 mv-mb-3 mv-font-body-sm" style="background:#0a3d2e;color:#b7f7dc;">{{ session('status') }}</div>
@endif
@if ($errors->any())
<div class="mv-w-full mv-rounded-xl mv-px-4 mv-py-3 mv-mb-3 mv-font-body-sm" style="background:#5c1a1a;color:#ffd6d6;">{{ $errors->first() }}</div>
@endif

<!-- Field: Full Name -->
<div class="d-flex flex-column mv-gap-1p5">
<label class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-on-surface-variant d-flex align-items-center mv-gap-1" for="fullName">
          Full Name
        </label>
<div class="mv-relative d-flex align-items-center">
<span class="material-symbols-outlined mv-absolute mv-left-3p5 mv-text-outline mv-text-27bd7e pe-none">
            person
          </span>
<input class="mv-w-full mv-h-11 mv-pl-11 mv-pr-4 mv-bg-surface-container mv-rounded-lg mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline-variant mv-focus-outline-none mv-focus-bg-surface-variant mv-transition-all mv-shadow-inner" id="fullName" name="name" value="{{ old('name') }}" placeholder="Enter your name" required="" type="text"/>
</div>
</div>
<!-- Field: Email / Mobile -->
<div class="d-flex flex-column mv-gap-1p5">
<label class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-on-surface-variant d-flex align-items-center mv-gap-1" for="identifier">
          Email / Mobile Number
        </label>
<div class="mv-relative d-flex align-items-center">
<span class="material-symbols-outlined mv-absolute mv-left-3p5 mv-text-outline mv-text-27bd7e pe-none">
            mail
          </span>
<input class="mv-w-full mv-h-11 mv-pl-11 mv-pr-4 mv-bg-surface-container mv-rounded-lg mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline-variant mv-focus-outline-none mv-focus-bg-surface-variant mv-transition-all mv-shadow-inner" id="identifier" name="email" value="{{ old('email') }}" placeholder="Enter your email or mobile number" required="" type="email"/>
</div>
</div>
<!-- Field: Password -->
<div class="d-flex flex-column mv-gap-1p5">
<label class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-on-surface-variant d-flex align-items-center justify-content-between" for="password">
<span>Password</span>
<span class="mv-text-tertiary mv-font-label-sm mv-text-label-sm text-lowercase mv-opacity-90">min. 8 chars</span>
</label>
<div class="mv-relative d-flex align-items-center">
<span class="material-symbols-outlined mv-absolute mv-left-3p5 mv-text-outline mv-text-27bd7e pe-none">
            lock
          </span>
<input class="mv-w-full mv-h-11 mv-pl-11 mv-pr-11 mv-bg-surface-container mv-rounded-lg mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline-variant mv-focus-outline-none mv-focus-bg-surface-variant mv-transition-all mv-shadow-inner" id="password" name="password" placeholder="Create a password" required="" type="password"/>
<button class="mv-absolute mv-right-3 mv-text-outline mv-hover-text-on-surface mv-transition-colors mv-p-1 d-flex align-items-center justify-content-center" id="togglePassBtn" onclick="const p = document.getElementById('password'); const icon = document.getElementById('passIcon'); if(p.type === 'password'){ p.type = 'text'; icon.textContent = 'visibility'; } else { p.type = 'password'; icon.textContent = 'visibility_off'; }" type="button">
<span class="material-symbols-outlined mv-text-c79a76" id="passIcon">visibility_off</span>
</button>
</div>
</div>
<!-- Field: Confirm Password -->
<div class="d-flex flex-column mv-gap-1p5">
<label class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-on-surface-variant" for="confirmPassword">
          Confirm Password
        </label>
<div class="mv-relative d-flex align-items-center">
<span class="material-symbols-outlined mv-absolute mv-left-3p5 mv-text-outline mv-text-27bd7e pe-none">
            verified_user
          </span>
<input class="mv-w-full mv-h-11 mv-pl-11 mv-pr-11 mv-bg-surface-container mv-rounded-lg mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline-variant mv-focus-outline-none mv-focus-bg-surface-variant mv-transition-all mv-shadow-inner" id="confirmPassword" name="password_confirmation" placeholder="Confirm your password" required="" type="password"/>
<button class="mv-absolute mv-right-3 mv-text-outline mv-hover-text-on-surface mv-transition-colors mv-p-1 d-flex align-items-center justify-content-center" id="toggleConfirmPassBtn" onclick="const p = document.getElementById('confirmPassword'); const icon = document.getElementById('confirmPassIcon'); if(p.type === 'password'){ p.type = 'text'; icon.textContent = 'visibility'; } else { p.type = 'password'; icon.textContent = 'visibility_off'; }" type="button">
<span class="material-symbols-outlined mv-text-c79a76" id="confirmPassIcon">visibility_off</span>
</button>
</div>
</div>
<!-- Terms & Conditions Consent -->
<label class="d-flex align-items-start mv-gap-2p5 mt-1 mv-cursor-pointer user-select-none mv-group">
<input checked="" class="mt-1 mv-h-4 mv-w-4 mv-rounded mv-bg-surface-container mv-text-primary-container mv-focus-ring-0 mv-focus-outline-none mv-accent-primary-container mv-cursor-pointer" id="termsCheckbox" required="" type="checkbox"/>
<span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-group-hover-text-on-surface mv-transition-colors mv-leading-snug">
          I agree to the <a class="mv-text-primary mv-hover-underline" href="/browse#legal">Terms of Service</a>, <a class="mv-text-primary mv-hover-underline" href="/browse#legal">Content Licensing Policy</a> and <a class="mv-text-primary mv-hover-underline" href="/browse#legal">Privacy Statement</a>.
        </span>
</label>
<!-- Primary Action CTA -->
<button class="mv-mt-3 mv-w-full mv-h-12 mv-rounded-full mv-bg-gradient-to-r mv-from-primary-container mv-via-primary-container mv-to-secondary-container mv-text-white mv-font-label-lg mv-text-label-lg d-flex align-items-center justify-content-center mv-gap-2 mv-shadow-lg mv-shadow-primary-container_25 mv-hover-shadow-primary-container_40 mv-active-scale-e06373 mv-transition-all mv-duration-200" id="submitBtn" type="submit">
<span>Register</span>
<span class="material-symbols-outlined mv-text-c79a76">arrow_forward</span>
</button>
</form>
<!-- Social / Secondary Sign-Up Options Separator -->
<div class="mv-relative mv-w-full my-4 d-flex align-items-center justify-content-center">
<div class="mv-absolute mv-inset-0 d-flex align-items-center">
<div class="mv-w-full mv-bg-surface-variant mv-h-0e2379"></div>
</div>
<span class="mv-relative mv-bg-surface-container-low mv-px-3 mv-font-label-sm mv-text-label-sm mv-text-outline text-uppercase mv-tracking-wider">
        Instant Access
      </span>
</div>
<!-- Quick Sign-Up Pills -->
<div class="d-grid mv-grid-cols-2 mv-gap-3 mv-w-full mb-4">
<button class="mv-h-10 mv-px-3 mv-bg-surface-container mv-hover-bg-surface-variant mv-text-on-surface mv-font-label-md mv-text-label-md mv-rounded-lg d-flex align-items-center justify-content-center mv-gap-2 mv-transition-colors" type="button">
<svg class="mv-w-4 mv-h-4 mv-fill-current mv-text-primary" viewbox="0 0 24 24">
<path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.761H12.545z"></path>
</svg>
<span>Google</span>
</button>
<button class="mv-h-10 mv-px-3 mv-bg-surface-container mv-hover-bg-surface-variant mv-text-on-surface mv-font-label-md mv-text-label-md mv-rounded-lg d-flex align-items-center justify-content-center mv-gap-2 mv-transition-colors" type="button">
<svg class="mv-w-4 mv-h-4 mv-fill-current mv-text-on-surface" viewbox="0 0 24 24">
<path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.61-.75 1.04-1.8 1.01-2.87-.96.04-2.16.65-2.84 1.44-.54.62-1.01 1.68-.88 2.71 1.07.08 2.1-.53 2.71-1.28z"></path>
</svg>
<span>Apple ID</span>
</button>
</div>
<!-- Footer Prompt -->
<div class="text-center">
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
        Already have an account? 
        <a class="mv-text-primary mv-font-semibold mv-hover-text-secondary mv-hover-underline mv-transition-colors ms-1" href="/login">
          Login
        </a>
</p>
</div>
<!-- Security & Quality Trust Badges -->
<div class="mv-mt-8 mv-pt-4 mv-w-full d-flex align-items-center justify-content-center mv-gap-4 mv-text-on-surface-variant_60">
<div class="d-flex align-items-center mv-gap-1p5 mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider">
<span class="material-symbols-outlined mv-text-58f475 mv-text-tertiary">lock</span>
<span>256-bit Encrypted</span>
</div>
<div class="mv-w-1 mv-h-1 mv-rounded-full mv-bg-outline-variant"></div>
<div class="d-flex align-items-center mv-gap-1p5 mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider">
<span class="material-symbols-outlined mv-text-58f475 mv-text-primary">hd</span>
<span>Ultra HD Stream</span>
</div>
</div>
</div>
<!-- Interactive script to handle submission microinteraction feedback -->

</div></main>
@endsection
