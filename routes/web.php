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
// Route::get('/holiday','CalendarController@show');
// Route::post('/holiday','CalendarController@store');

// Route::get('/holiday/{id}', 'CalendarController@update');

// Route::delete('/holiday',  'CalendarController@delete');

// TODOリストのルート
Route::post('/todos', 'TodoController@store')->name('store');
Route::delete('/todos', 'TodoController@destroy')->name('delete');

// MEMOのルート
Route::resource('/memo', 'MemoController');
Route::get('/memos/{id}', 'MemoController@index')->name('index');
Route::post('/memos', 'MemoController@store')->name('store');
Route::patch('update', 'MemoController@update')->name('update');
Route::delete('/memos', 'MemoController@destroy')->name('delete');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
