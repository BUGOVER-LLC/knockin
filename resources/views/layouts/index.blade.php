<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--CLient App Style--}}
    <link rel="stylesheet" href="{{ mix('builds/app/css/app.css') }}">

    {{--Client APP Script--}}
    <script src="{{ asset('builds/vendor/manifest.js') }}"></script>
    <script src="{{ asset('builds/vendor/vendor.js') }}"></script>
    <script defer src="{{ asset('builds/app/js/app.js') }}"></script>
</head>
<body id="main-content-app-knock q-app">
<div id="index-knock" style='height: 100%;'>
    <v-app>
        @yield('index-body')
    </v-app>
</div>

<script>
    document.addEventListener('mousedown', function (event) {
        if (event.detail > 1) {
            event.preventDefault()
        }
    }, false)
</script>
</body>
</html>
