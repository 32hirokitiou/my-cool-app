画像（マイアイテム）アップロード画面

authの確認
<p>名前 {{Auth::user()->name}} </p>
<p>メールアドレス {{Auth::user()->email}} </p>

<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">

    <!-- アップロードした画像。なければ表示しない -->
    @isset ($filename)
    <!-- //変数がセットされているかを調べます。 これは変数が宣言されており、 NULL とは異なる値だということです。 -->
    <div>
        <img src="{{ asset('storage/' . $filename) }}">
    </div>
    @endisset

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-success"> Upload </button>
</form>


