<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<title>マイアイテム管理一覧ページ</title>
<p>マイアイテム管理一覧ページ</P>
    </head>
    <body>
        <h1>
        <p>アイコン写真</p>
        <p>プロフィール一言{{Auth::user()->user_profile}}</p>
        <p>名前 {{Auth::user()->name}} </p>
        <p>プロフィールコメント{{Auth::user()->user_profile}} </p>
        <p>ここにアイテム一覧を記載するようにする</p>
        （データの紐付けと表示方法を調べる）  
        </h1>
    </body>
   

    <title>マイアイテム管理一覧ページ</title>
    <ul>
　　　  <li>ユーザーが任意の写真をアイコンとしてアップロードできる</li>
       <li>一言プロフィールを追加する</li>
       <li>過去投稿写真の一覧を表示する</li>
       <li></li>
    </ul>
    
    <h1><a href="{{ action('MyitemsController@create', ['id' => $user->id])}}">過去の投稿写真を追加・削除・編集する</a></h1>
    （削除も行えるようにする）

    <h2><a href="{{ action('PostsController@add', ['id' => $user->id])}}">新しく写真を投稿する</a></h2> 
    <土台リンクのみ作成このリンク写真投稿画面に修正する!-- 下記教材のメモ16 投稿したニュースを更新/削除しよう -->
   
</html>
