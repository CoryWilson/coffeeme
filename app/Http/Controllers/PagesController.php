<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use App\Favorite;
use App\Rating;
use App\CoffeeShop;
use App\CoffeeShopSQL;

use Illuminate\Http\Request;

class PagesController extends Controller {


	public function index(){

		//get shops near user location using mongodb

		$coords = DB::connection('mongodb')->collection('coordinates')->get();
		$coordinates = $coords[0];
        
        $strLat = $coordinates['lat'];
        $numLat = (float)$strLat;
       
       	$strLng = $coordinates['lng'];
       	$numLng = (float)$strLng;


		$shops = CoffeeShop::on('mongodb')->whereRaw(array('location'=>array('$near'=>array($numLat,$numLng))))->get();
			
		return view('pages.home', compact('coordinates'), compact('shops'));
	}

	public function shop($name){
	
		$shop = CoffeeShopSQL::where('name',$name)->get();

		$shopSQL = $shop[0];

		$shopMDB = CoffeeShop::where('name',$name)->first();

		//$reviews = $shop->reviews()->with('user');

		return view('pages.coffeeShop', compact('shopSQL'), compact('shopMDB'));//, compact('reviews'));
	}

	public function rate($name){

		$input = array('rating' => Input::get('rating'));
		
		$review = new Review;

		//$validator = Validator::make($input,$review->getCreateRules());

		//if($validator->passes()){
		$review->storeRatingForShop($name, $input['rating']);
		return Redirect::to('/shop/'.$name);
		//}

		//return Redirect::to('/shop/'.$name)->with('review_posted',true);

	}

	public function fav($name){

		$fav = new Favorite;
		$fav->user_id = Auth::id();
		$fav->shop_name = $name;
		$fav->save();

	}

	public function favDrink($id){

		// $fav = new Favorite;
		// $fav->user_id = Auth::id();
		// $fav->shop_id = $id;
		// $fav->save();

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
