<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('log.png') }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>

    @yield('css')


</head>

<body>
    <div id="app">
        @include('layouts.nav')
        @yield('content')

    </div>

    <script src="{{ asset('js/style.js/nav.js') }}"></script>
    @yield('js')

</body>


</html>
