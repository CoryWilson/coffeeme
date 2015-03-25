<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;


class Rating extends Moloquent {

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection = 'coffee_shops';


}
