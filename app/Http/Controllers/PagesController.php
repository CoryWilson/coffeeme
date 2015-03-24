<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function index(){

		$name = "Home Page";

		$lessons = ["my first lesson", "my second lesson", "my third lesson"];

		return view('pages.home', compact('name'), compact('lessons'));
	}

	public function about(){

		//$users = DB::collection('users')->get();

		$user = DB::collection('users')->where('name','cory')->first();

		var_dump($user);

		return view('pages.about');
	}

}
