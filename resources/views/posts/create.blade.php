<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.common')

@section('contents')
<p class=page-title>POST</p>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="{{ action('PostsController@create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="image">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2" for="tags">
                        タグ
                    </label>


                    <label class="col-md-10">
                        <div class="form-text text-info">
                            @foreach ($tags as $tag)

                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}</label>

                            @endforeach
                        </div>
                    </label>


                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿する">

                    <body></body>
            </form>
        </div>
    </div>
</div>
@endsection