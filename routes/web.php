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


Route::get('common/captcha', 'CommonController@captcha');//验证码
Route::post('common/login', 'CommonController@login');//用户登录
Route::get('common/logout', 'CommonController@logout');//用户注销