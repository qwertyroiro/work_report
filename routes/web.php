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

// Route::get("/", "HomeController@index"); // スタートページ
Route::get('/', function () {
    // redirect
    return redirect('/home');
});
Route::get("/report", "UserController@report");
Route::get("/salary", "UserController@salary");
Route::get("/promotion", "UserController@promotion");

Route::post('/reported', 'UserController@reported');
Route::post('/salaried', 'UserController@salaried');
Route::post('/promoted', 'UserController@promoted');

Route::post("/register_route", "UserController@register_route");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/users/{user}', 'UserController@delete');

Route::get('/admin', 'AdminController@index');
Route::get('/input_classroom', 'AdminController@input_classroom');
Route::post('/register_classroom', 'AdminController@register_classroom');
// 管理画面つくりたい
// 管理者なら(usersテーブルのbooleanがTrueなら)、
// /dashboradに飛べるようにミドルウェア使ってしたい
