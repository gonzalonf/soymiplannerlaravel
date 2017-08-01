<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'price', 'description', 'imgName','user_seller_id', 'category_id','location_id'];
    // Public  $timestamps =false;
    public static function getAll()
    {
        $all = self
        ::select('products.id','name','description','price','category_id','user_seller_id','category_name','first_name','last_name','home','location_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('users','users.id','=','user_seller_id');
        return $all;
    }


}
