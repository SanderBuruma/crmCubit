<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

	public function orders(){
		return $this->hasMany('App\Orders');
	}

}