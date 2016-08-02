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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Auth'], function(){
    // Login page
    Route::get('/login', ['as'=>'login', 'uses'=>'AuthController@getLogin']);
    Route::post('/login', ['as'=>'login', 'uses'=>'AuthController@postLogin']);
    // Registration page
    Route::get('/register', ['as'=>'register', 'uses'=>'AuthController@getRegister']);
    Route::post('/register', ['as'=>'register', 'uses'=>'AuthController@postRegister']);
});
