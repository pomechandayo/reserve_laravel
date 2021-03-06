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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reserve', 'ReserveController@index')->name('show.reserve');
Route::get('/reserve/confirm', 'ReserveController@reserve_confirm')->name('confirm.reserve');
Route::post('/reserve/store', 'ReserveController@store')->name('store.reserve');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/mypage', 'MypageController@index')->name('show.mypage');
});
