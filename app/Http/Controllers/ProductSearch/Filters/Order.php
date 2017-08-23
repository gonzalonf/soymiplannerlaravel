<?php

namespace App\Http\Controllers\ProductSearch\Filters;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Database\Eloquent\Builder;

class Order implements Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    // IMPORTANTE (nota de gonza):
    // esto no va a funcionar hasta que implementemos los precios como datos numéricos
    // en todo caso el 'a convenir' podríamos representarlo como 0
    {
        switch ($value) {
            case 'mayor':
                return $builder->orderBy('price','desc');
                break;
            case 'menor':
                return $builder->orderBy('price','asc');
                break;
            default:
                return $builder->orderBy('id','desc','name','asc');
                break;
        }
    }
}
