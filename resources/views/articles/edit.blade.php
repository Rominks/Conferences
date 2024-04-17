@extends('layouts.app')

@section('pageTitle', 'Edit Form')

@section('content')
    <div class="form-container">
        <h2>Edit Article</h2>
        <form action="/articles/update/{{$article->id}}" method="POST" id="update-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ optional($article ?? null)->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ optional($article ?? null)->description }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content">{{ optional($article ?? null)->content }}</textarea>
            </div>
            <div class="form-footer">
                <button type="button" id="edit-close-btn" class="btn btn-secondary">Close</button>
                <button type="submit" id="edit-submit-btn" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
