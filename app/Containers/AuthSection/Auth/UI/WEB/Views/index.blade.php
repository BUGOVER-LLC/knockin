@extends('layouts.producer')

@guest
    @section('app-content')
        <router-view :producer="{{ json_encode($producer, JSON_THROW_ON_ERROR) }}"></router-view>
    @endsection
@endguest
