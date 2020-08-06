<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
//PostsなのかPostなのか
{
    // protected $fillable = [
    // 'image', 'title',
    // ];

    // 以下を教材から追加
    protected $guarded = array('id');
    public static $rules = array(
        'title' => 'required',
        'image' => 'required',
    );
}
