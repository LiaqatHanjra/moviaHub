@extends('guest.moviehub')

@section('title', 'Reset Password')

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
                <h1 class="mv-font-headline-lg mv-text-on-surface mv-mb-1p5">Choose a new password</h1>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="d-flex flex-column mv-gap-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token ?? request('token') }}">
                @if ($errors->any())
                    <div class="mv-rounded-xl mv-px-4 mv-py-3 mv-font-body-sm" style="background:#5c1a1a;color:#ffd6d6;">{{ $errors->first() }}</div>
                @endif

                <div class="d-flex flex-column mv-gap-1p5 text-start">
                    <label class="mv-font-label-md mv-text-on-surface-variant" for="email">Email</label>
                    <input id="email" name="email" type="email" required
                        value="{{ old('email', $email ?? request('email')) }}"
                        class="mv-w-full mv-h-11 mv-px-4 mv-rounded-xl mv-bg-surface-container mv-text-on-surface">
                </div>
                <div class="d-flex flex-column mv-gap-1p5 text-start">
                    <label class="mv-font-label-md mv-text-on-surface-variant" for="password">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mv-w-full mv-h-11 mv-px-4 mv-rounded-xl mv-bg-surface-container mv-text-on-surface"
                        placeholder="New password">
                </div>
                <div class="d-flex flex-column mv-gap-1p5 text-start">
                    <label class="mv-font-label-md mv-text-on-surface-variant" for="password_confirmation">Confirm password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mv-w-full mv-h-11 mv-px-4 mv-rounded-xl mv-bg-surface-container mv-text-on-surface"
                        placeholder="Confirm password">
                </div>

                <button type="submit"
                    class="mv-w-full mv-h-12 mv-rounded-xl mv-bg-primary-container mv-text-white mv-font-headline-sm">
                    Reset password
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
