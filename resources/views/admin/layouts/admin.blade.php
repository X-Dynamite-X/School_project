<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('css')

</head>

<body >

    <div class="admin" id="app">
        <div class=" width-100">

            @include('admin.layouts.nav')
        </div>

        <main class="flex ">
            @include('admin.layouts.sidebar')
            @yield('content_admin')
        </main>
    </div>

    <script src="{{ asset('js/style.js/nav.js') }}"></script>

    @yield('js')

</body>

</html>
