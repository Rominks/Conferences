@extends('layouts.app')

@section('pageTitle', 'Edit Form')

@section('content')
    <div class="form-container">
        <h2>Edit Article</h2>
        <form action="/articles/submit" method="POST" id="update-form">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            <div class="form-footer">
                <button type="button" id="edit-close-btn" class="btn btn-secondary">Close</button>
                <button type="submit" id="edit-submit-btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
