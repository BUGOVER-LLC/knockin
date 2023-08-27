@extends('layouts.greeting')

@guest
    @section('app-body')
        <router-view/>
    @endsection
@endguest
