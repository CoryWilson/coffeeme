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

/*** Index Routes ***/

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/favorites', 'PagesController@favorites');

Route::get('/test', 'PagesController@test');


/*** User Register, User Login, User Logout ***/

Route::get('/register', 'UserController@register');

Route::post('/processRegister', 'UserController@processRegister');

Route::get('/login', 'UserController@login');

Route::post('/processLogin', 'UserController@processLogin');

Route::get('logout', 'UserController@logout');

Route::post('/store', 'UserController@store');

Route::controllers([

	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

]);


/***  Geolocation Stuff ***/

Route::get('/coordinates', function(){

	$jsonData = Input::all();

	//$data = json_decode($jsonData);

	if(Request::ajax()){
		var_dump($jsonData);
	}

});