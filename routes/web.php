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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('setting', 'SettingController');
Route::post('/upload', 'HomeController@upload');
Route::get('/send/email', 'HomeController@mail');
Route::post('/sendmail', 'HomeController@sendmail');
Route::post('/webhook', 'HomeController@subscribe');