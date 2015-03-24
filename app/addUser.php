<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;

class addUser extends Moloquent {

	Schema::create('users', function($table){

		$table->increments('id');

	});

}
