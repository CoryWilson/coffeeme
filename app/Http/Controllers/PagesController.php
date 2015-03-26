<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use App\Favorite;
use App\Review;
use App\CoffeeShopMDB;
use App\CoffeeShopSQL;

//use Illuminate\Http\Request;
use Request;
use Redirect;

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

		$rating = DB::table('reviews')
					->where('shop_id',$id)
					->avg('rating');

		$data = array(
				'shopSQL' => $shopSQL,
				'shopMDB' => $shopMDB,
				'rating' => $rating
			);
		
		return view('pages.coffeeShop', compact('data'));
	}

	public function rate($id){

		//proecesses rating for coffee shop
		$input = Request::all();
		
		$review = new Review;

		//$validator = Validator::make( $input['rating'], $review->getCreateRules());
		//if ($validator->passes()) {
		$review->storeReviewForCoffeeShop($id, $input['rating']);
		return Redirect::to('shop/'.$id)->with('review_posted',true);
		//}

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
