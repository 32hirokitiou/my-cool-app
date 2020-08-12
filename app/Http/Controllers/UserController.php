<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{


    public function show(Request $request) {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        
        

        // $items = User::has('message')->get();
        // return view('user.index', ['items' => $items]);

        // return view('user/show', ['user' => $user]);
    }


    public function edit(Request $request) {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        // $news = Auth::find($request->id);
        return view('user/edit', ['user_form' => $user]);
        
    }

    public function update(Request $request){
        // Validationをかける
        //   $this->validate($request, News::$rulxes);
        // News Modelからデータを取得する
        // $user = User::find($request->id);
        $user = Auth::user(); 
        // id?で全ての情報を引っ張ってこれているのか？
        // 送信されてきたフォームデータを格納する
        $user_form = $request->all();
        unset($user_form['_token']);
        // 該当するデータを上書きして保存する
        $user->fill($user_form)->save();
        //  return redirect('admin/news');
        return redirect('user/show');
}

  

    // public function update(Request $request)
    // {
        
    //     // Validationをかける
    //     // $this->validate($request, Auth::$user);
    //     // News Modelからデータを取得する
    //     $user = Auth::find();
    //     // 送信されてきたフォームデータを格納する
    //     $user_form = $request->all();
    //     unset($user_form['_token']);
  
    //     // 該当するデータを上書きして保存する
    //     $user->fill($user_form)->save();
  
    //     return redirect('user/show');
    // }
  
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
  
   
