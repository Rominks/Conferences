<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <title>@yield('pageTitle')</title>
</head>
<body>
    <div class="articles-nav-bar">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="locale-drop-down">
            <select id="locale-selection">
                <option value="en" {{ session('locale') === 'en' ? 'selected' : '' }}>English</option>
                <option value="lt" {{ session('locale') === 'lt' ? 'selected' : '' }}>Lietuviškai</option>
            </select>
        </div>
        <a href="/articles/{{App::getLocale()}}" class="btn btn-primary" id="nav-home">{{__('app.nav_bar.home')}}</a>
        @if(auth()->check())
            <a href="/articles/list/{{App::getLocale()}}" class="btn btn-primary" id="cms-btn">{{__('app.nav_bar.cms')}}</a>
        @endif

        @if(auth()->check())
            <form action="/logout" method="post" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-primary" id="logout-btn">{{__('app.nav_bar.logout')}}</button>
            </form>
        @else
            <a href="/login/{{session('locale')}}" class="btn btn-primary" id="login-btn">{{__('app.nav_bar.login')}}</a>
        @endif
    </div>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
