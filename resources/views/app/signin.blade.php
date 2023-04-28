@extends('layouts.auth')

@guest
    @section('app-body')
        <router-view/>
    @endsection
@endguest
