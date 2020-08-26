@extends('layouts.app')
@section('title','ユーザー情報')
@section('content')
<p class=page-title>HOME</p>
<div class="container">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th></th>
        <th>ID</th>
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
            @if(!empty($authUser->image_path))
            <img src="/storage/user/{{ $authUser->image_path }}" class="thumbnail">
            @else
            画像なし
            @endif
          </div>
        </td>
        <td>{{ $authUser->id }}</td>
        <td>{{ $authUser->name }}</td>
        <td>{{ $authUser->email }}</td>
        <td>{{ $authUser->comment }}</td>
        <td>
          <a href="{{ route('user.userEdit') }}" class="btn btn-primary btn-sm">編集</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection