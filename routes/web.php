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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/comments', 'as' => 'comments.'], function(){
    Route::get('/', 'CommentController@index');
    Route::get('/{comment}', 'CommentController@show');
    Route::patch('/{comment}', 'CommentController@update');
});
