@foreach($posts as $post)
<article class="card">
    <img class="card__img" src="{{ asset('storage/image/'.$post->image_path)}}" alt="">
    <div class="card__meta">
        <p class="card__cat">{{ \Str::limit($post->title, 100) }}</p>
        <time class="card__time" datetime="2020-01-09">変数で入れる2020.01.09</time>
    </div>
    <h2 class="card__ttl">３秒で利用可能！効率化UPにつながるオススメのコピペパーツをご紹介します！</h2>
    <p class="card__desc">
        HTMLやCSSの組み合わせでよく使うデザインってありますよね。プログラミングの世界ではDRYという考え方がありますが、HTMLやCSSにも応用...
    </p>
</article>
@endforeach

@foreach($posts as $post)
<article class="card">
    <tr>
        <td class="card__img"><img src="{{ asset('storage/image/'.$post->image_path)}}"> </td>
        <span class="title_favorite">
            <td class="post_title">{{ \Str::limit($post->title, 100) }}</td>
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
            <td class="post_datetime">{{ \Str::limit($post->title, 100) }}</td>
            <td class="user_icon"><a href="{{ action('UserController@show', ['post' => $post]) }}"> <img src="{{ asset('storage/user/'.$post->user->image_path)}}" method="post" class="thumbnail"></td>
        </span>
    </tr>
    @endforeach
</article>