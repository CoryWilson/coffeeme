<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function index(){

		$name = "Coffee Me";

		$shops = DB::collection('coffee_shops')->get();

		return view('pages.home', compact('name'), compact('shops'));
	}

	public function about(){

		//$users = DB::collection('users')->get();

		$user = DB::collection('users')->where('name','cory')->first();


		return view('pages.about');
	}

}
