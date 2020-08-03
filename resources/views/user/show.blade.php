<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<title>マイページ</title>
<p>マイページ画面です</P>
    </head>
    <body>
        <h1>
        <p>名前 {{Auth::user()->name}} </p>
        <p>メールアドレス {{Auth::user()->email}} </p>
        </h1>
    </body>

<a href="{{ action('UserController@edit', ['id' => $user->id])}}">編集</a> 
<-- 下記教材のメモ16 投稿したニュースを更新/削除しよう -->

<p><a href="{{ action('MyitemsController@show', ['id' => $user->id])}}">画像の一覧画面へ</a><p>
これでマイアイテム一覧ページに飛ぶ



</html>
