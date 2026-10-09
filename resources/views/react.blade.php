

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>
    <meta name="description" content="Media Platform"/>
    <link rel="icon" href="{{ env('APP_URL') }}/favicon.png"/>
    <link rel="manifest" href="{{ env('APP_URL') }}/manifest.json"/>
    <title>{{ config('app.name') }}</title>


      <link href="{{asset('backend/assets/img/siteLogo.svg')}}" rel="icon">
  <link href="{{asset('backend/assets/img/siteLogo.svg')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">

  <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="app"></div> <!-- Changed from id="root" to id="app" -->
</body>
</html>
