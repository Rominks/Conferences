@extends('layouts.app')

@section('pageTitle', 'Home')

@section('content')
    <h1>{{ __("app.home_module.index_title") }}</h1>
    @if(Cookie::get('USER_COOKIE') !== null)
        <h2>{{ __("app.home_module.welcome", ['name' => Cookie::get('USER_COOKIE')]) }}</h2>
    @else
        <h2>{{ __("app.home_module.welcome", ['name' => 'John']) }}</h2>
    @endif
@endsection
