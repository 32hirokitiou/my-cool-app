@extends('layouts.app')
@section('title','ユーザー情報')
@section('content')
@if ($user->id == $post->user->id )

<div class="container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th></th>
                <th>ID(削除予定)</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>一言コメント</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div>
                        @if(!empty($post->user->image_path))
                        <img src="{{ asset('storage/user/'.$post->user->image_path)}}" class="thumbnail">
                        @else
                        画像なし
                        @endif
                    </div>
                </td>
                <td>{{ $post->user->id }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->user->email }}</td>
                <td>{{ $post->user->comment }}</td>
                <td><a href="{{ route('user.userEdit') }}" class="btn btn-primary btn-sm">編集</a></td>
            </tr>
        </tbody>
    </table>
</div>

@else

<div class="container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th></th>
                <th>ID(削除予定)</th>
                <th>名前</th>
                <th>一言コメント</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div>
                        @if(!empty($post->user->image_path))
                        <img src="{{ asset('storage/user/'.$post->user->image_path)}}" class="thumbnail">
                        @else
                        画像なし
                        @endif
                    </div>
                </td>
                <td>{{ $post->user->id }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->user->comment }}</td>
            </tr>
        </tbody>
    </table>
</div>


<div class="container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="topWrapper">
        @if(!empty($post->user->image_path))
        <!-- <td><a href="{{ action('PostsController@edit', ['id' => $post->id]) }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"> </td> -->
        <td><a href="{{ action('UserController@userShow', ['id' => $post->id]) }}"><img src="/storage/user/{{ $post->user->image_path }}" class="editThumbnail"></td>
        @else
        画像なし→ここにデフォでuserID1のデフォ画像を表示させる
        @endif
    </div>

    <div class="labelTitle">Name</div>
    <div>
        <td class="userForm">{{ $post->user->name }}</td>
    </div>

    <div class="labelTitle">自己紹介</div>
    @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
    <div>
        <td class="userForm">{{ $post->user->comment }}</td>
        @if($errors->has('comment'))<div class="error">{{ $errors->first('comment') }}</div>@endif
    </div>


    <div class="buttonSet">
        <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">戻る</a>
    </div>

</div>


@endif
@endsection