<?php

namespace App\Http\Controllers;

use App\Post;
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
    
}
