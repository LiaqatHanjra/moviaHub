@extends('guest.moviehub')

@section('title', 'Login')

@section('content')
<div
    class="mv-fixed mv-inset-0 pe-none mv-bg-6c2854">
  </div>
  <main class="mv-w-full min-vh-100 mv-relative mv-z-10 d-flex flex-column align-items-center justify-content-center">
    <div
      class="d-flex flex-column mv-w-full mv-relative min-vh-100 align-items-center justify-content-center mv-p-space-md mv-sm-p-space-lg user-select-none overflow-hidden">
      <!-- Ambient Backdrop Poster Mosaic with Deep Cinematic Scrim -->
      <div class="mv-absolute mv-inset-0 pe-none mv-z-0 overflow-hidden mv-opacity-50">
        <div
          class="d-grid mv-grid-cols-3 mv-sm-grid-cols-4 mv-md-grid-cols-6 mv-gap-3 mv-sm-gap-4 mv-nrotate-6 mv-scale-110 mv-ntranslate-y-12 mv-blur-866029 mv-brightness-75">
          <!-- Row of montage cards -->
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Dark dramatic movie poster featuring action hero silhouette in neon rain city streets with electric blue and teal backlight"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHcqpZNuJhb8hJ1Wjhp0R_tMeZwU2Ca-zpkLv-yV709dG_llaGhteRVEHXwsh0VbUdW0L546AhdWl320wv62rmJvAKWqwkxa4-i0LnLnKIr4FYZiCTipgdFje0WPjX_C0Y5vV2qhgUVH1igIzZA_v3eulTkJki7F4tAKT4cGWaTKFv_DrLlStL7qBt4EoZoB2gV_t1I5zx7vZlXvdFJFHJAfAU-XKKq3Q525K2__RbihXucGyNE_ZizA" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Futuristic sci-fi film poster with gigantic space dune landscapes and two warriors in tactical gear under dual suns"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuC8ISqboPkLGFt2rsPbYecWp8TEdiK_ozfoWZ-ltQb5T95Vq0WDGZBMQIMtLOpBYoeRUjCB2lyUt0wH_ljienXT9t2BWFttCOturVDn9sUQC6mFx7q_iozHZHhz4RjJBlTXG5p68-rdVMISlxm9p5fvUXiTYR99lP-Vuii27G0-c-fVyrrVODnV3Sa_drIu8hOId-j5YVV_3bVhKWepl2To76y8gEBa0ti6Rwqi07Do-DEB98DpyJnxFw" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Neo-noir detective thriller movie poster drenched in obsidian shadows, crimson smoke, and cold ambient glow"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgU_K5lTpImH45aAx8Si8nq6yriVpuLjhz2sfGBt8HkpcHbKf3bfqVd-gogdi5yIkS6da9Zf7gAxFf7XsVpjD2YQ--vfqCjw9rIjdKKZa8oy5v5jBgJnyRmCE70yK39KnfuIhLlz6jZfWui7wP8l4vzL6cKXFhKC_RKB713l0W3aCjXBIPExspaI2iDKz8B_Fl7TVloXIxg6e1r1HCT2Rmi3Amk0xmmWuuMyDV0EPrXXTxQJlOz2Viyw" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="High octane street racing poster with sleek dark hypercars drifting through night neon tunnels with light streaks"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxAarBNvdWomeF0QUN9-79XquS9ZbUuN5k_Pp0Z_LwZ6Wg5Ez-TSTJKEhpp5je0f4UZjIeKjWp8dRW6od3YyofkZy2FbZXAxBieF29GqoBj0RUwgAbWtRRToROqhi0hUPkykFm1lqce9nlIPVBO1Tr8VAqY1Svmhxadkhp6XoRT2T6XOSWt-sP6_A-CZmLaY5640oyAdUhJ61qDG6tcY9S3nG_OjIRP78syJ7yqZQGKUPLor7C_o5dVg" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Intense psychological drama poster with split cinematic character portrait bathed in fiery amber and deep ocean blues"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWYGuynUpltjagh9FS5qERz6t-aJGnRat7uBnsOzLplU7IyvWA-G63cgVUazLq8JMfhK414XHM0R4Gd2ljRI3ATRiXuZF6KXPpb6murmk8d46bQi0u5KkoLKBnh5PYvdlRh_tyA-x1uPCmnbwF9McfOekTx9Ii0gCMx8TgCn0Fooph1CZW75Z4qEoppRTnk3a6dubqZ7NnYGX89WIV5PORRUaEngjkdtRSufgolHW4Cgo5-vNy8o9kvA" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Cyberpunk underworld thriller poster with hooded operative glancing over shoulder into illuminated futuristic alleyway"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuCxSm1O9mIngg6cPtUgDsOF0K3s_sve03IFyH22ajSqoclUkbLFB11S7YNzLlw1TNEpCwaoOQrb9-ZxodRWqM-T6x4voESu2SSljiuBvX3MYvYmn5Nv0fCQyFvaxPzitwuDSWhdYi7CYvD-IyLxUfuOrmIWbSHnvITEosPoLyf7HJCSl0EFrKUJsrfdTTqUOdhOSWtBHY_Zw5oW5_dJU6N8rHadolbnisMp6SVHzVjaWa6lRYA_tZYjDA" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Action franchise poster showing suited hitman aiming handgun with bokeh city lights and shattered stained glass background"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuAT8dzi70LgcunO8Y1cfsmvxolF6CYzPDRbJyZU-3pItlUPJtWcgS0Sp-IjZ-9Pw3oGIY8ATzwdwVIXBPxfha1uxSHzk5QkYLIhtV81S74a5zPD8LK4G5QK-lU8pndJrJV7amEUjVzdsga73ZyINH9pMKFq5kRkobM3uHC7lD-5kxiQcwipYRDGDjqqzhJFVlaRpPlLEYvTXdsKV7E42guipEQrmjGvP30czWBO7iy6s3afTj8vO4kOjQ" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Epic medieval fantasy film poster with crowned warrior staring at monolithic ruined citadel under storm lightning"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeYyRoPIjSX4d7XemJQV28w9Wcoez39M4U5qNa6U0S4fMX-6jWudxi42M6ZE6FQOb0NyJGHyVGxv7XyKKA1GQQW6AzX190HsV56mZIfWxpWbyUVIxXpGqVrl8CWZ8k1fUtRVh1MpkmAGMZByoTRQk71kX_3Uk73gAArQtkjMVONAa4DyqPgAxF4_lsqXBAjwckz65BaYzb1FgtgDZd7By0nxOgv5Q_onm0YkA-O42h68YwdY4SRvePlA" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Modern supernatural horror poster with misty forest and lone mysterious cabin glowing with electric luminescence"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjgnath6tKYfwq3sIDvCVFAIQoZJYArFnrr1Xos47weH_89txVQkdyQB2pbqTuTlwb4ospbiMbYrxEG1FmgQAX4Xde6KxMdhFp2vjU9G7s_5MBGbV3kjrY-gFseko_8O5yWhqciSE_QrdkViykdBtMoLQjoErqfx15q9JbsuEuW8OOnF620KRnUejbGwbgSvxEUzzmEZpjrZxmc19qYNqd-pBkqm-IZIxIqk98-RH4p9Hb4T18HN4yuw" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Interstellar space exploration movie poster with astronaut floating towards an iridescent glowing black hole accretion disk"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyly1zNqUSfYsLd_hX9CO4TB4I9XTBLSu25ilFQr1ArkHCuhYUjIKjFY-ENu2wooDkvbIzS1-dbKap1IEnVXnyYnaQazVsUufEB7UCrAKzcu1veNfAmJCIwLFtjHQlT-qnMljS_GYVh8Vucr4xMVX5OtJPnvpgWzA6rnvNIhIi-o5cQ4tyYbD6_MMX35VIJFFS_79FEAqI16rK6j-0cA9FWdTlhumFffoC9C8gnjy3BFQJxA8WnfTToA" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="High stakes military heist film poster with helicopters silhouette flying over desert canyon during twilight"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJNJ1Nv3a6IeGeUc0oDU4xsfCV3IuRFTUCl7ZOIkYLCdN5h6JHK1HuYEMEW6g_8FPTt8uRh_zlsu8Ze0yWEsZsrlo9tUHt9mjIl8lpjl6kr5oOIAPljHDhI2VE-1s4QwnE3EHbGVH63i9svHqgb-E0CLCP9IHyij0d2ynSBvfs98D477vCDMrnUZzkXg-L9egRaJ5tXdHh3_obSE6O-tIsXuH_E6frgSroM0C4k4r_Mb2hTpBgPfgR6w" />
          </div>
          <div class="mv-h-64 mv-rounded-lg mv-bg-surface-container overflow-hidden mv-shadow-2xl">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Martial arts action film poster with duelists engaged in mid-air combat above neon lit pagoda rooftops"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3jXONKwrfS7t2lucvvwV-O9n4WONvgI6BIwVqsat-0Ff4haTopoJortSBFH6Tgz6KWgWkPp-GHYPsyjyxRyQDtiy59rPIp158UMFfosVeMjD93ilU-OtJ-T6T9IRzTCaX_P4qPcqpACjSGIElfIoGfL8poWkJaqfHThK9Ql0LTXhPxC-yMOGYeckaZ-Qs9rIaR5KsvZyqWdoYaSTj3hrR0Yysc67aU5zoxiRCPzgq5y32iE9BuQhALA" />
          </div>
        </div>
      </div>
      <!-- Radial Vignette Scrim Layers for Cinematic Depth -->
      <div class="mv-absolute mv-inset-0 pe-none mv-z-a8738c mv-bg-surface-container-lowest_50 mv-backdrop-blur-sm"></div>
      <div
        class="mv-absolute mv-inset-0 pe-none mv-z-a8738c mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_35 mv-to-transparent">
      </div>
      <div
        class="mv-absolute mv-ntop-32 start-50 mv-ntranslate-x-1_2 mv-w-96 mv-h-96 mv-bg-primary-container_20 mv-rounded-full mv-blur-b98468 pe-none mv-z-a8738c">
      </div>
      <!-- Central Authentication Card (Screen #3 Specification) -->
      <div class="mv-relative mv-z-10 mv-w-full mv-max-w-fc97af my-auto">
        <div
          class="mv-relative mv-rounded-2xl mv-bg-surface-container-low_95 mv-p-6 mv-sm-p-9 mv-shadow-2xl mv-shadow-surface-container-lowest_90 mv-backdrop-blur-2xl mv-transition-all mv-duration-300">
          <!-- Top Brand Header -->
          <div class="d-flex flex-column align-items-center text-center mv-mb-7">
            <div class="d-flex align-items-center mv-gap-2 mb-3 mv-group mv-cursor-pointer">
              <div
                class="mv-w-10 mv-h-10 mv-rounded-xl overflow-hidden mv-shadow-lg mv-shadow-primary-container_30 d-flex align-items-center justify-content-center mv-bg-surface-container">
                <a href="/browse">
                  <div class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center mv-shadow-da2bcf mv-group-hover-scale-105 mv-transition-transform">
            <span class="material-symbols-outlined mv-text-c28550">play_arrow</span></div>
              </div>
              <span class="mv-font-headline-md mv-text-headline-md mv-tracking-tight mv-text-on-surface">
                Movie<span class="mv-text-primary mv-font-headline-xl-mobile mv-sm-font-headline-xl">Hub</span>
              </span>
              </a>
            </div>
            <h1 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-mb-1p5 mv-tracking-tight">
              Welcome Back
            </h1>
            <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
              Login to your account
            </p>
          </div>
          <!-- Login Form Formwork -->
          <form class="d-flex flex-column mv-gap-4" id="loginForm">
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

            <!-- Email / Mobile Input Field -->
            <div class="d-flex flex-column mv-gap-1p5 text-start">
              <label class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-pl-0p5" for="emailInput">
                Email / Mobile
              </label>
              <div
                class="mv-relative d-flex align-items-center mv-rounded-xl mv-bg-surface-container mv-transition-all mv-duration-200 mv-focus-within-bg-surface-container-high mv-focus-within-shadow-c733a0">
                <div class="mv-absolute mv-left-3p5 d-flex align-items-center pe-none mv-text-outline">
                  <span class="material-symbols-outlined mv-text-5e43e3">mail</span>
                </div>
                <input autocomplete="username"
                  class="mv-w-full mv-h-11 mv-pl-10 mv-pr-3p5 mv-bg-transparent mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline-variant mv-placeholder-font-body-sm mv-focus-outline-none"
                  id="emailInput" name="email" value="{{ old('email') }}" placeholder="Enter your email or mobile number" required="" type="text" />
              </div>
            </div>
            <!-- Password Input Field -->
            <div class="d-flex flex-column mv-gap-1p5 text-start">
              <label class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-pl-0p5" for="passwordInput">
                Password
              </label>
              <div
                class="mv-relative d-flex align-items-center mv-rounded-xl mv-bg-surface-container mv-transition-all mv-duration-200 mv-focus-within-bg-surface-container-high mv-focus-within-shadow-c733a0">
                <div class="mv-absolute mv-left-3p5 d-flex align-items-center pe-none mv-text-outline">
                  <span class="material-symbols-outlined mv-text-5e43e3">lock</span>
                </div>
                <input autocomplete="current-password"
                  class="mv-w-full mv-h-11 mv-pl-10 mv-pr-11 mv-bg-transparent mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline-variant mv-placeholder-font-body-sm mv-focus-outline-none"
                  id="passwordInput" name="password" placeholder="Enter your password" required="" type="password" />
                <button aria-label="Toggle password visibility"
                  class="mv-absolute mv-right-3p5 d-flex align-items-center justify-content-center mv-text-outline mv-hover-text-on-surface mv-transition-colors mv-focus-outline-none"
                  id="togglePasswordBtn" type="button">
                  <span class="material-symbols-outlined mv-text-5e43e3" id="pwdEyeIcon">visibility</span>
                </button>
              </div>
            </div>
            <!-- Options: Remember Me & Forgot Password -->
            <div class="d-flex align-items-center justify-content-between mv-pt-0p5 mv-pb-1">
              <label class="d-flex align-items-center mv-gap-2 mv-cursor-pointer user-select-none mv-group">
                <div class="mv-relative d-flex align-items-center">
                  <input class="mv-peer visually-hidden" id="rememberMe" name="remember" value="1" type="checkbox" />
                  <div
                    class="mv-w-4 mv-h-4 mv-rounded mv-bg-surface-container mv-peer-checked-bg-primary-container mv-peer-focus-visible-ring-2 mv-peer-focus-visible-ring-primary mv-transition-all d-flex align-items-center justify-content-center">
                    <span
                      class="material-symbols-outlined mv-text-0ddd99 mv-opacity-0 mv-peer-checked-opacity-100 mv-transition-opacity mv-font-bold">check</span>
                  </div>
                </div>
                <span
                  class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-group-hover-text-on-surface mv-transition-colors">
                  Remember Me
                </span>
              </label>
              <a class="mv-font-label-md mv-text-label-md mv-text-primary mv-hover-text-secondary-fixed mv-transition-colors mv-underline-offset-4 mv-hover-underline"
                href="{{ route('password.request') }}">
                Forgot Password?
              </a>
            </div>
            <!-- Primary Action Button -->
            <button
              class="mv-relative overflow-hidden mv-w-full mv-h-12 mt-1 mv-rounded-xl mv-bg-primary-container mv-text-white mv-font-headline-sm mv-text-headline-sm d-flex align-items-center justify-content-center mv-gap-2 mv-transition-all mv-duration-300 mv-shadow-82143f mv-hover-shadow-929235 mv-hover-brightness-110 mv-active-scale-443bba"
              id="loginSubmitBtn" type="submit">

              <span class="mv-font-headline-sm mv-text-headline-sm mv-text-white" id="btnText">Login</span>
              <span class="d-none material-symbols-outlined mv-text-27bd7e mv-animate-spin"
                id="btnSpinner">progress_activity</span>
            </button>
          </form>
          <!-- Switch to Register Link -->
          <div class="text-center mv-mt-7 mv-pt-4">
            <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
              Don't have an account?
              <a class="mv-font-label-lg mv-text-label-lg mv-text-primary mv-hover-text-secondary-fixed mv-transition-colors ms-1 mv-font-semibold mv-underline-offset-4 mv-hover-underline"
                href="/register">
                Register
              </a>
            </p>
          </div>
        </div>
        <!-- Quick Footer Badges / Trust Markers -->
        <div class="d-flex align-items-center justify-content-center mv-gap-6 mt-4 mv-text-outline mv-font-label-sm mv-text-label-sm">
          <div class="d-flex align-items-center mv-gap-1p5">
            <span class="material-symbols-outlined mv-text-58f475 mv-text-tertiary">verified_user</span>
            <span>Secure Stream TVOD</span>
          </div>
          <div class="mv-w-1 mv-h-1 mv-rounded-full mv-bg-surface-variant"></div>
          <div class="d-flex align-items-center mv-gap-1p5">
            <span class="material-symbols-outlined mv-text-58f475 mv-text-primary">hd</span>
            <span>Ultra 4K Atmos</span>
          </div>
          <div class="mv-w-1 mv-h-1 mv-rounded-full mv-bg-surface-variant"></div>
          <div class="d-flex align-items-center mv-gap-1p5">
            <span class="material-symbols-outlined mv-text-58f475">bolt</span>
            <span>Instant Access</span>
          </div>
        </div>
      </div>
      
    </div>
  </main>

<script>
document.getElementById('togglePasswordBtn')?.addEventListener('click', function () {
    const pwd = document.getElementById('passwordInput');
    const icon = document.getElementById('pwdEyeIcon');
    if (!pwd || !icon) return;
    const show = pwd.type === 'password';
    pwd.type = show ? 'text' : 'password';
    icon.textContent = show ? 'visibility_off' : 'visibility';
});

const loginForm = document.getElementById('loginForm');
loginForm?.addEventListener('submit', async function (event) {
    event.preventDefault();
    const button = document.getElementById('loginSubmitBtn');
    const alertBox = document.getElementById('formAlert');
    if (alertBox) alertBox.remove();

    const showMessage = (message, ok) => {
        const box = document.createElement('div');
        box.id = 'formAlert';
        box.className = 'mv-w-full mv-rounded-xl mv-px-4 mv-py-3 mv-mb-3 mv-font-body-sm';
        box.style.background = ok ? '#0a3d2e' : '#5c1a1a';
        box.style.color = ok ? '#b7f7dc' : '#ffd6d6';
        box.textContent = message;
        loginForm.prepend(box);
    };

    if (button) button.disabled = true;
    try {
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            credentials: 'same-origin',
            body: JSON.stringify({
                email: document.getElementById('emailInput').value,
                password: document.getElementById('passwordInput').value,
                remember: document.getElementById('rememberMe')?.checked ? 1 : 0,
            }),
        });
        const data = await response.json();
        if (!response.ok) {
            const firstError = data.errors ? Object.values(data.errors)[0][0] : null;
            showMessage(firstError || data.message || 'Login failed.', false);
            return;
        }

        const user = data.data && (data.data.api_token || data.data.email) ? data.data : data;
        if (user.api_token) {
            localStorage.setItem('token', 'Bearer ' + user.api_token);
        }
        if (user.name) localStorage.setItem('userName', user.name);
        const isAdmin = Number(user.admin) === 1;
        localStorage.setItem('admin', isAdmin ? 'true' : 'false');

        if (isAdmin) {
            const webLogin = document.createElement('form');
            webLogin.method = 'POST';
            webLogin.action = @json(route('login.post'));
            const fields = {
                _token: document.querySelector('meta[name="csrf-token"]')?.content || '',
                email: document.getElementById('emailInput').value,
                password: document.getElementById('passwordInput').value,
            };
            if (document.getElementById('rememberMe')?.checked) {
                fields.remember = '1';
            }
            Object.entries(fields).forEach(([name, value]) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = value;
                webLogin.appendChild(input);
            });
            document.body.appendChild(webLogin);
            webLogin.submit();
            return;
        }

        const next = new URLSearchParams(window.location.search).get('next');
        const safeNext = next && next.startsWith('/') && !next.startsWith('//') ? next : '';
        const landing = @json(route('frontend.home'));
        window.location.href = (!safeNext || safeNext === '/' || safeNext === '/browse') ? landing : safeNext;
    } catch (error) {
        showMessage('Unable to reach the login service.', false);
    } finally {
        if (button) button.disabled = false;
    }
});
</script>

@endsection
