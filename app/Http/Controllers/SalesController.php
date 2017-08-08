<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Contact;
use App\Sale;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // recupero array con id de mis productos
        $productsId = Auth::User()
                    ->product
                    ->where('products.active','1')
                    ->pluck('id')
                    ->toArray();

        // buscando contactos en espera que contengan mi producto
        $contacts = Contact::whereIn('product_id',$productsId)
                    ->where('user_seller_OK',0)
                    ->get();

        // compras en espera
        $buyer_contacts = Contact::select('first_name','last_name','name','event_date','event_time')
                        ->join('events','event_id','=','events.id')
                        ->join('users','user_id','=','users.id')
                        ->join('products','products.id','=','contacts.product_id')
                        ->where('user_id',Auth::id())
                        ->where('user_seller_OK',0)
                        ->get();




        // recuperando ventas del usuario
        $sales = Sale::select('item_name','item_description','first_name','last_name','price','event_date')
                ->join('users','users.id','=','user_buyer_id')
                ->where('user_seller_id',Auth::id())
                ->where('seller_concreted',0)
                ->get();

        $buyer_sales = Sale::select('item_name','item_description','first_name','last_name','price','event_date')
                ->join('users','users.id','=','user_seller_id')
                ->where('user_buyer_id',Auth::id())
                ->where('seller_concreted',0)
                ->get();


        return view('profile/sales',compact('contacts','sales','buyer_sales','buyer_contacts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        if (isset($request->add)) {
            echo 'hola';
            $contact=Contact::find($request->add);
            if ($contact) {
                $contact->user_seller_OK = 1;
                $contact->save();

                $product=$contact->product;

                Sale::create([
                    'item_name'=>$product->name,
                    'item_description'=>$product->description,
                    'price'=>$product->price,
                    'product_id'=>$product->id,
                    'user_buyer_id'=>$contact->event->user->id,
                    'user_seller_id'=> Auth::id(),
                    'event_date'=> $contact->event->event_date.' '.$contact->event->event_time,
                    'buyer_concreted'=>0,
                    'seller_concreted'=>0,
                ]);
            }
        }
        if (isset($request->deny)) {
            echo 'hola';
            $contact=Contact::find($request->deny);
            if ($contact) {
                $contact->user_seller_OK = 2;
                $contact->save();
            }
        }
        return redirect('/profile/sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
