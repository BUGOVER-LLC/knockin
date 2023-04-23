@extends('layouts.app')

<script>
    document.addEventListener('mousedown', function (event) {
        if (event.detail > 1) {
            event.preventDefault()
        }
    }, false)
</script>

@section('app-body')
    <router-view></router-view>
@endsection
