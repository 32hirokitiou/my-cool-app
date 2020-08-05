<?php

namespace App\Http\Controllers;

use App\Myitems;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyitemsController extends Controller
{
    public function add()
    {
        return view('myitems.show');
        $user = Auth::user();
      $title = $request->title;
      if ($title != '') {
          // 検索されたら検索結果を取得する
          $posts = Post::where('title', $title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Post::all();
      }
      return view('myitems/show', ['image' => $image, 'title' => $title]);
    }
    
    public function create(Request $request){
    
        $myitems = new Myitems;
        $myitems->user_id = $request->user_id;
        
        // $post->title = $request->title;
        // $post->content = $request->content;
        // post画面を追加したら該当項目を追加する
        $myitems->save();
        return redirect('/');
    }
    
    // public function index()
    // {
    // $myitems = Myitem::all();
    // // 全てのレコードを取得し、$myitemsへ代入する。
    // return view('myitems.index', ['myitems' => $myitems]);
    // // $myitemsを'myitems.index'ビューへ配列形式で渡す。
    // // ビューの中で$articles、つまり取得したレコードを使用できるようになる。
    // }

    public function show(Request $request) {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        // $news = Auth::find($request->id);
        
        return view('myitems/show', ['user' => $user]);
        
    }
    
    public function index(Request $request)
  {
      $user = Auth::user();
      $title = $request->title;
      if ($title != '') {
          // 検索されたら検索結果を取得する
          $posts = Post::where('title', $title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Post::all();
          //検索機能が必要だったらこれだけ必要
      }
      return view('myitems/show', ['posts' => $posts, 'title' => $title]);
  }
    //検索機能が必要なかったらいらない
}
