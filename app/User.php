<?php

namespace App;

use App\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'comment',
        'image_path',
        //'comment'が追加分
        //'image_path'が追加分
    ];

    public static $rules = [
        'comment' => 'required|max:20',
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

    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    //以下いいね機能にて追加したもの

    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimestamps();
        //favorites関数に戻す Postに対して複数属している
        //ここのfavoritesが謎
        //普通の書き方じゃなダメなのか return $this->belongsToMany('App\Post');
        //もし中間テーブルのcreated_at、updated_atタイムスタンプを自動的に保守したい場合は、withTimestampsメソッドをリレーション定義に付ける必要あり
        //
    }

    public function favorite($postId)
    //いいねをつける関数
    {
        $exist = $this->is_favorite($postId);
        ///既にいいねをしているかの確認
        if ($exist) {
            //ここのif文が理解できない
            //入っていたらfalseを返す
            return false;
        } else {
            $this->favorites()->attach($postId);
            //モデルを結びつけている中間テーブルにレコードを挿入することにより、ユーザーに役割を持たせるにはattachメソッドを使用
            return true;
        }
    }

    public function unfavorite($postId)
    //いいねを外す関数
    {
        $exist = $this->is_favorite($postId);

        if ($exist) {
            $this->favorites()->detach($postId);
            return true;
        } else {
            return false;
        }
    }

    public function is_favorite($postId)
    {
        return $this->favorites()->where('post_id', $postId)->exists();
        //is_favoritesの中にfavorite()の
        //既にfavしているかどうかの判断する関数
        //戻り値 bool true or false
    }

    //いいね追加分
}
