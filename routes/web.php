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

Route::group(['prefix' => 'admin', 'middleware' =>'auth'],function(){
    Route::get('news/create','Admin\NewsController@add');
    Route::post('news/create','Admin\NewsController@create');//13追記
    Route::get('news','Admin\NewsController@index');//15追記
    //16追記
    Route::get('news/edit','Admin\NewsController@edit');
    Route::post('news/edit','Admin\NewsController@update');
    Route::get('news/delete','Admin\NewsController@delete');
    
    Route::get('profile/create','Admin\ProfileController@add');
    Route::post('profile/create','Admin\ProfileController@create');//課題13-3
    
    Route::get('profile','Admin\ProfileController@index');//16追記
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/edit','Admin\ProfileController@update');//課題13-6
    Route::get('profile/delete','Admin\ProfileController@delete');//16追記
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

//18
Route::get('/','NewsController@index');
Route::get('/profile','ProfileController@index');