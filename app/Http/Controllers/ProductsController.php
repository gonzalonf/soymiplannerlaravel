<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public $categories;

    public function __construct()
    {
        $this->categories = DB::table('categories')
        // ->where('subcategory_child_of_id',null)
        ->get();
    }

    public function index()
    {
        $categories=$this->categories;
        $products = Product::orderBy('id', 'desc')->paginate(12); // esto me trae un array

        return view('products.index', compact('products','categories'));
    }

    public function filter()
    {
        $categories=$this->categories;

        $search = trim(request()->q);

        $products =
        Product::select('products.id','name','description','price','category_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')


        // search
        ->where(function($query) use ($search){
                           return $query
                           ->where('name','like', '%'.$search.'%')
                           ->orWhere('category_name','like','%'.$search.'%')
                           ->orWhere('description','like','%'.$search.'%');
              });

        // filter
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



        $products=$products->paginate(12);
        return view('products.index', compact('products','categories'));

    }


    public function create()
    {

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:30',
            'price'=>'required',
            'description'=>'required',
            'category'=>'required'
            // 'image'=>'required|max:1024'
            ]);
        $product=Product::create([
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category'),
            'user_seller_id'=>Auth::id()

            ]);

        $nombreImagen=$product->id . '.' . str_slug($product->name) . '.' .request()->image->extension();

        request()->image->storeAs('public', $nombreImagen);

        $product->imgName = $nombreImagen;

        $product->save();

        return view('/profile');

    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
