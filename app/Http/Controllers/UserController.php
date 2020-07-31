<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{


    public function show(Request $request) {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('user/show', ['user' => $user]);
    }


    public function edit(Request $request) {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('user/edit', ['user' => $user]);
    }

  

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, News::$rules);
        // News Modelからデータを取得する
        $user = News::find($request->id);
        // 送信されてきたフォームデータを格納する
        $_form = $request->all();
        unset($news_form['_token']);
  
        // 該当するデータを上書きして保存する
        $user->fill($news_form)->save();
  
        return redirect('user');
    }
  
    // 以下を追記　　
    // public function delete(Request $request)
    // {
    //     // 該当するNews Modelを取得
    //     $users = Users::find($request->id);
    //     // 削除する
    //     $users->delete();
    //     return redirect('user'/'edit');
    // }  
    

    
}


    // public function delete(Request $request)
    // {
    //     // 該当するNews Modelを取得
    //     $news = Mypage::find($request->id);
    //     // 削除する
    //     $news->delete();
    //     return redirect('user/edit/');
    // }  
  
   
