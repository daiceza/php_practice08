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

//09課題3 AAAController.phpをApp\Http\Controllers\XXXに作成したと仮定する
Route::get('XXX','XXX\AAAController@bbb');

Route::group(['prefix' => 'admin'],function(){
    Route::get('news/create','Admin\NewsController@add')->middleware('auth');
    //09課題4
    Route::get('profile/create','Admin\ProfileConroller@add')->middleware('auth');
    Route::get('profile/edit','Admin\ProfileConroller@edit')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
