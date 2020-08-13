@extends('layouts.posts')
@section('title', '登録済みニュースの一覧')

@section('content')
@if (Auth::User()->image_path= NULL)
    @foreach (Auth::User()->image_path as $image_path)
        <li class="list-group-item">{{ $history->edited_at }}</li>
    @endforeach
@endif


{{Auth::User()->has('posts')->get()}}

if文メモ
@if(Auth::User()->has('posts')->get() != NULL)
    @foreach (Auth::User()->has('posts')->get()as $post)
    <p>ユーザーの投稿を全て表示する</p>
    {{$post->image_path}}
    <img src="{{ asset('storage/image/'.$post->image_path)}}"> 
    @endforeach

    <p>投稿がありません。投稿してみましょう！</p>
    @elseif
    <p></p>
    ＠endif
    @endforeach




@if ($news_form->histories != NULL)
    @foreach ($news_form->histories as $history)
        <li class="list-group-item">{{ $history->edited_at }}</li>
    @endforeach
@endif
@endsection