<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/products';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:15',
            'last_name' => 'required|string|max:15',
            'home' => 'required|string|max:20',
            'phone' => 'required|regex:/^[0-9. -]+$/|max:25',
            'email' => 'required|string|email|max:100|unique:users',
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $request = app('request');

        if($request->hasfile('avatar'))
        {
            $filename = User::count() + 1 . '.' . request()->avatar->extension();
            $request->file('avatar')->storeAs('public/avatar', $filename);
        }

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'home' => $data['home'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);
    }
    
    public function showRegistrationForm()
    {
        $locations =  DB::table('locations')->get();

        return view('auth.register',compact('locations'));
    }
}
