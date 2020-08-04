<?php
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Auth::routes();
/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return redirect('/home'); });
 
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home', function () { return redirect('user/show'); });
    Route::get('user/show', 'UserController@show');
    Route::get('user/edit', 'UserController@edit');

    //あっているかわからない、  updateアクションがかけない
    Route::post('user/edit', 'UserController@edit');
    Route::post('user/edit', 'UserController@update');
    //追加分
    // Route::get('mypage/index','MypageController@index');
    // Route::get('mypage/edit','MypageController@edit');
    Route::get('myitems/show', 'MyitemsController@show');
    Route::get('myitems/add', 'MyitemsController@add')->name('myitems_add');
    //新規作成画面の表示
    Route::post('myitems/add', 'MyitemsController@create')->name('myitems_create');
    //新規投稿後のデータを保存する
    Route::post('myitems/add', 'MyitemsController@create')->name('myitems_create');
    });
    // コントローラーは複数形ではない？
    Route::get('/myitems/index', 'MyitemsController@index')->name('myitems_index');
    //ポスト画面
    Route::get('/myitems/posts/post', 'PostsController@index');
    Route::post('upload', 'PostsController@upload');
    Route::post('', 'PostsController@upload');

    
    //8/4
/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});
 
/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});