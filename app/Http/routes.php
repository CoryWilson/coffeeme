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

Route::get('/shop/{name}', 'PagesController@shop');

Route::post('/shop/{name}', array('before'=>'csrf'), 'PagesController@rate');

Route::post('/favShop', 'PagesController@favShop');

Route::get('/profile', 'PagesController@profile');

Route::get('/favorites', 'PagesController@favorites');



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

Route::post('/coordinates', function(){

	if(Request::ajax()){
		//var_dump(Input::all());
		$coords = Input::get();
		$lat = $coords['lat'];
		$lng = $coords['lng'];
		DB::collection('coordinates')->update(
		    ['lat' => $lat, 'lng' => $lng, 'location' => [$lat,$lng]]
		);
		return 'We Dun Ajaxed It';
	}

});