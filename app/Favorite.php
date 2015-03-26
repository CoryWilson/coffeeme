<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

	protected $table = 'favorites';

	// protected $guarded = ['user_id', 'shop_name'];
	// public function addFavorite($user_id,$shop_id){

	// 	$favorite = DB::table('favorites')->insert(
	// 		array('user_id' = Auth:id())
	// 	)

	// }

}

