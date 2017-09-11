<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contact;
use App\Event;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Mail;
use App\Mail\ContactUser;


class CartController extends Controller
{
    public function index()
    {
        $events = Auth::user()->event;

        return view('event.index',compact('events'));
    }
    public function create()
    {
        if (session()->has('cart')) {
            $cart = (session()->has('cart')) ? session()->get('cart') : [];
            $products = Product::getAll()->whereIn('products.id',$cart)->get();
        } else {
            $products = [];
        }

        $locations = DB::table('locations')->get();

        if (Auth::check()){

            $events = Auth::user()->event;
        } else {
            $events = [];
        }

        return view('event.create')
        ->with(compact('products','locations','events'));

    }

    public function destroy($id)
    {
        //
    }
    public function edit(Request $request)
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

        return redirect('/event/create');
    }
    public function store(Request $request)
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

       $event = Event::where('user_id',Auth::id())
                ->where('event_name',$eventName)
                ->where('event_date',Event::toDate($day,$month,$year))
                ->where('event_time',Event::toTime($time))
                ->first();

       if ($event==null){
        //    evento no existe.. podes crearlo
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
                $event->contact()->create(['product_id' => $item]);
            }
        }
       } else {
        //    evento existe!
        // comprobar productos
           $eventProducts = $event->contact->pluck('product_id')->toArray() ?: [];
        //  agregar
           foreach ($cartArray as $item) {
               if ( !in_array( $item, $eventProducts) ) {
                   $event->contact()->create(['product_id' => $item]);
               }

           }
       }
//ACA HACE FALTA ARREGLAR Y PONER EL EMAIL DEL USUARIO QUE PUBLICO SI ALGUIEN SABE COMO LLEGAR
       Mail::to(Product::user()->email)->send(new ContactUser());
       session()->forget(['cart','event','dir','city','eventName']);

       return redirect('/event');

    }
}