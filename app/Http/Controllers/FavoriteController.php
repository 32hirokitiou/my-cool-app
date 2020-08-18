<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
        //
        public function index(Request $request)
        {
                $title = $request->title;
                if ($title != '') {
                        // 検索されたら検索結果を取得する
                        //画像も表示したい
                        $posts = Post::where('title', $title)->get();
                } else {
                        // それ以外はすべてのニュースを取得する
                        $posts = Post::all();
                }
                $auth_user = Auth::user();
                return view('favorite', ['posts' => $posts, 'title' => $title, 'auth_user' => $auth_user,]);
        }

        public function store(Request $request, $id)
        {
                \Auth::user()->favorite($id);
                //\Authとは。
                return back();
                //自動的に元のページへ戻してくれます。
        }

        public function destroy($id)
        {
                \Auth::user()->unfavorite($id);
                return back();
        }
}
