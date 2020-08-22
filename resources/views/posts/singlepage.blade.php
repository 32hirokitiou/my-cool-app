@foreach($posts as $post)
<article class="card">
    <tr>
        <td class="post_image"> 投稿写真 <img src="{{ asset('storage/image/'.$post->image_path)}}"> </td>
        <span class="title_favorite">
            <td class="post_title">タイトル{{ \Str::limit($post->title, 100) }}</td>
            <td class="post_favorite">
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
            </td>
        </span>
        <span class="datetime_user_icon">
            <td class="post_datetime">ここで投稿日時を入れたる予定{{ \Str::limit($post->title, 100) }}</td>
            <td class="user_icon">ユーザーアイコン<a href="{{ action('UserController@show', ['post' => $post]) }}"> <img src="{{ asset('storage/user/'.$post->user->image_path)}}" method="post" class="thumbnail"></td>
        </span>
    </tr>
    @endforeach
</article>


<section class="card-list">
    <a class="card-link" href="#">
        <figure class="card-figure"><img src="/images/demo.png"></figure>
        <h2 class="card-title">カードレイアウト1</h2>
        <p class="card-text-tax">Flexboxとcale()を使ってかんたんにレスポンシブ対応カードレイアウトをつくる手順のご紹介</p>
    </a>
</section>

1.post_image

2.post_title

3.post_favorite

4.post_datetime(未実装あとで追加するなしでよい)

5.use_icon（投稿した本人のアイコン）