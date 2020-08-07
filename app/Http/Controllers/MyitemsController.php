<?php

namespace App\Http\Controllers;

use App\Post;
use App\Myitems;
use Carbon\Carbon;
use App\History;
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
      return view('myitems.edit', ['form' => $post]);
  }


  public function update(Request $request)
  {
    $this->validate($request, Post::$rules);
    $post = Post::find($request->id);
    $form = $request->all();

    // 既存のコード16
    if (isset($form['image'])){
        // isset — 変数が宣言されていること、そして NULL とは異なることを検査する
        $path = $request->file('image')->store('public/image');
        $post->image = basename($path);
        unset($form['image']);
        // unset関数は、定義した変数の割当を削除する関数です。
      } elseif (isset($request->remove)) {
          $post->image =null;
          unset($form['remove']);
        //   unset関数は、定義した変数の割当を削除する関数です。
      } 
      unset($form['_token']);
      // 該当するデータを上書きして保存する
      $post->fill($form)->save();


    //   教材のコード17
    // if ($request->remove == 'true') {
    //     $form['image'] = null;
    //     //if remove だったら image をnullにする
    // } elseif ($request->file('image')) {
    //     // if fileにimageが入っていたら
    //     $path = $request->file('image')->store('public/image');
    //     $form['image'] = basename($path);
    //     //$path にデータを保存する
    // } else {
    //     $form['image'] = $post->image;
    // }
    //  unset($form['_token']);
    //  unset($form['image']);
    //  unset($form['remove']);
    //  $post->fill($form)->save();

    // 以下を追記
    $history = new History;
    $history->post_id = $post->id;
    $history->edited_at = Carbon::now();
    $history->save();
      return redirect('myitems/index/');
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

