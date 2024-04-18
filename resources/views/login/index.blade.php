@extends('layouts.app')

@section('pageTitle', 'Login')

@section('content')
    <div class="form-container">
        <h2>Login</h2>
        <form action="/login/submit" method="POST" id="login-form">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="username-field">Username/Email</label>
                <input type="text" class="form-control" id="username-field" name="username">
            </div>
            <div class="form-group">
                <label for="password-field">Password</label>
                <input type="text" class="form-control" id="password-field" name="password">
            </div>
            <div class="form-footer">
                <button type="button" id="edit-close-btn" class="btn btn-secondary">Close</button>
                <button type="submit" id="edit-submit-btn" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection
