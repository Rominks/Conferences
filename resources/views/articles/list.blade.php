@extends('layouts.app')

@section('pageTitle', 'Article CMS')

@section('content')
    <h1 class="page-header">{{ __('app.cms_module.cms_title') }}</h1>

    <div class="article-container">
        {{--        <a href="/articles/create/{{$locale}}" class="btn btn-primary create-btn">{{__(('app.create'))}}</a>--}}
        <button type="button" class="btn btn-primary modal-toggle" id="create-article-btn"
                data-modal="#createArticleModal">{{__('app.create_article')}}</button>
        @include('articles.modals.create')
        <table class="article-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{__('app.article_model.title')}}</th>
                <th>{{__('app.article_model.created_at')}}</th>
                <th>{{__(('app.article_model.updated_at'))}}</th>
                <th>{{__(('app.cms_module.actions'))}}</th>
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
                        {{--                        <a href="/articles/edit/{{$article->id}}/{{$locale}}" class="btn btn-primary">{{__(('app.edit'))}}</a>--}}
                        <button type="button" class="btn-edit-article btn btn-primary modal-toggle" id="edit-article-btn"
                                data-modal="#articleModal"
                                data-article-id="{{$article->id}}">{{__('app.edit_article')}}</button>
                        @include('articles.modals.edit')
                        <button type="button" class="btn-delete-article btn btn-danger modal-toggle" id="delete-article-btn"
                                data-modal="#deleteModal"
                                data-delete-article-id="{{$article->id}}">{{__('app.delete')}}</button>
                        @include('articles.modals.delete')
{{--                        <form action="/articles/delete/{{$article->id}}" method="POST" style="display: inline">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger">{{__(('app.delete'))}}</button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
