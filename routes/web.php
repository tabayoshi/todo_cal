<?php

use Illuminate\Support\Facades\Route;

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
// カレンダーのルート
Route::get('/','CalendarController@index');

// 休日設定のルート（TODOに変更する）
Route::get('/holiday','CalendarController@show');
Route::post('/holiday','CalendarController@store');

Route::get('/holiday/{id}', 'CalendarController@update');

Route::delete('/holiday',  'CalendarController@delete');

// TODOリストのルート
Route::resource('/todos', 'TodoController');

// MEMOのルート
Route::resource('/memo', 'MemoController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
