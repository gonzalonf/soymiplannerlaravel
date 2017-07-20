<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'price', 'description', 'imgName','user_seller_id', 'category_id'];
    // Public  $timestamps =false;


}
