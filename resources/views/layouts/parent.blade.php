<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ロゴ</title>

    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--Font Awesome5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!--自作CSS -->
    <style type="text/css">
        <!--
        /*ここに調整CSS記述*/

        /* Sticky Footer Classes */

        html,
        body {
            height: 100%;
        }

        #page-content {
            flex: 1 0 auto;
        }

        #sticky-footer {
            flex-shrink: none;
        }

        /* Other Classes for Page Styling */

        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }
        -->
    </style>
</head>

<body class="d-flex flex-column">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="http://placehold.it/150x50?text=Logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- / Navigation -->

    <!-- Page Content -->
    <div id="page-content">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h1 class="font-weight-light mt-4 text-white">Bootstrap Startup kit</h1>
                    <p class="lead text-white-50">
                        @yield('comment')
                        このページでは「Bootstrap Snippets」の「Flexbox Sticky Footer」と「Bootstrap4 Navbar with Logo Image」を使って構成しています。<br><br>
                        Laravelの学習の際にデモページとしてお使いください。

                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- / Page Content -->

    <!-- Footer -->
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Your Website</small>
        </div>
    </footer>
    <!-- / Footer -->

</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>