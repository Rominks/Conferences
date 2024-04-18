@extends('layouts\app')

@section('content')
    <div class="article-content">
        <div class="article-box">
            <h1>{{$article->title}}</h1>
            <p>{{$article->content}}</p>
            <p>{{__('app.article_model.address')}}: {{$article->address}}</p>
            <p>{{__('app.article_model.attendance')}}: {{$article->attendance}}</p>
            <p>{{$article->datetime}}</p>
        </div>
    </div>
@endsection
