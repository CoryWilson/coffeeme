<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use App\Rating;
use App\CoffeeShop;

use Illuminate\Http\Request;

class PagesController extends Controller {


	public function index(){

		//return \Auth::user();

		//get shops near user location

		//echo Config::get('local/coords.coordinates_key');

		
		//$shops = DB::collection('coffee_shops')->get();


		//db.coffee_shops.find({location:{$near:[28.7216012,-85.38935769999999]}})
		// $shops = DB::collection('coffee_shops')->raw(function($collection)
		// {
		$coords = DB::collection('coordinates')->get();
		$coordinates = $coords[0];
        
        $strLat = $coordinates['lat'];
        $numLat = (float)$strLat;
       
       	$strLng = $coordinates['lng'];
       	$numLng = (float)$strLng;

        //$coordinates["lat"],$coordinates["lng"]

		$shops = CoffeeShop::whereRaw(array('location'=>array('$near'=>array($numLat,$numLng))))->get();
			

		// $shops = CoffeeShop::raw(function($collection)
		// {

		//  	$coords = DB::collection('coordinates')->get();
		//  	$coordinates = $coords[0];

		//  	$query = $collection->find(array('location' => array('$near' => array($coordinates["lat"],$coordinates["lng"]))));

		// 	return $query;		

		// });

		//var_dump($shops);


		return view('pages.home', compact('coordinates'), compact('shops'));
	}

	// public function coffeeShop($name){

	// 	//show coffee shop details
	// 	//get coffee shop info in coffee_shops where coffee shop name = coffee shop

	// 	//if logged in show rating, favoriting abilities
	// 	//else show aggregate rating and aggregate favorite drink

	// 	$shops = DB::collection('coffee_shops')->where('name', $name)->first();

	// 	public function rating(){


	// 	$shops->

	// 	// 	$coffeeShop = CoffeeShop::first();
	// 	// 	$coffeeShop->rating = array('user_id':'ObjectId("'.Auth::id().'")','rating':'8');
	// 	// 	$coffeeShop->save();

	// 	// 	var_dump($coffeeShop);

	// 	}

	// 	return view('pages.coffeeShop', compact('shops'));
	// }

	public function profile(){
		//show user profile
		//get user info in users where username = username

		//if logged in send user to page
		//else redirect to log in
		if (Auth::guest()){
			return redirect('/auth/login');
		}
		else {
			return view('pages.profile');
		}
		
	}

	public function favorites(){

		//if logged in return favorites list
		//else redirect to log in telling them to log in for that feature

		$name = "Coffee Me";

		if (Auth::guest()){
			return redirect('/auth/login');
		}
		else {
			$coords = DB::collection('coordinates')->get();
			$coordinates = $coords[0];
			$shops = DB::collection('coffee_shops')->get();
			return view('pages.favorites', compact('coordinates'), compact('shops'));
		}


	}

	// public function rate() {
	// 	$rating = new Rating;
	// 	$rating->value = 1-10;
	// 	$rating->save();
	// }

}
