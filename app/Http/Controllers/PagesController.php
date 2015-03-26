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

		$coords = DB::collection('coordinates')->get();
		$coordinates = $coords[0];
        
        $strLat = $coordinates['lat'];
        $numLat = (float)$strLat;
       
       	$strLng = $coordinates['lng'];
       	$numLng = (float)$strLng;


		$shops = CoffeeShop::whereRaw(array('location'=>array('$near'=>array($numLat,$numLng))))->get();
			
		return view('pages.home', compact('coordinates'), compact('shops'));
	}

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

	public function shop($name){
	
		//$shop = CoffeeShop::where('name',$name)->first();

		$shop = CoffeeShop::where('name',$name)->first();

		//$reviews = $shop->reviews()->with('user');

		return view('pages.coffeeShop', compact('shop'));//, compact('reviews'));
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

	// public function favShop($shop){

	// 	DB::collection('users')->update(
	// 			array('favorites'=>array('shop_id'=>$shop['_id']))
	// 		);

	// }

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
