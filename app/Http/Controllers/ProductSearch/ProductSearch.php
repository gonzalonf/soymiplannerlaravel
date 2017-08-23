<?php

namespace App\Http\Controllers\ProductSearch;

use App\Http\Controllers\ProductSearch\Filters;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Support\Facades\Auth;
use App\Product;

class ProductSearch
{
    public static function apply(Request $filters)
    {
        $query = static::applyFilters( $filters, Product::getAll() );
        return $query;
    }

    private static function applyFilters(Request $request, Builder $query)
    {
      foreach ($request->all() as $filterName => $value) {
          $decorator = static::createFilterDecorator($filterName);
          if (static::isValidDecorator($decorator)) {
              $query = $decorator::apply($query, $value);
          }
    }
      return $query;
    }

    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Filters\\' . studly_case($name);
    }
    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

}
