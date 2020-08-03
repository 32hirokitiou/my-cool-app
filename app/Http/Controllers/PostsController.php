<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//　ユーザー情報を受け渡ししている


class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('post');
    }

}
