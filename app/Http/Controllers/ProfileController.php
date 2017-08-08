<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\DB;

use App\Product;
use App\User;
use App\Contact;


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

        /*---------UPDATE---------*/
        if($request->has('submit'))
        {
            if($request->hasfile('avatar'))
            {
                if (!empty(glob('storage/avatar/'. $id . '.*')[0])){
                    File::delete(glob('storage/avatar/'. $id . '.*')[0]);
                }
                $filename = $id . '.' . request()->avatar->extension();
                request()->avatar->storeAs('public/avatar', $filename);
            }

            $user = User::find($id);
            $errors = Validator::make($request->all(), [
                'first_name' => 'required|string|max:15',
                'last_name' => 'required|string|max:15',
                'home' => 'required|string|max:20',
                'phone' => 'required|regex:/^[0-9. -]+$/|max:25',
                'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
                'password' => 'required|string|min:6|confirmed',
                ],
                [
                'first_name.required' => 'El campo nombre es obligatorio.',
                'first_name.max:15' => 'El campo nombre debe contener 15 caracteres como máximo.',
                'last_name.required' => 'El campo apellido es obligatorio.',
                'last_name.max:15' => 'El campo apellido debe contener 15 caracteres como máximo.',
                'home.required' => 'El campo seleccionar zona es obligatorio.',
                'phone.required' => 'El campo teléfono es obigatorio.',
                'phone.regex' => 'El campo teléfono solo puede contener números y lineas.',
                ]
                );

            if ($errors->fails()) {
                return redirect('/profile')
                ->withErrors($errors)
                ->withInput();
            } else {
                $user = User::find($id);
                $user->first_name = $request->get('first_name');
                $user->last_name = $request->get('last_name');
                $user->home = $request->get('home');
                $user->phone = $request->get('phone');
                $user->email = $request->get('email');
                if ($request->get('password') != $user->password ) {
                    $user->password = bcrypt($request->get('password'));
                }
                $user->save();
                return redirect('/profile');
            }
        }
        /*---------BAJA---------*/
        if($request->has('submit2'))
        {
            $inputBaja = $request->get('borrarUsuario');
            if($inputBaja == 'ok')
            {
                $user = User::find($id);
                $user->active = "0";
                $user->save();

                $products=Product::where('user_seller_id', '=', $id)
                ->update(array('active' => '0'));

                // ->get();
                // $products->active = "0";
                // $products->save(); // mir: como el save me tiraba error, lo hice con update

                Auth::logout();

                return redirect('/');
            }
        }
    }

    public function showRegistrationForm2()
    {
        $locations =  DB::table('locations')->get();

        return view('/profile', compact('locations'));
    }

    public function products()
    {
        $id = Auth::User()->id;
        $products = Product::orderBy('id','desc')
        ->where('user_seller_id',$id)
        ->where('products.active', '=' , 1) // mir: lo fitre local, pq aca no se usa la funcion filtrada getall()
        ->paginate(20);

        $error = '';
        if ($products->count()===0) {
            $error = 'No hay productos publicados';
        }

        return view('profile.products', compact('products','error'));
    }



    public function show($id)
    {
        try {
            $user = User::find($id);
            $username = $user->first_name.' '.$user->last_name;
            echo 'Perfil público del usuario <b>$username</b> <br>';
            echo 'Mostrar otros productos, reputación, etc...<br><br>';
            $products=Product::getAll()->where('user_seller_id',$id)->get();
            echo 'sus productos...<br>';
            echo '<ul>';
            foreach ($products as $value) {
                echo '<li>'.$value->name.'</li><br>';
            }
            echo '</ul>';

        } catch (\Exception $e) {

            abort(404);
        }
    }

}
