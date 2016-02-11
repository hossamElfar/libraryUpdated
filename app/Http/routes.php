<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => ['web']], function () {
    Route::get('Books/rentedBooks','BooksController@rented');
    Route::get('Books/unrent/{id}','BooksController@returnBook');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::resource('Books','BooksController');
    Route::get('Books/rent/{id}','BooksController@rent');
    Route::get('/home', 'userController@profile');
    Route::get('/user/update','userController@edit');
    Route::post('/user/store','userController@store');
    Route::post('/user/status','userController@postStatus');
    Route::get('/', 'BooksController@index');
});
