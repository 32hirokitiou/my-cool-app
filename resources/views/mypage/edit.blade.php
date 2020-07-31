
<p>ユーザーのプロフィール更新画面</p>
<h1>{{Auth::user()->name}}</h1>
<h2>{{Auth::user()->email}}</h2>
<form action="{{ action('UserController@update') }}" method="post" enctype="multipart/form-data">
@if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>