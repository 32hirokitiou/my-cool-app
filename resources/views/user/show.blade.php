<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<title>プロフィール画面</title>
    </head>
    <body>
        <h1>
        <p>名前 {{Auth::user()->name}} </p>
        <p>メールアドレス {{Auth::user()->email}} </p>
        </h1>
    </body>

<a href="{{ action('UserController@index') }}">編集</a> 

</html>
