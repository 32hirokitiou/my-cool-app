<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.common')
@section('contents')
<p class=page-title>POSTDETAIL</p>

@if (Auth::id() != $post->user->id)

<section class="card-lista">

    <figure class="card-figurea"><a href="{{ action('PostsController@edit', ['id' => $post->id]) }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"></figure>
    <h2 class="card-titlea">{{ \Str::limit($post->title, 100) }}</h2>
    <div>
        <a href="{{ action('PostsController@edit', ['id' => $post->id]) }}">編集できない</a>
    </div>
    <div>
        <a href="{{ action('PostsController@delete', ['id' => $post->id]) }}">削除できません</a>
    </div>
    <div class="form-text text-info">
        現在選択中のタグ: @foreach ($post->tags as $tag) {{ $tag->name }} {{"\n"}} @endforeach
    </div>
</section>
</div>

@else
<section class="card-lista">

    <figure class="card-figurea"><a href="{{ action('PostsController@edit', ['id' => $post->id]) }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"></figure>
    <h2 class="card-titlea">{{ \Str::limit($post->title, 100) }}</h2>
    <div>
        <a href="{{ action('PostsController@edit', ['id' => $post->id]) }}">編集</a>
    </div>
    <div>
        <a href="{{ action('PostsController@delete', ['id' => $post->id]) }}">削除</a>
    </div>
    <div class="form-text text-info">
        現在選択中のタグ: @foreach ($post->tags as $tag) {{ $tag->name }} {{"\n"}} @endforeach
    </div>
</section>
</div>

@endif
@endsection