@extends('layouts.app')

@section('pageTitle', 'Article CMS')

@section('content')
    <h1 class="page-header">{{ __('app.home_module.cms_title') }}</h1>

    <div class="article-container">
        <table class="article-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td class="text-center">{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td class="text-center">{{$article->created_at}}</td>
                    <td class="text-center">{{$article->updated_at}}</td>
                    <td class="text-center">
                        <a href="/articles/edit/{{$article->id}}/{{$locale}}" class="btn btn-primary">Edit</a>
                        <form action="/articles/delete/{{$article->id}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
