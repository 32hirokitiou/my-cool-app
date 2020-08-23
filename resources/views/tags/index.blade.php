@extends('layouts.common')
@section('contents')

<div class="form-text text-info">
    @foreach ($tags as $tag)

    <label>
        <div class="tags_name" value="{{ $tag->name }}"> <a href="{{ action('TagsController@show', ['tag_id' => $tag->id]) }}">{{ $tag->name }}</div>
        <form action="{{ action('TagsController@show') }}" method="get" enctype="multipart/form-data">
            <div class="tags_name" value="{{ $tag->name }}"> <a href="{{ action('TagsController@show', ['posts' => $tag]) }}">{{ $tag->name }}</div>
        </form>
    </label>
    @endforeach


</div>
@endsection