@extends('layouts.app')

@auth
    @section('app-body')
        <router-view/>
    @endsection
@endauth
