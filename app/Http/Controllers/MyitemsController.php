<?php

namespace App\Http\Controllers;

use App\Post;
use App\Myitems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyitemsController extends Controller
{
    
  public function index(Request $request)
  {
      $title = $request->title;
      if ($title != '') {
          // 検索されたら検索結果を取得する
          //　画像も表示したい
          $posts = Post::where('title', $title)->get();
      } else {
            // それ以外はすべてのニュースを取得する
            $posts = Post::all();
      }
        return view('myitems.index', ['posts' => $posts, 'title' => $title]);
  }
    
    public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $post = Post::find($request->id);
      if (empty($post)) {
        abort(404);    
      }
      return view('myitems.edit', ['myitems_form' => $post]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Post::$rules);
      // News Modelからデータを取得する
      $post = Post::find($request->id);
      // 送信されてきたフォームデータを格納する
      $form = $request->all();
      if (isset($form['image'])){
        // isset — 変数が宣言されていること、そして NULL とは異なることを検査する
        $path = $request->file('image')->store('public/image');
        $post->image = basename($path);
        //ここがわからない
        unset($form['image']);
        // unset関数は、定義した変数の割当を削除する関数です。
        //
      } elseif (isset($request->remove)) {
          $post->image =null;
          unset($form['remove']);
        //   unset関数は、定義した変数の割当を削除する関数です。
      } 
      unset($form['_token']);
      // 該当するデータを上書きして保存する
      $post->fill($form)->save();
      return redirect('myitems/index');
  }

  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $post = Post::find($request->id);
      // 削除する
      $post->delete();
      return redirect('myitems/index/');
  }  
  
}

