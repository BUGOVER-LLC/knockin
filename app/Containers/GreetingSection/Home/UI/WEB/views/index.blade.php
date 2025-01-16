@extends('greeting-section@home::home-layout')

@section('noix-home')
    <header id="header" class="header d-flex align-items-center fixed-top">
        @include('greeting-section@home::components.header')
    </header>

    <main class="main">
        @yield('main-content')
    </main>

    <footer id="footer" class="footer position-relative light-background">
        @include('greeting-section@home::components.footer')
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
@endsection
