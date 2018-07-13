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

Route::post('manager/class/add', 'ManagerController@classes_add');//添加班级
Route::post('manager/class/edit', 'ManagerController@classes_edit');//修改班级名称
Route::post('manager/class/delete', 'ManagerController@classes_delete');//删除班级
Route::post('manager/class/search', 'ManagerController@classes_search');//班级查找


Route::post('manager/student/add', 'ManagerController@student_add');//添加学生
Route::post('manager/student/edit', 'ManagerController@student_edit');//修改学生信息
Route::post('manager/student/delete', 'ManagerController@student_delete');//删除学生信息
Route::post('manager/student/search', 'ManagerController@student_search');//学生查找

Route::post('manager/instructor/add', 'ManagerController@instructor_add');//添加辅导员
Route::post('manager/instructor/edit', 'ManagerController@instructor_edit');//修改辅导员
Route::post('manager/instructor/delete', 'ManagerController@instructor_delete');//删除辅导员
Route::post('manager/instructor/search', 'ManagerController@instructor_search');//辅导员查找


Route::post('manager/semester/add', 'ManagerController@semester_add');//添加学期
Route::post('manager/semester/edit', 'ManagerController@semester_edit');//修改学期
Route::post('manager/semester/delete', 'ManagerController@semester_delete');//删除学期
Route::post('manager/semester/search', 'ManagerController@semester_search');//学期查找


Route::post('manager/course/add', 'ManagerController@course_add');//添加课程
Route::post('manager/course/edit', 'ManagerController@course_edit');//修改课程
Route::post('manager/course/delete', 'ManagerController@course_delete');//删除课程
Route::post('manager/course/search', 'ManagerController@course_search');//课程查找
