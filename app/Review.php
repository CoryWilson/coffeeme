<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;


class Review extends Moloquent {

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	//protected $collection = 'coffee_shops';

 	public function getCreateRules(){
        return array(
            'rating'=>'required|integer|between:1,5'
        );
    }

	public function user(){
		return $this->belongsTo('User');//, 'user_id');
	}

	public function shop(){
		return $this->belongsTo('CoffeeShop');//, 'shop_id');
	}

	public function scopeApproved($query){
		return $query->where('approved', true);
	}

	public function scopeSpam($query){
		return $query->where('spam', true);
	}

	public function scopeNotSpam($query){
		return $query->where('spam', false);
	}

	public function getTimeagoAttribute(){
		$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
	}

	// this function takes in product ID, comment and the rating and attaches the review to the product by its ID, then the average rating for the product is recalculated
	public function storeRatingForShop($shopName, $rating){
		$coffeeShop = CoffeeShop::find($shopName);

		// this will be added when we add user's login functionality
		$this->user_id = Auth::user()->id;
		$this->rating = $rating;
		$shop->reviews()->save($this);

		// recalculate ratings for the specified product
		$coffeeShop->recalculateRating($rating);
	}

}
