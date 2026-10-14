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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&amp;display=swap"
      rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
      rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
      rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
      rel="stylesheet" />
      <link rel="stylesheet" href="{{ asset('assets/mv-fonts.css') }}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
      <link rel="stylesheet" href="{{ asset('assets/mv-theme.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/custom-styles.css') }}?v=5">
      <link rel="stylesheet" href="{{ asset('assets/mv-utilities.css') }}">
    @vite(['resources/js/frontend.js'])
</head>
<body class="mv-bg-surface-container-lowest mv-font-body-md mv-text-on-surface mv-antialiased">
    <div id="app"></div>
</body>
</html>
