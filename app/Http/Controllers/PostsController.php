<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

//ユーザー情報を受け渡ししている


class PostsController extends Controller
{
    
        public function add()
        {
            return view('posts.create');
        }
      
        // 以下を追記
        public function create(Request $request)
        {
					$this->validate($request, Post::$rules);
					//  varidateのアクションを理解する
					//  Post::$rulesの記述の意味も理解する
					$post = new Post;
					$form = $request->all();
					//$formは画面から飛んできたパラメーターが格納されている配列
					// フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
					if (isset($form['image'])) {
						$path = $request->file('image')->store('public/image');
						//DBにはファイルをそのまま保存しない
						//ファイル名だけ保存している
						$post->image = basename($path);
					} else {
						$post->image = null;
					}
					// フォームから送信されてきた_tokenを削除する
					unset($form['_token']);
					// フォームから送信されてきたimageを削除する
					unset($form['image']);
					//これ消しちゃって良いのか？目的は写真データを保存したい
					// データベースに保存する
					$post->fill($form);
					$post->save();
					// admin/news/createにリダイレクトする
					return redirect('posts/create');
        }
}
