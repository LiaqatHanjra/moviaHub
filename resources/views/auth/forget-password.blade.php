@extends('guest.moviehub')

@section('title', 'Forgot Password')

@section('content')
<main class="min-vh-100 d-flex align-items-center justify-content-center mv-p-space-md">
    <div class="mv-w-full mv-max-w-fc97af">
        <div class="mv-rounded-2xl mv-bg-surface-container-low mv-p-6 mv-sm-p-9 mv-shadow-2xl">
            <div class="d-flex flex-column align-items-center text-center mv-mb-7">
                <a href="{{ route('login') }}" class="d-flex align-items-center mv-gap-2 mb-3 text-decoration-none">
                    <span class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center">
                        <span class="material-symbols-outlined">play_arrow</span>
                    </span>
                    <span class="mv-font-headline-md mv-text-on-surface">Movie<span class="mv-text-primary">Hub</span></span>
                </a>
                <h1 class="mv-font-headline-lg mv-text-on-surface mv-mb-1p5">Reset Password</h1>
                <p class="mv-font-body-md mv-text-on-surface-variant">Enter your email and we will send a reset link.</p>
            </div>

            <form id="forgotForm" class="d-flex flex-column mv-gap-4">
                <div id="formAlert"></div>

                <div class="d-flex flex-column mv-gap-1p5 text-start">
                    <label class="mv-font-label-md mv-text-on-surface-variant" for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        class="mv-w-full mv-h-11 mv-px-4 mv-rounded-xl mv-bg-surface-container mv-text-on-surface"
                        placeholder="Enter your email">
                </div>

                <button type="submit"
                    class="mv-w-full mv-h-12 mv-rounded-xl mv-bg-primary-container mv-text-white mv-font-headline-sm">
                    Send reset link
                </button>
            </form>

            <p class="text-center mv-mt-7 mv-font-body-sm mv-text-on-surface-variant">
                Remembered it?
                <a class="mv-text-primary mv-font-semibold" href="{{ route('login') }}">Login</a>
            </p>
        </div>
    </div>
</main>
<script>
document.getElementById('forgotForm')?.addEventListener('submit', async function (event) {
    event.preventDefault();
    const box = document.getElementById('formAlert');
    const button = event.currentTarget.querySelector('button[type="submit"]');
    if (button) button.disabled = true;
    try {
        const response = await fetch('/api/forgot-password', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            credentials: 'same-origin',
            body: JSON.stringify({ email: document.getElementById('email').value }),
        });
        const data = await response.json();
        box.textContent = data.message || (response.ok ? 'Reset link sent.' : 'Unable to send reset link.');
        box.style.background = response.ok ? '#0a3d2e' : '#5c1a1a';
        box.style.color = response.ok ? '#b7f7dc' : '#ffd6d6';
        box.className = 'mv-rounded-xl mv-px-4 mv-py-3 mv-font-body-sm';
    } catch (error) {
        box.textContent = 'Unable to reach the password service.';
        box.style.background = '#5c1a1a';
        box.style.color = '#ffd6d6';
    } finally {
        if (button) button.disabled = false;
    }
});
</script>
@endsection
