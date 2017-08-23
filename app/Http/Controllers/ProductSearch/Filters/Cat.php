<?php

namespace App\Http\Controllers\ProductSearch\Filters;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Database\Eloquent\Builder;

// Cat = Category
class Cat implements Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        return $builder->where(function($query) use($value){
                     return $query->where('category_id',$value)
                     ->orWhere('subcategory_child_of_id',$value);
                     });

    }
}
