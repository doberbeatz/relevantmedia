<?php

Route::get('/', ['as' => 'index', 'uses' => 'JobsController@index']);

Route::group(['namespace' => 'Auth'], function () {
    // Logout
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);
    // Login page
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
    Route::post('/login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
    // Registration page
    Route::get('/register', ['as' => 'register', 'uses' => 'AuthController@getRegister']);
    Route::post('/register', [
        'as'         => 'register',
        'uses'       => 'AuthController@postRegister',
        'middleware' => 'captcha',
    ]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);

    Route::group(['middleware' => 'admin'], function(){
        Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
            Route::get('/all', ['as' => 'all', 'uses' => 'AdminController@all']);
        });
        Route::get('jobs/{job_id}/activate', ['as' => 'jobs.activate', 'uses' => 'JobsController@activate']);
    });

    Route::get('jobs/{job_id}/visible', ['as' => 'jobs.visible.toggle', 'uses' => 'JobsController@toggleVisible']);
    Route::resource('jobs', 'JobsController');

});
