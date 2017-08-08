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
        ::select('products.id','name','description','price','category_id','user_seller_id','category_name','products.active','first_name','last_name','home','location_id','subcategory_child_of_id', 'imgName', 'phone_products', 'home_products' , 'address_products', 'subscription')
        ->where('products.active', '=' , 1)
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('users','users.id','=','user_seller_id');
        return $all;
    }

    public static function find($id)
    {
        return self::select('products.id','name','description','price','category_id','user_seller_id','category_name','products.active','first_name','last_name','home','location_id','subcategory_child_of_id')
        ->where('products.active', '=' , 1)
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('users','users.id','=','user_seller_id')
        ->where('products.id',$id)
        ->first();
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_seller_id');
    }
    public function contact()
    {
        return $this->hasMany('App\Contact');
    }
}
