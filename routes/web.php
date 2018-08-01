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
Route::get('/public/{userId}/{userName}', 'PublicController@userInfo');

Route::get('posts', 'PublicController@displayPosts');

// route prefix
Route::namespace('Admin')->prefix('admin')->group(function() {

    // admin/users/
    Route::get('users', 'UsersController@listUsers');

    Route::get('posts', function() {
        // return route('welcome', ['name' => 'jackson', 'age' => '25']);

        return route('welcome');
    });
});

Route::redirect('/old', '/new', 301);