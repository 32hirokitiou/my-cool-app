<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!--追加-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--追加-->
<html>

<head>
    <!--追加-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: tomato;
        }
    </style>
    <!--追加-->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="example.css">
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    <header>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto ">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('新しくアカウントを作成する方') }}</a>
                <a class="nav-link" href="{{ route('login') }}">{{ __('アカウント登録済みの方') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>

        <h1 class="headline">
            <p><span class="border-bottom-1">THE AGING</span></p>
        </h1>
        <ul class="nav-list">
            <li class="nav-list-item">
                <a href="{{ action('PostsController@index') }}">HOME</a>
            </li>
            <li class="nav-list-item"><a href="{{ action('PostsController@add') }}">POST</a></li>
            <li class="nav-list-item"><a href="{{ action('PostsController@show') }}">MYITEMS</a></li>
            <li class="nav-list-item"><a href="{{ action('UserController@show', ['post' => $post]) }}">PROFILE</a></li>
            <li class="nav-list-item"><a href="{{ action('FavoriteController@index') }}">FAVORITE</a></li>
            <li class="nav-list-item"><a href="{{ action('TagsController@index') }}">SEARCH</a></li>
            </li>
        </ul>
    </header>
</head>

<body>
    <!-- 各ページでタイトルを個別に表示する -->
    @yield('page_title')
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