<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Auth') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffc107">
    <meta name="secret-value" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('storage/img/favicon.ico') }}">
    <link
        href="{{ !app()->environment('local') ? asset(mix('../App/builds/css/app.css')) : asset('../App/builds/css/app.css') }}"
        rel="stylesheet">

    <script src="{{ asset('../App/builds/vendor/manifest.js') }}"></script>
    <script src="{{ asset('../App/builds/vendor/vendor.js') }}"></script>
    <script
        src="{{ !app()->environment('local') ? asset(mix('../App/builds/js/app.js')) : asset('../App/builds/js/app.js') }}"
        defer></script>
</head>
<body>
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW336KP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>

<div id="auth-auth" style='height: 100%;'>
    <app-layout>
        <template slot="auth-content">
            @yield('app-content')
        </template>
    </app-layout>
</div>
{{--@includeWhen('local' === config('app.env') && config('app.strict'), 'dev.duplicate_query_marker')--}}
</body>
</html>
