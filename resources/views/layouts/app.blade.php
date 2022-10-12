<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body class="">
    <div id="app" style="height: 100vh;">
        @yield('content')
        {{-- <div class="row" style="height: 100vh;">
            <div class="col-md-6" style="background-image: url('https://portal.munipuno.gob.pe/sites/default/files/2022-01/WhatsApp%20Image%202022-01-05%20at%204.08.15%20PM%20%281%29.jpeg');">
                <div class="bg-dark" style="width: 91vh; height: 100vh; object-fit: cover; object-position: 100% 1; opacity: 0.3">asd</div>
            </div>
            <div class="col-md-6 bg-dark">
                @yield('content')
            </div>
        </div> --}}

    </div>
</body>
</html>
