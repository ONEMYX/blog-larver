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


        Route::group(['middleware'=>'can:system'], function (){
            //管理人员模板
            Route::get('/users','\App\Admin\Controllers\UserController@index');
            Route::get('/users/create','\App\Admin\Controllers\UserController@create');
            Route::post('/users/store','\App\Admin\Controllers\UserController@store');
            Route::get('/users/{user}/role','\App\Admin\Controllers\UserController@role'); //用户角色页面
            Route::post('/users/{user}/role','\App\Admin\Controllers\UserController@storeRole');//储存用户角色



            //角色管理
            Route::get('/roles','\App\Admin\Controllers\RoleController@index');//角色列表
            Route::get('/roles/create','\App\Admin\Controllers\RoleController@create');//创建角色
            Route::post('/roles/store','\App\Admin\Controllers\RoleController@store');//创建角色行为
            Route::get('/roles/{role}/permission','\App\Admin\Controllers\RoleController@permission');// 角色权限关系页面
            Route::post('/roles/{role}/permission','\App\Admin\Controllers\RoleController@storePermission');//储存角色权限行为

            //权限管理
            Route::get('/permissions','\App\Admin\Controllers\PermissionController@index');//权限列表
            Route::get('/permissions/create','\App\Admin\Controllers\PermissionController@create');//权限添加
            Route::post('/permissions/store','\App\Admin\Controllers\PermissionController@store');// 储存角色行为

        });

        Route::group(['middleware' => 'can:post'], function() {
            //审核模板
            Route::get('/posts','\App\Admin\Controllers\PostController@index');
            Route::post('/posts/{post}/status','\App\Admin\Controllers\PostController@status');
        });

        //专题管理页面
        Route::group(['middleware' => 'can:topic'], function(){
            Route::resource('topics','\App\Admin\Controllers\TopicController'
                ,['only'=>['index','create','store','destroy']]);
        });
        //通知管理
        Route::group(['middleware' => 'can:notice'], function(){
            Route::resource('notices','\App\Admin\Controllers\NoticeController'
                ,['only'=>['index','create','store']]);
        });

    });


});