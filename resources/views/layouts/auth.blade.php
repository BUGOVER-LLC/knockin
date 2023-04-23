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
    <link rel="stylesheet" href="{{ asset_mix('builds/app/css/app.css') }}">

    {{--Client APP Script--}}
    <script src="{{ asset_mix('builds/vendor/vendor.js') }}"></script>
    <script src="{{ asset_mix('builds/vendor/manifest.js') }}"></script>
    <script defer src="{{ asset_mix('builds/app/js/app.js') }}"></script>
</head>
<body>
<div id="app-knock" style='height: 100%;'>
    <v-app>
        @yield('app-body')
    </v-app>
</div>
</body>
</html>
