<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Product;


class ProfileController extends Controller
{
    // protected $id;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function products()
    {

        $id = Auth::User()->id;
        $products = Product::orderBy('id','desc')->where('id',$id)->paginate(20);

        $error = '';
        if ($products->count()===0) {
            $error = "No hay productos publicados";
        }

        return view('profile.products', compact('products','error'));
    }

    public function sales()
    {
        return view('profile/sales');
    }
}
