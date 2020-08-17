@extends('layouts.Posts')
@section('title', 'ニュースの編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>投稿編集</h2>
            <form action="{{ action('PostsController@update') }}" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="title" value="{{ $form->title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="image">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                            設定中: {{ $form->image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                </div>

                @php


                @endphp

                <div class="form-group row">
                    <label class="col-md-2" for="tags">

                        @foreach ($tags as $tag)
                        @if ($form->tags->search(function($selectedTag, $key) use ($tag) {
                        return $selectedTag->id == $tag->id;
                        }) !== false)
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" checked>{{ $tag->name }}
                        @else
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
                        @endif
                        @endforeach

                    </label>

                    <div class="col-md-10">
                        <div class="form-text text-info">
                            現在選択中のタグ: @foreach ($form->tags as $tag) {{ $tag->name }} {{"\n"}} @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $form->id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </div>
            </form>
            {{-- 以下を追記--}}
            <div class="row mt-5">
                <div class="col-md-4 mx-auto">
                    <h2>編集履歴</h2>
                    <ul class="list-group">
                        @if ($form->histories != NULL)
                        @foreach ($form->histories as $history)
                        <li class="list-group-item">{{ $history->edited_at }}</li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection