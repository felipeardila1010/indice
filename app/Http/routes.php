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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::post('home', 'HomeController@post',['as' => 'home']);

Route::controller('home', 'HomeController', [
    'getIndex'	=> 'index',
	'postIndex'	=> 'index',
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
]);

