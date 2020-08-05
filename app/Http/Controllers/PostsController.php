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
        $user = Auth::user();
        return view('posts/post');
    }

    public function create(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post = new Post;
        $form = $request->all();
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $post->image = basename($path);
        }else {
            $post->image = null;
        }
        //これIDの紐付けどうなっているの？？
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        // unset($form['image']);​
        $post->fill($form);
        $post->save();
        return redirect('/myitems/show');
    }


    
}
