テストひょうじ
投稿作成<br>

<form action='{{ action('MyitemsController@create') }}' method='post'>

        ユーザーID：<input type='text' name='user_id'><br>
        タイトル：<input type='text' name='title'><br>
        内容：<input type='text' name='content'><br>
        写真：
        <input type='submit' value='投稿する'>
        {{ csrf_field() }}
</form>

