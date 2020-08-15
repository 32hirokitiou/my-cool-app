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
Route::get('/', function () { return redirect('/register'); });
Route::get('home', 'ItemsController@index');
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
    Route::post('user/edit', 'UserController@update');
    
    //ユーザー画像の追加分
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::get('/user/userEdit', 'UserController@userEdit')->name('user.userEdit');
    Route::post('/user/userEdit', 'UserController@userUpdate')->name('user.userUpdate');
    //ユーザー画像の追加分

    // Route::get('posts/create', 'PostsController@add');
    Route::get('posts/add', 'PostsController@add');
    Route::post('posts/create', 'PostsController@create');
    Route::get('posts/index', 'PostsController@index'); // 追記
    Route::get('posts/edit', 'PostsController@edit');
    Route::post('posts/edit', 'PostsController@update');
    Route::get('posts/delete', 'PostsController@delete');
    Route::get('posts/show', 'PostsController@show');

    // Route::group(['prefix'=>'posts/{id}'],function(){
    //     Route::post('favorite','FavoriteController@store')->name('favorites.favorite');
    //     Route::delete('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
    //  });
    // Route::get('posts/{id}', 'PostsController@showDetail')->name('show');
    //チェックボックス①
    Route::get('/', function () {
        return view('welcome', ['posts' => App\Post::all(), 'tags' => App\Tag::all()]);
    });

    Route::post('/', function () {
        $post = new App\Post();
        $post->title = request()->title;
        $post->save();
        $post->tags()->attach(request()->tags);
        return redirect('/');
        });
    //チェックボックス①

    //チェックボックス②
    Route::get('posts/create', function () {
        return view('posts/create', ['posts' => App\Post::all(), 'tags' => App\Tag::all()]);
    });

    //下の方いらないかもしれない
    // Route::post('posts/create', function () {
    //     $post = new App\Post();
    //     $post->title = request()->title;
    //     //titleではない？
    //     $post->save();
    //     $post->tags()->attach(request()->tags);
    //     return redirect('posts/show');
    //     });
    //チェックボックス②

});





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