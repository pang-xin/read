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

Route::get('read/token','Index\IndexController@token');
Route::get('read/index','Index\IndexController@index');
Route::get('read/code','Index\IndexController@code');
Route::get('read/wechat','Index\IndexController@WeChat');
Route::get('read/wechatlogin','Index\IndexController@wechatlogin');


Route::get('read/login','Login\LoginController@index');
Route::post('read/login_do','Login\LoginController@login_do');
Route::post('read/wechat_do','Login\LoginController@wechat_do');

