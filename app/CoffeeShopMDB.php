<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;

class CoffeeShopMDB extends Moloquent {

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection = 'coffee_shops';

}
