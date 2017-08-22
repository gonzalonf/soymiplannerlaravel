<?php

namespace App\Http\Controllers;

use App\Product;
use App\Post;
use App\Http\Controllers\ProductSearch\ProductSearch;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  static public $categories;
  static public $locations;

  public function __construct()
  {
    self::$categories = DB::table('categories')->get();
    self::$locations = DB::table('locations')->get();
  }

  public function index()
  {
    $products = Product::getAll()
    // ->where('user_seller_id','<>',Auth::id())
    ->orderBy('id', 'desc')
    ->paginate(12); // esto me trae un array

    return view('products.index')
    ->with(compact('products'))
    ->with('categories',self::$categories)
    ->with('locations',self::$locations);

  }

  public function filter()
  {

    $products = ProductSearch::apply();

    $products = $products->paginate(12);

    return view('products.index')
    ->with(compact('products'))
    ->with('categories',self::$categories)
    ->with('locations',self::$locations);

  }


  public function create()
  {

    $categories = DB::table('categories')->get();
    return view('products.create',compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd(request()->all());
    $this->validate($request, [
      'name'=>'required|max:30',
      'price'=>'required',
      'description'=>'required',
      'category_id'=>'required',
          // 'image'=>'required|max:1024'
      'phone'=>'required',
      'home'=>'required',
      'address'=>'required',
      'subscription'=>'required'

      ],
      [
      'name.required' => 'El Nombre de la Publicación es obligatorio',
      'price.required' => 'El Precio de la Publicación es obligatorio',
      'description.required' => 'La Descripcion de la Publicación es obligatoria',
      'category_id.required' => 'La Categoria de la Publicación es obligatoria',
      'phone.required' => 'El Teléfono de la Publicación es obligatoria',
      'home.required' => 'La Localidad de la Publicación es obligatoria',
      'address.required' => 'La Dirección de la Publicación es obligatoria',
      'subscription.required' => 'La Suscripción del la Publicación es obligatoria'
      ]
      );
    $product=Product::create([
      'name'=>$request->input('name'),
      'price'=>$request->input('price'),
      'description'=>$request->input('description'),
      'category_id'=>$request->input('category_id'),
      'user_seller_id'=>Auth::id(),
      'phone_products'=>$request->input('phone'),
      'home_products'=>$request->input('home'),
      'address_products'=>$request->input('address'),
      'subscription'=>$request->input('subscription')


      ]);

      if($request->image){

              $nombreImagen = $product->id . /*'.' . str_slug($product->name) .*/ '.' .request()->image->extension();

              request()->image->storeAs('public/product/', $nombreImagen);

              $product->imgName = $nombreImagen;

              $product->save();
      }


    return redirect('/profile/products');
  }


  public function show($id)
  {
    try {
      $product = Product::/*where('user_seller_id','<>',Auth::id())->*/find($id);

      $product->id;

      $comments=Post::where('product_id', $id)->get();

      return view('products.show', compact('product', 'comments'));

    } catch (\Exception $e) {
      abort(404);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $product = Product::find($id);

    return view('products.edit', compact('product','id'));
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
    /*---------UPDATE---------*/
    if($request->has('submit'))
    {
      if($request->hasfile('prod_image'))
      {
        if (!empty(glob('storage/product/'. $id . '.*')[0])){
          File::delete(glob('storage/product/'. $id . '.*')[0]);
        }
        $filename = $id . '.' . request()->prod_image->extension();
        request()->prod_image->storeAs('public/product', $filename);
      }

      $product = Product::find($id);
      $errors = Validator::make($request->all(), [
        'name'=>'max:30',
        'price'=>'max:30',
        'description'=>'max:200',
        'category'=>'min:1',
        ]);

      if ($errors->fails()) {
        return redirect()->back()
        ->withErrors($errors)
        ->withInput();
      } else {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->category_id = $request->get('category_id');
        $product->save();

        return redirect()->back();
      }
    }

    /*---------BORRAR---------*/
    if($request->has('submit2'))
    {
      $inputBaja = $request->get('borrarProducto');
      if($inputBaja == 'ok')
      {
        $product = Product::find($id);
        $product->active = "0";
        $product->save();

        return redirect('profile/products');
      }
    }
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
  public function post(Request $request, $id)
  {
     $this->validate($request, [
      'c'=>'required'
      ]
      ,
      ['c.required'=>'Debe Escribir Un Comentario'
      ]
      );

    $post = Post::create([
      'name'=>Auth::user()->first_name,
      'comment'=>$request->input('c'),
      'product_id'=>Product::find($id)->id,
      'user_id'=>Auth::user()->id


      ]);

    return redirect()->back();




    // $comentario = $request->input('comentario');
    // $usuario_comentador = Auth::user()->id;
    // $id_producto = Product::find($id)->id;
    // var_dump($id_producto);

  }

}
