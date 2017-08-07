<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contact;
use App\Event;


use Illuminate\Support\Facades\Auth;
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
            $cart = (session()->has('cart')) ? session()->get('cart') : [];
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

         $cart = (session()->has('cart')) ? session()->get('cart') : [];

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
    public function checkout(Request $request)
    {
        // ojo validar
       $cartArray = session()->get('cart');
       $city = session()->get('city');
       $dir = session()->get('dir');
       $day = session()->get('event.day');
       $month = session()->get('event.month');
       $year = session()->get('event.year');
       $time = session()->get('event.time');
       $eventName = (session()->get('eventName'))?:'Mi Evento';

       $event = Event::where('user_id',Auth::id())->first();

       if ($event==null){
           echo 'evento no existe.. podes crearlo';
           if ($time!=null && $city!=null && $cartArray!=null) {
                echo "campos llenos, es viable crear";
                $event = Event::create([
                 'event_name' => $eventName,
                 'event_date'=> Event::toDate($day,$month,$year),
                 'event_time' => Event::toTime($time),
                 'event_location_id' => $city,
                 'event_dir' => $dir,
                 'user_id' => Auth::id()
             ]);

            foreach ($cartArray as $item) {
                $event->contact()->create([
                    'product_id' => $item
                ]);
            }
        }
       } else {
           echo 'evento existe! hacer update del mismo';
           var_dump($event);
           foreach ($cartArray as $item) {
               $event->contact()->create([
                   'product_id' => $item
               ]);
           }
       }


    //    return redirect('/event');


    }
}
