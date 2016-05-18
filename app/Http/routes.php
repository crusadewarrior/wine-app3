<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
        return redirect('/admin');
    });

    Route::get('/home', 'HomeController@index');
    Route::get('/admin', 'AdminController@index');
    // Batches
    Route::get('admin/batches', ['as' => 'get.batches', 'uses' => 'BatchesController@index']);
    Route::get('admin/winerecords', ['as' =>'get.batchid', 'uses' => 'WineRecordsController@index']);

// User
    Route::get('admin/user', 'UserController@createShow');
    Route::get('admin/user/profile/{id}', ['as' => 'user.profile', 'uses' => 'UserController@showProfile']);
    Route::get('admin/user/profile/{id}/edit', ['as' => 'user.edit', 'uses' => 'UserController@editProfile']);
    Route::get('admin/user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::Post('admin/user/update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
    Route::Post('admin/user', ['as' => 'user.store', 'uses' => 'CreateUserController@store']);
    Route::Post('admin/user/delete{id}', ['as' => 'user.delete', 'uses' => 'UserController@destroy']);
});





