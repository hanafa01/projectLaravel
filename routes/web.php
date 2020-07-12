<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin'],function(){

    Route::get('/admin',function(){
        return view('admin.index');
    });
   
    Route::resource('admin/users','AdminUsersController');
    
    Route::resource('admin/posts','AdminPostsController');

    
});


