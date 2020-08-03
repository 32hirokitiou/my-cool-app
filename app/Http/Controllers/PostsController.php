<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        return view('post');
    }

}
