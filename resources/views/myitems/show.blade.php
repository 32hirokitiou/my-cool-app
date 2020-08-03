<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<title>マイアイテム一覧ページ</title>
<p>マイアイテム一覧ページです</P>
    </head>
    <body>
        <h1>
        <p>名前 {{Auth::user()->name}} </p>
        <p>メールアドレス {{Auth::user()->email}} </p>
        <p>ここにアイテム一覧を記載するようにする
        データの紐付けと表示方法を調べる
        </p>
        </h1>
    </body>
    
    
    <h1><a href="{{ action('MyitemsController@create', ['id' => $user->id])}}">過去の写真を編集する</a> </h1>
    <h2><a href="{{ action('MyitemsController@create', ['id' => $user->id])}}">新しく写真を投稿する</a></h2> 
    <土台リンクのみ作成このリンク写真投稿画面に修正する!-- 下記教材のメモ16 投稿したニュースを更新/削除しよう -->

</html>
