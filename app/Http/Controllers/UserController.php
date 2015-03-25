<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

//use Illuminate\Http\Request;

use Request;

class UserController extends Controller {

	public function register(){

		//returns register form view
		return view('forms.register');

	}

	public function processRegister(){
		//insert user into mongoDB
	}

	public function login(){

		//returns login form view
		return view('forms.login');
	}

	public function processLogin(){

		//validates user credentials and logs in

	}

	public function logout(){
		
		//logs user out
		session_destroy();

	}

	//add user to database
	// public function store(){

	// 	$email = Request::get('email');
	// 	$name = Request::get('name');
	// 	$password = Request::get('password');

	// 	$user = new User;
	// 	$user->email = $email;
	// 	$user->name = $name;
	// 	$user->password = $password;
	// 	$user->save();

	// 	return $user;

	// }
	

}
