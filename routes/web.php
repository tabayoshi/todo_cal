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

Route::get('/', 'CalendarController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//祝日設定
Route::get('/holiday_setting', 'Calendar\HolidaySettingController@form')
    ->name("holiday_setting");
Route::post('/holiday_setting', 'Calendar\HolidaySettingController@update')
    ->name("update_holiday_setting");

//臨時営業設定
Route::get('/extra_holiday_setting', 
    'Calendar\HolidaySettingController@form')
    ->name("extra_holiday_setting");
    
Route::post('/extra_holiday_setting',
    'Calendar\HolidaySettingController@update')
    ->name("update_extra_holiday_setting");