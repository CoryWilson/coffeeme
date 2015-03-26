<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

	protected $table = 'favorites';

	protected $guarded = ['user_id', 'shop_name'];

}

