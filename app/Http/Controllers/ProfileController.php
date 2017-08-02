<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $user = User::find($id);

        return view('profile.edit', compact('user','id'));
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
        $user = User::find($id);
        $errors = Validator::make($request->all(), [
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'home' => 'required|string|max:50',
            // 'phone' => 'required|numeric|max:25',
            'email' => 'required|string|email|max:50|unique:users,email,'.$user->id,
            'password' => 'required|string|min:6|confirmed',
            ]);

        if ($errors->fails()) {
            return redirect('/profile')
            ->withErrors($errors)
            ->withInput();
        } else {
            $user = User::find($id);
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->home = $request->get('home');
            // $user->phone = $request->get('phone');
            $user->email = $request->get('email');
            if ($request->get('password') != '' ) {
                $user->password = bcrypt($request->get('password'));
            }
            $user->save();
            return redirect('/profile');
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
        $user = User::find($id);
        $user->delete();

        return redirect('/profile');
    }

    public function products()
    {

        $id = Auth::User()->id;
        $products = Product::orderBy('id','desc')->where('user_seller_id',$id)->paginate(20);

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
