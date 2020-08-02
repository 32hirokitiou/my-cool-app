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
        // 多分いらない
        $myitems->save();
        return redirect('/');
    }
}
