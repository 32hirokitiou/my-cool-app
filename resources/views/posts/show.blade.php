<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.common')
@section('contents')
<p class=page-title>MYITEMS</p>

<div id="cardlayout-wrap">
    @foreach($posts as $post)
    <section class="card-list">
        <a class="card-link">
            <figure class="card-figure"><a href="/posts/{{ $post->id }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"></a></figure>
            <h2 class="card-title">{{ \Str::limit($post->title, 100) }}</h2>
            <div class="form-texta">
                @foreach ($post->tags as $tag) {{ $tag->name }} {{"\n"}} @endforeach
            </div>
            <p class="card-text-tax"><a href="{{ action('UserController@show', ['post' => $post]) }}"> <img src="{{ asset('storage/user/'.$post->user->image_path)}}" method="post" class="thumbnail"></p>
        </a>
    </section>
    @endforeach
</div>

@endsection