<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<head>

    <header class="a">
        <h1 class="headline">
            <p><span class="border-bottom-1">THE AGaaaING</span></p>
            <p> @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                @else
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest

        </h1>

        <p>
            <!-- Scripts -->
            {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
            <script src="{{ asset('js/app.js') }}" defer></script>

            <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        </p>
    </header>
</head>



<ul class="nav-list">
    <li class="nav-list-item">
        <a>HOME</a>
    </li>
    <li class="nav-list-item"><a href="{{ action('PostsController@add') }}">POST</a></li>
    <li class="nav-list-item"><a href="{{ action('PostsController@show') }}">MYITEMS</a></li>
    <li class="nav-list-item"><a href="{{ action('FavoriteController@index') }}">FAVORITE</a></li>
    <li class="nav-list-item"><a href="{{ action('TagsController@index') }}">SEARCH</a></li>
</ul>
</header>
@yield('contents')
<footer>
    <ul class="footer-menu">
        <li>home ｜</li>
        <li>about ｜</li>
        <li>service ｜</li>
        <li>Contact Us</li>
    </ul>
    <p>© All rights reserved by webcampnavi.</p>
</footer>
</body>

</html>