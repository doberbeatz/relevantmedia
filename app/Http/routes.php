<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Auth'], function () {
    // Logout
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);
    // Login page
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
    Route::post('/login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
    // Registration page
    Route::get('/register', ['as' => 'register', 'uses' => 'AuthController@getRegister']);
    Route::post('/register', [
        'as' => 'register', 'uses' => 'AuthController@postRegister',
        'middleware' => 'captcha',
    ]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);
});
