<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Watch TV Shows Online, Watch Movies Online')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Watch movies & TV shows online or stream right to your smart TV, game console, PC, Mac, mobile, tablet and more.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/mv-fonts.css') }}">
    <!--[ Favicon]-->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/assets/images/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('backend/assets/images/favicon.png') }}">
    <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/flatpickr.min.css') }}">
    <!--[ Template main css file ]-->
    <link href="{{ asset('backend/assets/css/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/moviehub-admin.css') }}">
</head>

<body data-bvite="theme-CeruleanBlue" data-bs-theme="dark" class="layout-border svgstroke-a layout-default moviehub-admin">
    <main class="container-fluid px-0" style="min-height: 100vh">
        @include('layouts.sidebar')
        @include('layouts.header')
        <div class="ps-md-4 pe-md-3 px-2 py-3 page-body">
            @yield('content')
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend/assets/bundles/libscripts.bundle.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backend/assets/bundles/select2.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/flatpickr.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>
