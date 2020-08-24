<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="example.css">
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    <header>
        <h1 class="headline">
            <p><span class="border-bottom-1">THE AGING</span></p>
        </h1>
        <ul class="nav-list">
            <li class="nav-list-item">
                <a>HOME</a>
            </li>
            <li class="nav-list-item"><a href="{{ action('PostsController@add') }}">POST</a></li>
            <li class="nav-list-item"><a href="{{ action('PostsController@show') }}">MYITEMS</a></li>
            <li class="nav-list-item"><a href="{{ action('FavoriteController@index') }}">FAVORITE</a></li>
            <li class="nav-list-item"><a href="{{ action('TagsController@index') }}">SEARCH</a></li>
            <li class="nav-list-item">
                @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                @else
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                </div>
            </li>
            @endguest

            </li>
        </ul>
    </header>
</head>

<body>
    @yield('contents')
</body>

<footer>
    <ul class="footer-menu">
        <li>home ｜</li>
        <li>about ｜</li>
        <li>service ｜</li>
        <li>Contact Us</li>
    </ul>
    <p>© All rights reserved by webcampnavi.</p>
</footer>


</html>