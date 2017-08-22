<?php

namespace App\Http\Controllers\ProductSearch;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Product;

class ProductSearch
{
    public static function apply()
    {
        $search = trim(request()->q);

        $products = Product::getAll()
        //   ->where('user_seller_id','<>',Auth::id())


          // search
        ->where(function($query) use ($search){
         return $query
         ->where('name','like', '%'.$search.'%')
         ->orWhere('category_name','like','%'.$search.'%')
         ->orWhere('description','like','%'.$search.'%');
       });

          // filter
        if (isset(request()->city) && is_numeric(request()->city) ) {
         $products=$products->where('location_id',request()->city);
        }

        if (isset(request()->cat) && is_numeric(request()->cat) ) {
          $products=$products->where('category_id',request()->cat)
          ->orWhere('subcategory_child_of_id',request()->cat);

        }


          // order
        switch (request()->order) {
          case 'mayor':
          $products=$products->orderBy('price','desc');
          break;
          case 'menor':
          $products=$products->orderBy('price','asc');
          break;
          default:
          $products=$products->orderBy('id','desc','name','asc');
          break;
        }

        return $products;


    }
}



















