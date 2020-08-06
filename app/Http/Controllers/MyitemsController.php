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
      $myitems_form = $request->all();
      if (isset($items_form['image'])){
        $path = $request->file('image')->store('public/image');
        $post->image = basename($path);
        unset($post_form['image']);
      } elseif (isset($request->remove)) {
          $post->image =null;
          unset($myitems_form['remove']);
      } 
      unset($myitems_form['_token']);
      // 該当するデータを上書きして保存する
      $post->fill($myitems_form)->save();
      return redirect('myitems/show');
  }
}

