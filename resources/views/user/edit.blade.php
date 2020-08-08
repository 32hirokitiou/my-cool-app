{{-- layouts/user.blade.phpを読み込む --}}
@extends('layouts.user')

{{-- user.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成')
※編集一覧あとで改造する


{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成</h2>
            </div>
        </div>
    </div>
@endsection


編集画面
<p
<p>名前 {{Auth::user()->name}} </p>
<p>メールアドレス {{Auth::user()->email}} </p>

<html>
<body>
<form action="{{ action('UserController@update') }}" method="post">
<p>名前：<input type="text" value = "{{ $user_form->name }}" name='name'></p>
<p>メールアドレス：<input type="email"value = "{{ $user_form->email }}" name= 'email'></p>
<p>プロフィールコメント：<input type="text" value = "{{ $user_form->comment }}" name='comment'></p>

{{ csrf_field() }}
<input type="submit" class="btn btn-primary" value="更新">
</form>
</body>
</html>


