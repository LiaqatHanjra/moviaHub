<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Destinaytion Watch movies & TV shows online or stream')</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Watch movies & TV shows online or stream right to your smart TV, game console, PC, Mac, mobile, tablet and more.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[ Favicon]-->
    <link rel="icon" type="image/x-icon" href="{{asset('backend/assets/images/favicon.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/assets/images/favicon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('backend/assets/images/favicon.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/assets/images/favicon.png')}}">
    <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
	<!--[ Template main css file ]-->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
</head>

<body data-bvite="theme-CeruleanBlue" class="layout-border svgstroke-a layout-default auth">
    <main class="container-fluid px-0">
            @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>
