<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'NOIX') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffc107">
    <meta name="secret-value" content="{{ csrf_token() }}">
</head>
<body>
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW336KP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>

<div id="noix-greeting-app" style='height: 100%;'>
    <app-layout>
        <template slot="noix-greeting-content">
            @guest
                <router-view></router-view>
            @endguest
        </template>
    </app-layout>
</div>
</body>
</html>
