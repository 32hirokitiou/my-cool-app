<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

//ユーザー情報を受け渡ししている


class PostsController extends Controller
{
    
        public function add()
        {
            return view('posts.create');
        }
      
        // 以下を追記
        public function create(Request $request)
        {
            // admin/news/createにリダイレクトする
            return redirect('posts/create');


    
        }
}
