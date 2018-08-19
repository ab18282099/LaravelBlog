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

// 首頁路由
Route::get('/', 'PublicController@index')->name('index');

// Post 頁面
Route::get('post/{id}', 'PublicController@singlePost')->name('singlePost');

// 關於
Route::get('about', 'PublicController@about')->name('about');

// 聯絡
Route::get('contact', 'PublicController@contact')->name('contact');
Route::post('contact', 'PublicController@contactPost')->name('contactPost');

// user auth
Auth::routes();

// home
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// admin dashboard
Route::prefix('admin')->group(function() {
    Route::get('/dashboard', 'AdminController@dashboard')->name('adminDashboard');
});
