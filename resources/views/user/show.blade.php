{{-- user.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@extends('layouts.user')
@section('title', 'ニュースの新規作成')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>このページはユーザープロフィールを表示する</h2>
                <p>名前 {{Auth::user()->name}} </p>
                <p>メールアドレス {{Auth::user()->email}} </p>
                <p>一言 {{Auth::user()->comment}} </p>
                <p><a href="{{ action('UserController@edit') }}">プロフィールを編集する</a> </p>
                <p><a href="{{ action('PostsController@index') }}">写真の一覧画面へ</a> </p>
            </div>
        </div>
    </div>

@endsection


