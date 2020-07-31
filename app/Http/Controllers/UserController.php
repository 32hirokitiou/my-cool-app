<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{


    public function index(Request $request) {
    $user = Auth::user();   #ログインユーザー情報を取得します。
    return view('user/index', ['user' => $user]);
    }

    // public function create()
    // {
    //     return view('admin.profile.create');
    // }

    // public function read()
    // {
    //     return redirect('admin/profile/create');
    // }

    // public function update()
    // {
    //     return view('admin.profile.edit');
    // }

    // public function delete()
    // {
    //     return redirect('admin/profile/edit');
    // }


    
    // public function index() {
    //     return view('user.index', ['user' => Auth::user() ]);
    // }
    // //userデータの編集
    // public function edit() {
    //     return view('user.edit', ['user' => Auth::user() ]);
    // }
    // //userデータの保存
    // public function update(Request $request) {

    //     $user_form = $request->all();
    //     $user = Auth::user();
    //     //不要な「_token」の削除
    //     unset($user_form['_token']);
    //     //保存
    //     $user->fill($user_form)->save();
    //     //リダイレクト
    //     return redirect('user/index');
    // }

}
