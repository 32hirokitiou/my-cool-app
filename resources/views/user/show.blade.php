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





@endif
@endsection