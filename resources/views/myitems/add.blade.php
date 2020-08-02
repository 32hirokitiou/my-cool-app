テストひょうじ
((-- aa --))


@section('article_add')
    投稿作成<br>

    <form action='{{ route('myitems_create') }}' method='post'>
        {{ csrf_field() }}
        A
            ユーザーID：<input type='text' name='user_id'><br>
            タイトル：<input type='text' name='title'><br>
            内容：<input type='text' name='content'><br>
            <input type='submit' value='投稿'>
    </form>
@endsection --> --))


Auth::id();