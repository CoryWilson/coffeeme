<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use App\Favorite;
use App\Reviews;
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

	public function shop($id){
	
		//returns a detailed coffee shop page

		$shopSQL = CoffeeShopSQL::find($id);

		$shopMDB = CoffeeShopMDB::where('id',$id)->first();


		//$reviews = $shopSQL->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);


		// var_dump($reviews);

		return view('pages.coffeeShop', compact('shopSQL'), compact('shopMDB'));//, compact('reviews'));
	}

	public function rate($id){

		//proecesses rating for coffee shop

		$input = array('rating' => Input::get('rating'));
		
		$review = new Review;

		$validator = Validator::make( $input, $review->getCreateRules());

		if ($validator->passes()) {
			$review->storeReviewForProduct($id, $input['rating']);
			return Redirect::to('products/'.$id.'#reviews-anchor')->with('review_posted',true);
		}
		
		return Redirect::to('products/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();

	}

	public function fav($id){

		//processes favoriting for coffee shop

		// $fav = new Favorite;
		// $fav->user_id = Auth::id();
		// $fav->shop_name = $name;
		// $fav->save();

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
