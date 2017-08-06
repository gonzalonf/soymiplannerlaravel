<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contact;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart') ?? [];
            $products = Product::getAll()->whereIn('products.id',$cart)->get();
        } else {
            $products = [];
        }

        $locations = DB::table('locations')->get();


        return view('event.index')
        ->with(compact('products','locations'));

    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function add(Request $request)
    {

        $cart = session()->get('cart') ?? [];

        if (isset($request->add) && !in_array($request->add,$cart)){

            session()->push('cart',$request->add);
        }

        if (isset($request->city)){
            if ($request->city!=''){
                session()->put('city',$request->city);
                if ($request->dir!='' ){
                    session()->put('dir',$request->dir);
                }
            }
        }
        if (isset($request->name) && trim($request->name)!=''){
            session()->put('eventName',$request->name);
        }
        if (isset($request->time)) {

            session()->put('event.day',$request->day);
            session()->put('event.month',$request->month);
            session()->put('event.year',$request->year);
            session()->put('event.time',$request->time);

        }


        return redirect('/event');
    }
    public function remove(Request $request)
    {
        if ($request->rem){
            $cartArray = session()->get('cart');
            session()->forget('cart');
            foreach ($cartArray as $item) {
                if ($item !== $request->rem) {
                    session()->push('cart',$item);
                }
            }
        } elseif ($request->remLoc) {
            session()->forget('city');
            session()->forget('dir');
        }  elseif ($request->remDate) {
            session()->forget('event.day');
            session()->forget('event.month');
            session()->forget('event.year');
            session()->forget('event.time');
        }

        return redirect('/event');
    }
    public function checkout()
    {
        var_dump(session()->get('cart'));
        var_dump(session()->get('city'));
        var_dump(session()->get('dir'));
        var_dump(session()->get('event'));

        var_dump(request()->checkout);
    }
}
