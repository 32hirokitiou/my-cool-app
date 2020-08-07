<?php

namespace App\Http\Controllers;
use App\Item;
use App\Post;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('item.index', ['headline' => $headline, 'posts' => $posts]);
    }
}