<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MovieHub') - MovieHub</title>
    <link rel="icon" type="image/png" href="{{ asset('backend/assets/images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/mv-fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mv-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/custom-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mv-utilities.css') }}">
</head>
<body class="mv-bg-surface-container-lowest mv-font-body-md mv-text-on-surface mv-antialiased min-vh-100">
    @yield('content')
</body>
</html>
