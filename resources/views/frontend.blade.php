<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MovieHub') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('backend/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('moviehub-bootstrap/assets/mv-fonts.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('moviehub-bootstrap/assets/mv-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('moviehub-bootstrap/assets/custom-styles.css') }}?v=3">
    <link rel="stylesheet" href="{{ asset('moviehub-bootstrap/assets/mv-utilities.css') }}">
    @vite(['resources/js/frontend.js'])
</head>
<body class="mv-bg-surface-container-lowest mv-font-body-md mv-text-on-surface mv-antialiased">
    <div id="app"></div>
</body>
</html>
