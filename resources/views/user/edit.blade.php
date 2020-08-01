編集画面
<p
<p>名前 {{Auth::user()->name}} </p>
<p>メールアドレス {{Auth::user()->email}} </p>

名前を変更する

<html>
<body>
<form action="{{ action('UserController@update') }}" method="post">
名前：<input type="text" value = "{{ $user_form->name }}" name='name'>
メールアドレス：<input type="email"value = "{{ $user_form->email }}" name= 'email'>
<input type="hidden" name="id" value="{{ $user_form->id }}">
{{ csrf_field() }}
<input type="submit" class="btn btn-primary" value="更新">
</form>
</body>
</html>


