<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
