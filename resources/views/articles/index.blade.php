@extends('layouts.app')

@section('content')
    <div class="article-container">
        @foreach($articles as $article)
            <div class="article-card">
                <a class="article-img" href="/articles/view/{{$article['id']}}">
                    <span> <img class="img-responsive" src="{{asset('img/img2.jpg')}}" alt="tag"> </span>
                    <div class="article-card-content">
                        <h3>{{$article['title']}}</h3>
                        <p>{{$article['content']}}</p>
                        <p>{{__('app.article_model.address')}}: {{$article['address']}}</p>
                        <p>{{__('app.article_model.attendance')}}: {{$article['attendance']}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
