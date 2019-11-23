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
Route::group(['middleware' => ['auth:api', 'checkRole']], function () {
    Route::get('api/robots', 'RobotController@index');
    Route::get('api/robots/{robot}', 'RobotController@show');
    Route::post('api/robots', 'RobotController@store');
    Route::put('api/robots/{robot}', 'RobotController@update');
    Route::patch('api/robots/{robot}', 'RobotController@update');
    Route::delete('api/robots/{robot}', 'RobotController@delete');

});

Route::group(['middleware' => 'auth:api'], function () {
    Route::patch('api/robots/{robot}', 'RobotController@update');

});
Route::post('api/register', 'Auth\RegisterController@register');
Route::post('api/login', 'Auth\LoginController@login')->name('login');
