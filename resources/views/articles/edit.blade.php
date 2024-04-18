@extends('layouts.app')

@section('pageTitle', 'Edit Form')

@section('content')
    <div class="form-container">
        <form action="/articles/update/{{$article->id}}" method="POST" id="article-form">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            @include('articles.partials.form')
        </form>
    </div>
@endsection
