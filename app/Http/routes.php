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
Route::get('/', function(){
	//$results = DB::select('select * from users');
	return view('welcome');//,$results);
});

Route::get('/about', function(){
	return 'About Content Goes Here.';
});

Route::get('/about/directions', function(){
	return 'Directions goes here.';
});

Route::get('/about/{theSubject}', function($theSubject){
	return $theSubject.' Content Goes Here.';
});

Route::get('/about/classes/{theSubject}', function($theSubject){
	return  "Content About {$theSubject} classes Goes Here.";
});