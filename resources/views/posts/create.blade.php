@extends('layouts.posts')
@section('title', '新しく写真を投稿する')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>新しく写真を投稿する</h2>
                <form action="{{ action('PostsController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>

                    ※タグ追加欄
                    <div class="form-group row">
                        <label for="tags">
                            タグ
                        </label>
                        <input
                            id="tags"
                            name="tags"
                            class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}"
                            ここ意味がわからなかった
                            value="{{ old('tags') }}"
                            初期値設定（）
                            type="text"
                        >
                        @if ($errors->has('tags'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tags') }}
                                単一レコードを取得
                            </div>
                        @endif
                    </div>



                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection