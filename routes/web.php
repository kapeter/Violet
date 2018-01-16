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

Route::any('/wechat', 'WechatController@serve');

Route::group(['middleware' => ['wechat.oauth:snsapi_userinfo']], function () {
    Route::get('/wechat/register', 'RegisterController@index');
    Route::post('/wechat/register', 'RegisterController@store');
});

Route::get('/garden', function () {
    return view('garden');
});
