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
		$username = Request::get('username');
		$password = Request::get('password');

		return $email.' '.$username.' '.$password;

	}

	//validate user
	public function login(){
		return view('forms.login');
	}

}
