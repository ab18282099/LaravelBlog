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

// never put 'return' keyword in router
Route::get('/', 'PublicController@index')->name('welcome');
Route::view('/about', 'about')->name('about');

Route::get('/public/{userId}/{userName}', 'PublicController@userInfo');
Route::get('posts', 'PublicController@displayPosts');

// pgsql and aop test
Route::get('products', 'PublicController@displayProductName');
Route::get('addProduct/{productName}', 'PublicController@addProduct');
Route::get('getProduct/{productId}', 'PublicController@getProduct');
Route::get('testTransaction', 'PublicController@gracefulTransaction');

// route prefix with specific namespace(預設抓到App\Http\Controllers，如果再繼續往下定義就要設定 namespace)
Route::namespace('Admin')->prefix('admin')->group(function() {

    // admin/users/
    Route::get('users', 'UsersController@listUsers');

    Route::get('posts', function() {
        // return route('welcome', ['name' => 'jackson', 'age' => '25']);

        return route('welcome');
    });
});

// 轉跳
Route::redirect('/old', '/new', 301);