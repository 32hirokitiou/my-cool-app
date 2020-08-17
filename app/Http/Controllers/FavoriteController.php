<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
        //
        public function store(Request $request, $id)
        {
                \Auth::user()->favorite($id);
                //\Authとは。\の意味がわからない
                return back();
                //自動的に元のページへ戻してくれます。
        }

        public function destroy($id)
        {
                \Auth::user()->unfavorite($id);
                return back();
        }
}
