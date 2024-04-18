@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h2>Login</h2>
        <form action="/login/submit" method="POST" id="login-form">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="username-field">{{__('Username/Email')}}</label>
                <input type="text" class="form-control" id="username-field" name="username">
            </div>
            @error('username')
                <p>{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="password-field">{{__('Password')}}</label>
                <input type="text" class="form-control" id="password-field" name="password">
            </div>
            @error('password')
                <p>{{$message}}</p>
            @enderror
            <div class="form-check">
                <label class="form-check-label" for="remember-check">{{ __('Remember Me') }}</label>
                <input class="form-check-input" type="checkbox" name="remember" id="remember-check" {{ old('remember') ? 'checked' : '' }}>
            </div>
            <div class="form-footer">
                <button type="button" id="login-close-btn" class="btn btn-secondary">{{__('Close')}}</button>
                <button type="submit" id="login-submit-btn" class="btn btn-primary">{{__('Login')}}</button>
            </div>
        </form>
    </div>
@endsection
