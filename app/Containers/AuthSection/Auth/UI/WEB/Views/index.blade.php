@extends('authSection@auth::app')

@guest
    @section('app-content')
        <router-view></router-view>
    @endsection
@endguest
