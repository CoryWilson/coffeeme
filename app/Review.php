<?php namespace App;

//use App\Auth;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';

    /*public function getCreateRules()
    {
        return array(
            'rating'=>'required|integer|between:1,5'
        );
    }*/

    // Relationships
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function coffeeShop(){
        return $this->belongsTo('App\CoffeeShopSQL');
    }

    /*public function scopeApproved($query){
        return $query->where('approved', true);
    }

    public function scopeSpam($query){
        return $query->where('spam', true);
    }

    public function scopeNotSpam($query){
        return $query->where('spam', false);
    }*/

    public function getTimeagoAttribute(){
        $date = CarbonCarbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        return $date;
    }

    // this function takes in shop_id, comment and the rating and attaches the review to the coffee shop by its ID, then the average rating for the coffee shop is recalculated
    public function storeReviewForCoffeeShop($shop_id, $rating){
        $coffeeShop = CoffeeShopSQL::find($shop_id);        
        $this->shop_id = $shop_id;
        //$this->user_id = Auth::id(); //Auth::user()->id;
        $this->rating = $rating;
        $coffeeShop->reviews()->save($this);
        // recalculate ratings for the specified shop
        $coffeeShop->recalculateRating($rating);
    }

}
