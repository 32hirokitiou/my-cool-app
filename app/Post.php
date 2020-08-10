<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $fillable = [
    // 'image', 'title',
    // ];

    // 以下を教材から追加
    protected $guarded = array('id');
    public static $rules = array(
        'title' => 'required',
        // 'image_path' => 'required',
    );

    // Postモデルに関連付けを行う
    public function histories()
    {
      return $this->hasMany('App\History');
    }

    public function tags()
    {
      return $this->belongsToMany('App\Tag');
        // ->using('App\PostTag');
    }

    public function post_tags()
    {
      return $this->hasMany('App\PostTag');
        // ->using('App\PostTag');
    }
    
}
