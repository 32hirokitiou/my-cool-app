<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  //
  public function posts()
  {
    return $this->belongsToMany('App\Post', 'post_tag', 'tag_id');
    // ->using('App\PostTag');
  }

  public function tag_posts()
  {
    return $this->hasMany('App\PostTag');
    // ->using('App\PostTag');
  }
}
