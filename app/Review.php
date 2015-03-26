<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'review';

	public function user(){
		return $this->belongsTo('User');//, 'user_id');
	}

	public function shop(){
		return $this->belongsTo('CoffeeShopSQL');//, 'shop_id');
	}

	// this function takes in product ID, comment and the rating and attaches the review to the product by its ID, then the average rating for the product is recalculated
	public function storeReviewForShop($shopName, $rating){
		$coffeeShop = CoffeeShopSQL::find($shopName);

		// this will be added when we add user's login functionality
		$this->user_id = Auth::user()->id;
		//$this->user_id = Auth::id();
		$this->rating = $rating;
		$shop->reviews()->save($this);

		// recalculate ratings for the specified product
		$coffeeShop->recalculateRating($rating);
	}

}
