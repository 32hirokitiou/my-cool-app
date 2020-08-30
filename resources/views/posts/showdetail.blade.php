<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.common')
@section('title','POST DETAIL')
@section('contents')
<p class=page-title>POSTDETAIL</p>

@if (Auth::id() != $post->user->id)
<div id="cardlayout-wrap">
    <section class="card-lista">
        <figure class="card-figurea">
            <img src="{{ asset('storage/image/'.$post->image_path)}}"></a>
        </figure>
        <h2 class="card-titlea">{{ \Str::limit($post->title, 100) }}</h2>
        <div class="form-texta text-info">
            @foreach ($post->tags as $tag)
            <a value="{{ $tag->name }}" class="tag-names"><a href="{{ action('TagsController@show', ['tag_id' => $tag->id]) }}">{{ $tag->name }}</a>
                @endforeach
        </div>
        <p class="card-text-tax-detail"><a href="{{ action('UserController@show', ['post' => $post]) }}"> <img src="{{ asset('storage/user/'.$post->user->image_path)}}" method="post" class="thumbnail-showdetail"></p>
        </a>
    </section>

    @else
    <section class="card-lista">

        <figure class="card-figurea"><a href="{{ action('PostsController@edit', ['id' => $post->id]) }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"></a></figure>
        <h2 class="card-titlea">{{ \Str::limit($post->title, 100) }}</h2>

        <div>
            <a href="{{ action('PostsController@edit', ['id' => $post->id]) }}">編集</a>
        </div>
        <div>
            <a href="{{ action('PostsController@delete', ['id' => $post->id]) }}">削除</a>
        </div>
        <div class="tag-text-wrapper"></div>
        @foreach ($post->tags as $tag)
        <a value="{{ $tag->name }}" class="tag-names"><a href="{{ action('TagsController@show', ['tag_id' => $tag->id]) }}">{{ $tag->name }}</a>
            @endforeach
    </section>
</div>
@endif


@endsection