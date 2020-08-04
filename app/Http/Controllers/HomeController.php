<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                'required', 'file', 'mimes:jpeg,png'
            ]
        ]);
        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/avatar');
            $user = User::find(auth()->id());
　　　 //画像アップロード時に既に他の画像がアップロードされている場合に既存の画像を削除する処理
            Storage::disk('local')->delete('public/avatar/'.$user->avatar_filename);

            $user->avatar_filename = basename($filename);
            $user->save();

            return redirect('/home')->with('success', '保存しました');
        } else {
            return redirect()->back()->withInput()->witherrors(['file' => '画像がアップロードされてないか不正なデータです。']);
        }
    }

    public function delete(Request $request)
    {
        $user = User::find(auth()->id());
        //ファイルがアップロードされてない場合に削除ボタンをクリックした時の挙動を制御
        if (is_null($user->avatar_filename)) {
            return redirect('/home')->with('error', '削除するファイルがありません');
        }
        Storage::disk('local')->delete('public/avatar/'.$user->avatar_filename);
        $user->avatar_filename = null;
        $user->save();
        return redirect('/home')->with('success', '削除しました');
    }
}
