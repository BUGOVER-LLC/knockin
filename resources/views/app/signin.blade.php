@extends('layouts.auth')

@guest
    @section('app-body')
        <router-view code="{{ $code }}" email="{{ $email }}"/>
    @endsection
@endguest
