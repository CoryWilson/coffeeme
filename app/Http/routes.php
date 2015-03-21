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
Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/test', 'PagesController@test');

Route::get('/register', 'UserController@register');

Route::get('/login', 'UserController@login');

Route::post('/store', 'UserController@store');