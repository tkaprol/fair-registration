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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');
Route::get('json/expos', 'JsonExposController@index');
Route::get('json/halls/{id}', 'JsonExpoHallsController@index');
Route::post('halls', 'ExpoHallsController@index');
Route::get('halls/book/{id}', 'ExpoHallsBookController@index');
Route::post('halls/book', 'ExpoHallsBookController@create');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
