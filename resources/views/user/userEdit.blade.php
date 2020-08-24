@extends('layouts.app')
@section('title','ユーザー情報変更')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="topWrapper">
        @if(!empty($authUser->image_path))
        <img src="/storage/user/{{ $authUser->image_path }}" class="editThumbnail">
        @else
        画像なし→ここにデフォでuserID1のデフォ画像を表示させる
        @endif
    </div>


    <form method="post" action="{{ route('user.userUpdate') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="user_id" value="{{ $authUser->id }}">
        @if($errors->has('user_id'))<div class="error">{{ $errors->first('user_id') }}</div>@endif

        <div class="labelTitle">Name</div>
        <div>
            <input type="text" class="userForm" name="name" placeholder="User" value="{{ $authUser->name }}">
            @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
        </div>

        <div class="labelTitle">自己紹介</div>
        <div>
            <input type="text" class="userForm" name="comment" placeholder="User" value="{{ $authUser->comment }}">
            @if($errors->has('comment'))<div class="error">{{ $errors->first('comment') }}</div>@endif
        </div>

        <div class="labelTitle">プロフィール写真を変更する</div>

        <div>
            <input type="file" name="image_path">
        </div>

        <div class="buttonSet">
            <div class="btn btn-primary btn-sm" onclick="history.back()"></a>戻る</div>
            <input type="submit" name="send" value="登録情報を変更する" class="btn btn-primary btn-sm btn-done">
        </div>
    </form>
</div>
@endsection