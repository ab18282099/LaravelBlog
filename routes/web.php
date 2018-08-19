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
Route::get('/', 'PublicController@index')->name('welcome');

// Post 頁面
Route::get('post/{id}', 'PublicController@singlePost')->name('singlePost');

// 關於
Route::get('about', 'PublicController@about')->name('about');

// 聯絡
Route::get('contact', 'PublicController@contact')->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
