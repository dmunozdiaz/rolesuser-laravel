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


Route::get('roles',[
		'as' => 'roles',
		'uses' => 'WelcomeController@index'
	]);


Route::get('usuario',[
		'as' => 'usuario',
		'uses' => 'WelcomeController@usuario'
	]);

Route::get('/login', [
	'as' => 'login',
	'uses' => 'WelcomeController@login'
]);

Route::get('/logout',[
	'uses' => 'WelcomeController@logout',
	'as' => 'logout'
]);

Route::controllers([
	'auth'	=>	'Auth\AuthController',
	'password'	=> 'Auth\PasswordController', 
]);