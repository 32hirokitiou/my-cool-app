<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//　ユーザー情報を受け渡ししている


class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('myitems/posts/post');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);
        if ($request->file('file')->isValid([])) {
            // データが無効な場合には「0」（偽）を返し、データが有効な場合には「1」（真）を返します。
            $path = $request->file->store('public');
            // ※デフォルトの public ディスクは、 local ドライバを使用しており、 storage/app/public 下に存在しているファイルです。
            // Webからのアクセスを ... アップロードファイルインスタンスに store メソッドを使えば、アップロードファイルの保存はLaravelで簡単に行なえます。
            // return view('home')->with('filename', basename($path)); ※追加でviewのあてさきを変えて修正する
            // ※basename」は、ディレクトリ名とファイル名を含むパス名（/mydir/myfileなど）から、ディレクトリ部分を除き、ファイル名だけを取得するコマンドです。
            return redirect('/myitems/show');
            //mynewsを参考にして作成する

        } else {
            return redirect()
                ->back()
                ->withInput()
                // 入力をフラッシュデータとして保存できます。
                ->withErrors();
                //コントローラーからビューにエラーメッセージを渡す方法
            //上記で何をやっているのかがわからない
        }
    }


    
}
