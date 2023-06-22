@extends('layouts.auth')

@guest
    @section('auth-body')
        <router-view code="{{ $code }}" email="{{ $email }}"/>
    @endsection
@endguest
