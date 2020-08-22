<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="example.css">
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    <titlea</title> </head> <body>
        <header class="a">
            <h1 class="headline">
                <p><span class="border-bottom-1">THE AGING</span></p>
            </h1>
            <ul class="nav-list">
                <li class="nav-list-item">
                    <a>HOME</a>
                </li>
                <li class="nav-list-item">POST</li>
                <li class="nav-list-item">MYITEM</li>
                <li class="nav-list-item">FAVORITE</li>
                <li class="nav-list-item">SEARCH</li>
                <li class="nav-list-item">LOGIN/LOGOUT</li>
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