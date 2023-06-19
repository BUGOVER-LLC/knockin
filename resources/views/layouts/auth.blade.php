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
    <link rel="stylesheet" href="{{ mix('builds/auth/css/app.css') }}">

    {{--Client APP Script--}}
    @include('layouts.builds')
    <script defer src="{{ asset('builds/auth/js/app.js') }}"></script>
</head>
<body id="main-content-app-knock">
<div id="app-auth">
    <auth-page>
        <template slot="auth-content">@yield('auth-body')</template>
    </auth-page>
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
