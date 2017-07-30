<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;


class ProfileController extends Controller
{
    // protected $id;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
    public function show($id)
    {

        try {
            $user = User::find($id);
            $username = $user->first_name.' '.$user->last_name;
            echo "Perfil público del usuario <b>$username</b> <br>";
            echo "Mostrar otros productos, reputación, etc...<br><br>";
            $products=Product::getAll()->where('user_seller_id',$id)->get();
            echo "sus productos...<br>";
            echo "<ul>";
            foreach ($products as $value) {
                echo "<li>".$value->name."</li><br>";
            }
            echo "</ul>";

        } catch (\Exception $e) {

            abort(404);
        }


    }
}
