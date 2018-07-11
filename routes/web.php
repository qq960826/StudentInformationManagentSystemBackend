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

//公共功能
Route::get('common/captcha', 'CommonController@captcha');//验证码
Route::post('common/login', 'CommonController@login');//用户登录
Route::get('common/logout', 'CommonController@logout');//用户注销
Route::post('common/changehobby', 'CommonController@changehobby');//修改爱好
Route::post('common/changespassword', 'CommonController@changespassword');//修改密码


//管理员功能
Route::post('manager/user/add', 'ManagerController@user_add');//用户添加
Route::post('manager/user/edit', 'ManagerController@user_edit');//修改密码
Route::post('manager/user/resetpassword', 'ManagerController@user_resetpassword');//用户密码重置
Route::post('manager/user/delete', 'ManagerController@user_delete');//用户删除
Route::post('manager/user/search', 'ManagerController@user_search');//用户查找

