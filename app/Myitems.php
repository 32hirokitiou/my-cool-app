<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Myitems as Authenticatable;

class Myitems extends Model
{
    // protected $table = 'myitems_table';
    // 
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //
    // protected $fillable = ['user_id', 'title', 'content'];
    // 中身の意味がわからない
    // protected $fillable = ['user_id', 'title', 'content'];を記述しなくてもアプリは動くのだが、
    // セキュリティのために記述しなければならない。管理者側からすれば、ユーザーから編集されては困る項目
    // （プロパティ）もある。それらの項目を、
    // あらかじめホワイトリストやブラックリストとして指定する機能だ。
}
