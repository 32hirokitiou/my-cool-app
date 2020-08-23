@extends('layouts.common')
@section('contents')

<div>
    ルーティングの確認
    @foreach($tag->posts as $post)
    <a>{{ $post->id }}</a>
    @endforeach
</div>

@endsection