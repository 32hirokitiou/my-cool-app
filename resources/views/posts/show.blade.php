<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.common')
@section('contents')
<div class="create_post">
    <a href="{{ action('PostsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
</div>

<div id="cardlayout-wrap">
    @foreach($posts as $post)
    <section class="card-list">
        <a class="card-link">
            <figure class="card-figure"><a href="/posts/{{ $post->id }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"></figure>
            <h2 class="card-title">{{ \Str::limit($post->title, 100) }}</h2>
        </a>
        <div class="form-text text-info">
            @foreach ($post->tags as $tag) {{ $tag->name }} {{"\n"}} @endforeach
        </div>
    </section>
    @endforeach
</div>

@endsection