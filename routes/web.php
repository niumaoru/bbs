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

//测试路由
Route::get('/test','TestsController@test')->name('test');

//主页路由
Route::get('/','PagesController@root')->name('root');

// 用户身份验证相关的路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//用户资源路由
Route::resource('users','UsersController',['only' => ['show','edit','update']]);

Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);

//根据分类显示话题列表资源路由
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

//话题发布页面图片上传路由
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

//显示话题页面友好URL
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

//通知列表页面路由
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);