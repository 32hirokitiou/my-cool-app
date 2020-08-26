<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.common')
@section('title','新しく写真を投稿したい')
@section('contents')
<p class=page-title>HOME</p>
<div id="cardlayout-wrap">
    @foreach($posts as $post)

    <section class="card-list">
        <a class="card-link">
            <figure class="card-figure"><a href="/posts/{{ $post->id }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"></a></figure>
            <h2 class="card-title">{{ \Str::limit($post->title, 100) }}</h2>
            <h2 class="card-title">
                @if ($auth_user->id != $post->user->id)
                @if ($auth_user->is_favorite($post->id))
                {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
                {!! Form::submit('kieru', ['class' => "button btn btn-warning"]) !!}
                {!! Form::close() !!}
                @else
                {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
                {!! Form::submit('FAVORITE', ['class' => "button btn btn-success"]) !!}
                {!! Form::close() !!}
                @endif
                @endif

            </h2>
            <p class="card-text-tax"><a href="{{ action('UserController@show', ['post' => $post]) }}"> <img src="{{ asset('storage/user/'.$post->user->image_path)}}" method="post" class="thumbnail"></p>
        </a>
    </section>
    @endforeach
</div>
@endsection