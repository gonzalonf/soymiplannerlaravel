<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Product extends Model
{
    
	protected $guarded = ['id'];
    public static function getAll()
    {
        $all = self
        ::select('products.id','name','description','price','category_id','user_seller_id','category_name','first_name','last_name','home','location_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('users','users.id','=','user_seller_id');
        return $all;
    }
    public static function find($id)
    {
        return self::select('products.id','name','description','price','category_id','user_seller_id','category_name','first_name','last_name','home','location_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('users','users.id','=','user_seller_id')
        ->where('products.id',$id)
        ->first();
    }
}
