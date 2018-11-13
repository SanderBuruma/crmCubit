<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

	public function customers(){
		return $this->belongsTo('App\Customers');
	}

	public function products(){
		return $this->belongsTo('App\Products');
	}

}
