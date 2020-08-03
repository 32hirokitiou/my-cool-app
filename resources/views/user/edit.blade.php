編集画面
<p
<p>名前 {{Auth::user()->name}} </p>
<p>メールアドレス {{Auth::user()->email}} </p>

<html>
<body>
<form action="{{ action('UserController@update') }}" method="post">
<p>名前：<input type="text" value = "{{ $user_form->name }}" name='name'></p>
<p>メールアドレス：<input type="email"value = "{{ $user_form->email }}" name= 'email'></p>
<p>プロフィールコメント：<input type="text" value = "{{ $user_form->user_profile }}" name='user_profile'></p>

{{ csrf_field() }}
<input type="submit" class="btn btn-primary" value="更新">
</form>
</body>
</html>


