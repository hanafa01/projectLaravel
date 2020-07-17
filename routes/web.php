<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>'admin'],function(){

    Route::get('/admin',function(){
        return view('admin.index');
    }); 
   
    Route::resource('admin/users','AdminUsersController');
    
    Route::resource('admin/posts','AdminPostsController');

    Route::resource('admin/categories','AdminCategoriesController');

    Route::resource('admin/medias','AdminMediasController');

    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comment/replies','CommentRepliesController');
        
});


