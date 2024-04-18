@extends('layouts.app')

@section('pageTitle', 'Create Article')

@section('content')
    <div class="form-container">
        <h2>{{__('app.create_article')}}</h2>
        <form action="/articles/submit" method="POST" id="article-form">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            @include('articles.partials.form')
        </form>
    </div>
@endsection
