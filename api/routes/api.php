<?php

Route::group(['middleware' => ['auth:api', 'checkRole']], function () {
    Route::get('/robots', 'RobotController@index');
    Route::get('/robots/{robot}', 'RobotController@show');
    Route::post('/robots', 'RobotController@store');
    Route::put('/robots/{robot}', 'RobotController@update');
    Route::patch('/robots/{robot}', 'RobotController@update');
    Route::delete('/robots/{robot}', 'RobotController@delete');

});

Route::group(['middleware' => 'auth:api'], function () {
    Route::patch('/robots/{robot}', 'RobotController@update');

});
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login')->name('login');

