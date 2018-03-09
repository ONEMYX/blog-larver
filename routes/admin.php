<?php
/**
 * Created by PhpStorm.
 * User: 孟亚鑫
 * Date: 2018/3/7
 * Time: 16:12
 */

Route::group(['prefix' => 'admin'],function(){


    //登陆显示页面
    Route::get('/login','\App\Admin\Controllers\LoginController@index');
    //登陆行为
    Route::post('/login','\App\Admin\Controllers\LoginController@login');
    //登出行为
    Route::get('/logout','\App\Admin\Controllers\LoginController@logout');



    Route::group(['middleware' => 'auth:admin'], function() {
        //首页
        Route::get('/home','\App\Admin\Controllers\HomeController@index');

        //管理人员模板
        Route::get('/users','\App\Admin\Controllers\UserController@index');
        Route::get('/users/create','\App\Admin\Controllers\UserController@create');
        Route::post('/users/store','\App\Admin\Controllers\UserController@store');

    });


});