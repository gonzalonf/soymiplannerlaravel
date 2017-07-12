<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;

	public function getName()
	{
		return $this->prod_name;
	}

}
