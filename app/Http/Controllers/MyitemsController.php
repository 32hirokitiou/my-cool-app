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
        return view('myitems.add');
    }
    
    public function create(Request $request)
    {
        $myitems = new Myitems;
        $myitems->user_id = $request->user_id;
        // $article->title = $request->title;
        // $article->content = $request->content;
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
    
}
