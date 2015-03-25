<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;

use Illuminate\Http\Request;

class PagesController extends Controller {


	public function index(){

		$name = "Coffee Me";

		//return \Auth::user();

		//get shops near user location

		echo Config::get('local/coords.coordinates_key');

		$shops = DB::collection('coffee_shops')->get();

		return view('pages.home', compact('name'), compact('shops'));
	}

	public function coffeeShop(){

		//show coffee shop details
		//get coffee shop info in coffee_shops where coffee shop name = coffee shop

		//if logged in show rating, favoriting abilities
		//else show aggregate rating and aggregate favorite drink

		redirect('/');
	}

	public function profile(){
		//show user profile
		//get user info in users where username = username

		//if logged in send user to page
		//else redirect to log in

		redirect('/');
	}

	public function favorites(){

		//if logged in return favorites list
		//else redirect to log in telling them to log in for that feature

		$name = "Coffee Me";

		

		if (Auth::guest()){
			redirect('/');
		}
		else{
			$shops = DB::collection('coffee_shops')->get();
			return view('pages.favorites', compact('name'), compact('shops'));
		}


	}

}
