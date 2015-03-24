<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

//use Illuminate\Http\Request;

use Request;

class UserController extends Controller {

	public function register(){

		return view('forms.register');

	}

	//add user to database
	public function store(){

		$email = Request::get('email');
		$name = Request::get('name');
		$password = Request::get('password');

		$user = new User;
		$user->email = $email;
		$user->name = $name;
		$user->password = $password;
		$user->save();

		return $user;

	}

	//validate user
	public function login(){
		return view('forms.login');
	}

}
