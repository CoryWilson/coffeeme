<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class CoffeeShopSQL extends Model {

	protected $table = 'coffee_shops';

	public function reviews(){
        return $this->hasOne('App\Review');
    }

    public function recalculateRating(){
		$reviews = $this->reviews();
		$avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating,1);
		$this->rating_count = $reviews->count();
		$this->save();
	}

}
