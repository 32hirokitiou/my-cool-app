<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>写真の新規作成</h2>
                <form action="{{ action('PostsController@add') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title"><form method="post">
        {{ csrf_field() }}
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
        @endforeach
        <input name="body">
        <button>投稿</button>
    </form>
    </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿する">
                </form>
            </div>
        </div>
    </div>