@extends('layouts.app')

@auth
    @section('app-body')
        <router-view></router-view>
    @endsection
@endauth
