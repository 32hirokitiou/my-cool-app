<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{   
    //
    protected $table = 'post_tag';
    protected $guarded = array('id');
    protected $fillable = array('post_id','tag_id');
}