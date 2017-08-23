<?php

namespace App\Http\Controllers\ProductSearch;

use App\Http\Controllers\ProductSearch\Filters;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use App\Product;

class ProductSearch
{
    public static function apply(Request $filters)
    {

        $products = Product::getAll();
        //   ->where('user_seller_id','<>',Auth::id())


          // search
          if ($filters->has('search')) {
              $products = Filters\Search::apply($products,$filters->input('search'));
          }
        // ->where(function($query){
        //  $search = trim($filters->q);
        //  return $query
        //  ->where('name','like', '%'.$search.'%')
        //  ->orWhere('category_name','like','%'.$search.'%')
        //  ->orWhere('description','like','%'.$search.'%');
        //  });

        return $products;

    }


}



















