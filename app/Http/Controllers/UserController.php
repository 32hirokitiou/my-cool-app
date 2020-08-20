<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Validator
// 下記追加分
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function show(Request $request)
    {
        $post = Post::find($request->id);
        if (empty($post)) {
            abort(404);
        }
        //ここでクリックした写真の情報をuser/showに渡したい
        //
        $user = Auth::user();

        return view('user.show', ['post' => $post, 'user' => $user,]);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('user/edit', ['user_form' => $user]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        //   $this->validate($request, News::$rulxes);
        // News Modelからデータを取得する
        // $user = User::find($request->id);
        $user = Auth::user();
        // id?で全ての情報を引っ張ってこれているのか？
        // 送信されてきたフォームデータを格納する
        $user_form = $request->all();
        unset($user_form['_token']);
        // 該当するデータを上書きして保存する
        $user->fill($user_form)->save();
        //  return redirect('admin/news');
        return redirect('user/show');
    }

    //画像追加
    public function index(Request $request)
    {
        $authUser = Auth::user();
        $users = User::all();
        $param = [
            'authUser' => $authUser,
            'users' => $users
        ];
        return view('user.index', $param);
    }

    public function userEdit(Request $request)
    {
        $authUser = Auth::user();
        //デフォ追加分
        //デフォのプロフィール画像設定でvalueに入れたいので
        //$userのid1に写真を追加しておいてそれをデフォに設定する
        //やり方がわからないので確認する
        $user =  User::all();
        //'user' => $user,も追加分
        //デフォ追加分
        $param = ['authUser' => $authUser, 'user' => $user,];

        return view('user.userEdit', $param);
    }

    public function userUpdate(Request $request)
    {
        // Validator check
        $rules = [
            'user_id' => 'integer|required',
            'comment' => 'required',
        ];

        $messages = [
            'user_id.integer' => 'SystemError:システム管理者にお問い合わせください',
            'user_id.required' => 'SystemError:システム管理者にお問い合わせください',
            'comment.required' => 'コメントが未入力です',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        //dd確認済み。トークンいらない
        if ($validator->fails()) {
            return redirect('/user/userEdit')
                ->withErrors($validator)
                ->withInput();
            //リダイレクトしたときに値を保持する
        }
        //dd確認済み。


        $param = [
            'name' => $request->name,
            'comment' => $request->comment,
        ];
        $uploadfile = $request->file('image_path');
        if (!empty($uploadfile)) {
            $image_path = $uploadfile->hashName();
            $uploadfile->storeAs('public/user', $image_path);
            $param['image_path'] = $image_path;
        }
        // dd($param);
        User::where('id', $request->user_id)->update($param);
        //

        return redirect(route('user.userEdit'))->with('success', '保存しました。');
    }

    public function test()

    {
        return view('child');
    }

    public function common()

    {
        return view('common');
    }
}
