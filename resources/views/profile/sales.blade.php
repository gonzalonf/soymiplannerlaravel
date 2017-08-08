<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mis Transacciones</title>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="favicon" href="images/favicon.png">

</head>
<body>
    @include('partials/nav')

    <div class='crear-cuenta' style="margin-bottom: 30px;">
       <h1 class="titulo_seccion">MIS VENTAS</h1>
       <hr>
   </div><br>
   @if ($sales->count() > 0)
       <ul>
           @foreach ($buyer_sales as $sale)
               <li>
                   <div class="">
                       <mark>
                           {{$sale->event_date}}
                       </mark>
                       <h3>{{$sale->item_name}}</h3>

                       <b>User:</b>
                       {{$sale->first_name.' '.$sale->last_name}}
                           <a href="#">
                               <h4>datos de contacto</h4>
                           </a>
                       </div>
               </li><br>

               </li>
           @endforeach
       </ul>
   @endif
   <hr>
   <h2 style="margin-bottom: 30px;">A confirmar</h2>

   @if ($contacts->count() > 0)
       <ul>
           @foreach ($contacts as $contact)
               <li>
                   <div class="">
                       <span style="background:lightblue">
                           <b>{{App\Event::toHumanDate($contact->event->event_date)}}</b>
                           -{{App\Event::toHumanTime($contact->event->event_time)}}
                       </span>
                       -{{$contact->product->name}}
                   </div>
                   <b>User:</b>
                   {{$contact->event->user->first_name}}
                   {{$contact->event->user->last_name}}
                   <form class="" action="/sales/store" method="post">
                       {{ csrf_field() }}
                       <button type="submit" name="add" value="{{$contact->id}}">
                           DISPONIBLE
                       </button>

                       <button type="submit" name="deny" value="{{$contact->id}}">
                           NO DISPONIBLE
                       </button>
                       <br>
                       <select class="comments" name="">
                           <option value="">--motivo--</option>
                           <option value="">Fecha reservada</option>
                           <option value="">De vacaciones</option>
                           <option value="">Cerrado</option>
                           <option value="">Otras</option>
                       </select>
                       <input type="text" name="" value="" placeholder="¿Fechas cercanas disponibles?">

                   </form>
               </li><br>
           @endforeach
       </ul>
   @endif

   <hr><br>

   <div class='crear-cuenta' style="margin-bottom: 30px;">
       <h1 class="titulo_seccion">MIS COMPRAS</h1>
       <hr>
       @if ($buyer_sales->count() > 0)
           <ul>
               @foreach ($buyer_sales as $sale)
                   <li>
                       <div class="">
                           <mark>
                               {{$sale->event_date}}
                           </mark>
                           <h3>{{$sale->item_name}}</h3>

                           <b>User:</b>
                           {{$sale->first_name.' '.$sale->last_name}}

                               <a href="#">
                                   <h4>datos de contacto</h4>
                               </a>
                           </div>
                   </li><br>

                   </li>
               @endforeach
           </ul>
       @endif
   </div><br>

   <h2 style="margin-bottom: 30px;">Esperando confirmación</h2>
   @if ($buyer_contacts->count() > 0)
       <ul>
           @foreach ($buyer_contacts as $contact)
               <li>
                   <div class="">
                       <span style="background:lightblue">
                           <b>{{App\Event::toHumanDate($contact->event_date)}}</b>
                           -{{App\Event::toHumanTime($contact->event_time)}}
                       </span>
                       -{{$contact->name}}
                   </div>
                   <b>User:</b>
                   {{$contact->first_name}}
                   {{$contact->last_name}}

               </li><br>
           @endforeach
       </ul>
   @endif



    @include('partials/footer')
</body>
</html>