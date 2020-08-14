<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\User;
use App\Post;
use App\History;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

//ユーザー情報を受け渡ししている
class PostsController extends Controller {
    
	public function show(Request $request) {
		$posts = Auth::user()->posts;
		return view('posts.show', ['posts' => $posts]);
	}


	public function showDetail($id) {
		$post = Post::find($id);

		if (is_null($post)) {
			\Session::flash('err_msg','データがありません。');
			return redirect('posts/show');
		}
		return view('posts.showdetail', ['post' => $post]);
	}
	
	//テスト用
	public function test(Request $request) {
		$title = $request->title;
		if ($title != '') {
			// 検索されたら検索結果を取得する
			//画像も表示したい
			$posts = Post::where('title', $title)->get();
		} else {
		// それ以外はすべてのニュースを取得する
		$posts = Post::all();
		}
		$user = User::all();
	return view('posts.test', ['posts' => $posts, 'title' => $title, 'user' => $user] );
	}	

	// 以下を追記
	public function create(Request $request) {
		$this->validate($request, Post::$rules);

		//  varidateのアクションを理解する
		//  Post::$rulesの記述の意味も理解する
		$post = new Post;
		$form = $request->all();
		// $formは画面から飛んできたパラメーターが格納されている配列
		// フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
		if (isset($form['image'])) {
			$path = $request->file('image')->store('public/image');
			//DBにはファイルをそのまま保存しない
			//ファイル名だけ保存している
			$post->image_path = basename($path);
		} else {
			$post->image_path = null;
		}
		// フォームから送信されてきた_tokenを削除する
		unset($form['_token']);
		// フォームから送信されてきたimageを削除する
		unset($form['image']);
		//これ消しちゃって良いのか？目的は写真データを保存したい→画像データ自体はストレージで保存
		// データベースに保存する
		// dd($form);
		$post->fill($form);
		$post->user_id = Auth::user()->id;
		//postとidを紐付けていてidが保存されておらずエラーが出たため追加
		$post->save();
		return redirect('posts/index');
	}
	
	public function index(Request $request) {
		$title = $request->title;
		if ($title != '') {
			// 検索されたら検索結果を取得する
			//画像も表示したい
			$posts = Post::where('title', $title)->get();
		} else {
		// それ以外はすべてのニュースを取得する
		$posts = Post::all();
		}
	return view('posts.index', ['posts' => $posts, 'title' => $title]);
	}	

	public function edit(Request $request) {
		// News Modelからデータを取得する
		$post = Post::find($request->id);
		if (empty($post)) {
			abort(404);    
		}
	return view('posts.edit', ['form' => $post]);
	}
	
	public function update(Request $request) {
		$this->validate($request, Post::$rules);
		$post = Post::find($request->id);
		$form = $request->all();
		// 既存のコード16
		if (isset($form['image'])) {
			// isset — 変数が宣言されていること、そして NULL とは異なることを検査する
			$path = $request->file('image')->store('public/image');
			$post->image_path = basename($path);
			unset($form['image']);
			// unset関数は、定義した変数の割当を削除する関数です。
		} elseif (isset($request->remove)) {
			$post->image_path =null;
			unset($form['remove']);
			//   unset関数は、定義した変数の割当を削除する関数です。
		} 

		unset($form['_token']);
	// 該当するデータを上書きして保存する
		$post->fill($form)->save();

	// 以下を追記
		$history = new History;
		$history->post_id = $post->id;
		$history->edited_at = Carbon::now();
		$history->save();
		return redirect('posts/index/');
	}

	public function delete(Request $request) {
		// 該当するNews Modelを取得
		$post = Post::find($request->id);
		// 削除する
		$post->delete();
		return redirect('posts/index/');
	}  
		
}
