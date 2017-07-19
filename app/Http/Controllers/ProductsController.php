<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // no ponemos paginación?
        $products = Product::all(); // esto me trae un array
        return view('products.index', compact('products'));
    }

    public function search()
    {
        $search = request()->q;
        $category =

        $products = Product::orderBy('id','desc')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->where('name','like','%'.$search.'%')
        ->orWhere('category_name','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->select('products.id','name','description','price')
        ->paginate(15);

        if ($products->count()===0) {
            $error = "Lo sentimos, no pudimos encontrar '$search' en nuestra base de datos...";
            return view('products.index', compact('products','error'));
        }
        // después sigo complejizando con joins y optimización... por lo pronto..
        // funciona! muajaja

        return view('products.index', compact('products'));

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
            'category_id'=>$request->input('category')

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
