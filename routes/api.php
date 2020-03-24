<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//接口
Route::domain('www.api.lijiaxin.com')->group(function () {
    Route::any('/login_do', 'Api\ApiController@login_do');
    Route::any('/update', 'Api\ApiController@update');
    Route::any('/update_do', 'Api\ApiController@update_do');
});
