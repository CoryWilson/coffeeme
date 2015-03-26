<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use App\Favorite;
use App\Review;
use App\CoffeeShopMDB;
use App\CoffeeShopSQL;

use Illuminate\Http\Request;

class PagesController extends Controller {


	public function index(){

		//gets coffee shops near user location using mongodb

		$coords = DB::connection('mongodb')->collection('coordinates')->get();
		$coordinates = $coords[0];
        
        $strLat = $coordinates['lat'];
        $numLat = (float)$strLat;
       
       	$strLng = $coordinates['lng'];
       	$numLng = (float)$strLng;


		$shops = CoffeeShopMDB::on('mongodb')->whereRaw(array('location'=>array('$near'=>array($numLat,$numLng))))->get();
			
		return view('pages.home', compact('coordinates'), compact('shops'));
	}

	public function shop($name){
	
		//returns a detailed coffee shop page

		$shop = CoffeeShopSQL::where('name',$name)->get();

		$shopSQL = $shop[0];

		$shopMDB = CoffeeShopMDB::where('name',$name)->first();

		//$reviews = $shopSQL->reviews();

		//var_dump($reviews);

		return view('pages.coffeeShop', compact('shopSQL'), compact('shopMDB'));//, compact('reviews'));
	}

	public function rate($name){

		//proecesses rating for coffee shop

		$input = array('rating' => Input::get('rating'));
		
		$review = new Review();

		$review->storeReviewForShop($name, $input['rating']);

		return Redirect::to('/shop/'.$name);

	}

	public function fav($name){

		//processes favoriting for coffee shop

		$fav = new Favorite();
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

		if (Auth::guest()){
			return redirect('/auth/login');
		}
		else {
			$favorites = DB::table('favorites')->where('user_id',Auth::id())->get();
			var_dump($favorites);
			return view('pages.favorites', compact('coordinates'), compact('shops'));
		}


	}

	// public function rate() {
	// 	$rating = new Rating;
	// 	$rating->value = 1-10;
	// 	$rating->save();
	// }

}
