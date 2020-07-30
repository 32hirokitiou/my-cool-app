<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller

{
    public function index(){
    // Auth::routes();
     $auth = Auth::user();

    return view('user.index',[ 'auth' => $auth ]);
    //
    }



}
