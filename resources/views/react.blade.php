<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MovieHub') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('backend/assets/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    
    @vite(['resources/js/frontend.js'])
</head>
<body class="mv-bg-surface-container-lowest mv-font-body-md mv-text-on-surface mv-antialiased min-vh-100 position-relative overflow-x-hidden">
    <div id="app"></div>
</body>
</html>
