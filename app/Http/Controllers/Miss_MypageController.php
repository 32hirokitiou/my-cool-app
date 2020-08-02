<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller{


public function index(Request $request) {
$user = Auth::user();   #ログインユーザー情報を取得します。
return view('mypage/index', ['user' => $user]);
}


public function edit(Request $request) {
$auth = Auth::user();
return view('mypage.edit',[ 'auth' => $auth ]);

}
public function update(Request $request) {
$auth = Auth::user();
return view('mypage.',[ 'auth' => $auth ]);

}


        

}


