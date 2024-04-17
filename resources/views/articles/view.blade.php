@extends('layouts\app')

@section('content')
    <span class="article-title">{{$article->title}}</span>
    <br>
    <div class="article-content">
        {{$article->content}}
    </div>
@endsection
