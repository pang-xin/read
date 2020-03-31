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

Route::get('read/reg','Login\LoginController@reg');
Route::post('read/reg_do','Login\LoginController@reg_do');


Route::post('read/aliyun_code','aliyun@code');
Route::get('read/alipay','aliyun@alipay');

Route::get('read/search','Index\IndexController@search');


Route::get('read/cate','Index\CateController@cate');

Route::get('read/details/{book_id}','Index\DetailsController@details');
Route::post('read/ticket','Index\DetailsController@ticket');

Route::get('read/writer_area','Index\WriterController@writer_area');

Route::get('read/writer','Index\WriterController@writer');
Route::post('read/writer_do','Index\WriterController@writer_do');
Route::get('read/login_writer','Index\WriterController@login_writer');
Route::post('read/login_writer_do','Index\WriterController@login_writer_do');

Route::get('read/book','Index\WriterController@book');
Route::post('read/book_do','Index\WriterController@book_do');

Route::get('read/admin','Admin\adminController@admin');
Route::get('book/review','Admin\adminController@review');
Route::get('book/review_by/{book_id}','Admin\adminController@review_by');
Route::get('book/review_no/{book_id}','Admin\adminController@review_no');


Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/login_do','Admin\LoginController@login_do');

Route::get('admin/reg','Admin\LoginController@reg');
Route::post('admin/reg_do','Admin\LoginController@reg_do');


Route::get('admin/index','Admin\IndexController@index');
Route::get('author/review','Admin\IndexController@review');

Route::get('author/review_by/{writer_id}','Admin\IndexController@review_by');
Route::get('author/review_no/{writer_id}','Admin\IndexController@review_no');
