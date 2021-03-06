@php
$sessionCity = session()->get('city')??'';
$eventName = session()->get('eventName') ?? 'Mi Evento';
$eventDate = session()->get('event.day').'/'.
session()->get('event.month').'/'.
session()->get('event.year').' '.
session()->get('event.time');
$year=(integer)date('Y');
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Crea tu evento</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="favicon" href="/images/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style media="screen">
        .eventCont1{
            padding:3em;
            background:white;
            width:100%;
        }
        .eventCont2{
            padding: 3em;
            background:snow;
            width:100%;
        }
        .eventCont3{
            padding: 3em;
            background:white;
            width:100%;
            line-height: 3rem;
        }
        div > h2, div > h3, div > p, form > a, div > a{
            font-size: 1.1rem !important;
            font-weight: normal !important;
            line-height: 1rem !important;
            margin: 10px 0 !important;
        }
        .inputBase {
            display: inline-block;
            /*width: 20%;*/
            height: 35px;
            margin: 5px;
            padding: 5px;
            border-radius: 4px;
            background: #f4f4f4;
            border: 1px solid lightgrey;
            color: grey;
            font-size: .7rem;
        }
        .boton_editar2 {
            margin: 10px 6px;
            padding: 7px 10px;
            border: none;
            outline: none;
            border-radius: 2px;
            background-color: #ff5a5f;
            color: #fff;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
        }
        .boton_editar3 {
            margin: 10px 6px;
            padding: 7px 10px;
            border: none;
            outline: none;
            border-radius: 2px;
            background-color: mediumseagreen;
            color: #fff;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            display: block;
        }
    </style>
</head>
<body>
    @include('partials/nav')



    <div class='registro-container editarContainer'>
        <div class='crear-cuenta'>
            <h1 class="titulo_seccion">PLANEÁ TU EVENTO</h1>
            <hr>
        </div>
        <div class="panel-body">
            <div id="example"></div>
        </div>
            {{-- Para guardar (o sea, pasar de sesion a db) logear
            La idea es que puedan guardar muchos 'carts' de eventos y recuperarlos --}}
            <div class="eventCont1">
                <h3><strong>NOMBRE:</strong>
                    <form class="" action="/event/edit" method="post">
                        {{ csrf_field() }}
                        <input class='decorative-input-edit text-label inputUpdate' type="text" name="name" value="{{$eventName}}">
                        <button class="boton_editar2" type="sumbit" name="send"><i style="
        position: relative;
        top: 4px;
        right: 4px;"
    class="material-icons">check</i>CAMBIAR</button>
                    </form>
                </h3>
                <h3><strong>FECHA:</strong>
                    <form class="" action="/event/edit" method="post">
                        <select class="inputBase" name="day">
                            @for ($i=1; $i <=31 ; $i++)
                            <option value="{{$i}}"
                            @if (session()->has('event.day') && $i==session()->get('event.day'))
                            {{'selected'}}
                            @endif >
                            {{$i}}
                        </option>
                        @endfor
                    </select>
                    <select class="inputBase" name="month">
                        @for ($i=1; $i <=12 ; $i++)
                        <option value="{{$i}}"
                        @if (session()->has('event.month') && $i==session()->get('event.month'))
                        {{'selected'}}
                        @endif >
                        {{$i}}
                    </option>
                    @endfor
                </select>
                <select class="inputBase" name="year">
                    @for ($i=$year; $i <= ($year+5) ; $i++)
                    <option value="{{$i}}"
                    @if (session()->has('event.year') && $i==session()->get('event.year'))
                    {{'selected'}}
                    @endif >
                    {{$i}}
                </option>
                @endfor
            </select><br>
            <input id="man" type="radio" name="time" value="Mañana"
            @if (session()->has('event.time') && session()->get('event.time')=='Mañana')
            {{'checked'}}
            @endif
            >
            <label for="man">Mañana</label>
            <input id="tar" type="radio" name="time" value="Tarde"
            @if (session()->has('event.time') && session()->get('event.time')=='Tarde')
            {{'checked'}}
            @endif
            >
            <label for="tar">Tarde</label>
            <input id="noch" type="radio" name="time" value="Noche"
            @if (session()->has('event.time') && session()->get('event.time')=='Noche')
            {{'checked'}}
            @endif
            >
            <label for="noch">Noche</label>
            <button class="boton_editar2" type="sumbit" name="dateAdd"><i style="
        position: relative;
        top: 4px;
        right: 4px;"
    class="material-icons">check</i>AGREGAR</button>
            {{ csrf_field() }}
        </form>
    </h3>
    {{--  después..hacer un input desplegable o algo mas copado con js --}}
    <br>
    @if (session()->has('event.time'))
    <form class="" action="/event/edit" method="post">
        <h2>
            {{$eventDate}}
            <button class="boton_editar2" type="submit" name="remDate" value="true">
                <b>ELIMINAR</b>
            </button>
        </h2>
        {{ csrf_field() }}
    </form>
    @endif
</div>
<hr>
<div class="eventCont2" >
    <h3><strong>LUGAR:</strong></h3>
    <p>¿Ya tenés locación?</p>
    <form class="" action="/event/edit" method="post">
        {{ csrf_field() }}
        <select class="inputBase" name="city">
            <option value="">Zona</option>
            @foreach ($locations as  $city)
            <option value="{{$city->id}}"
                @if ($sessionCity==$city->id)
                {{'selected'}}
                @endif
                >
                {{$city->location}}
            </option>
            @endforeach
        </select>
        <input class="inputBase" type="text" name="dir" value="" placeholder="dirección">
        <button class="boton_editar2" type="submit" name="send"><i style="
        position: relative;
        top: 4px;
        right: 4px;"
    class="material-icons">add_circle</i>AGREGAR</button>
        <a href="/products/filter?search=&order=&city={{$sessionCity??''}}&cat=1"><br>
            ...o consultá nuestras opciones!
        </a>
    </form>
    <br><br>
    @foreach ($locations as  $city)
    @if ($city->id == $sessionCity )
    <form class="" action="/event/edit" method="post">
        <h2>{{$city->location}}
            > {{session()->get('dir')}}
            <button class="boton_editar2" type="submit" name="remLoc" value="true"><b>ELIMINAR</b>
            </button>
            {{ csrf_field() }}
        </h2>
    </form>
    @endif
    @endforeach
</div>
<hr>
<div class="eventCont3" >
    <a class="boton_editar3" href="/products/filter?search=&order=&city={{$sessionCity??''}}&cat=3"> <i style="
        position: relative;
        top: 4px;
        right: 4px;"
    class="material-icons">add_circle</i>  Catering </a>
    <a class="boton_editar3" href="/products/filter?search=&order=&city={{$sessionCity??''}}&cat=2"><i style="
        position: relative;
        top: 4px;
        right: 4px;"
    class="material-icons">add_circle</i> Decoración</a>
    <a class="boton_editar3" href="/products/filter?search=&order=&city={{$sessionCity??''}}&cat=4"><i style="
        position: relative;
        top: 4px;
        right: 4px;"
    class="material-icons">add_circle</i> Entretenimiento</a>
    <a class="boton_editar3" href="/products/filter?search=&order=&city={{$sessionCity??''}}&cat=5"><i style="
        position: relative;
        top: 4px;
        right: 4px;"
    class="material-icons">add_circle</i> Otros&nbsp;Servicios</a>
    {{-- estaría bueno hacer que vayan marcado las categorías que las están yponerle mas onda a los botones --}}
    <br><br>
    @if ($products!==[])

{{-- -CAJITA FIXED --}}
<div class="fixed-box">
    <span class="js-btn btn">
    <i class="material-icons">keyboard_arrow_left</i>
    <i class="material-icons">event_available</i>

    </span>

    <div class="js-fade is-hidden" style="">
        <h3>Eventos Seleccionados</h3>
        <hr>
        @foreach ($products as $item)
        <li>
            <form class="" action="/event/edit" method="post">
                <h2><a href="/products/{{$item->id}}">{{$item->name}} </a>
                    <button class="boton_editar2" type="submit" name="rem" value="{{$item->id}}"><i style="cursor: pointer;" class="material-icons">clear</i>
                    </button>
                </h2>
                {{ csrf_field() }}
            </form>
            <h2><b>Precio: </b>{{$item->price}}</h2>
            <br><br>
        </li>
        @endforeach
        @endif
    </ul>
    @if (isset($products) && !empty($products))
    <form class="" action="/event/store" method="post" >
        {{ csrf_field() }}
        <input type="hidden" name="hola" value="asd">
        <button class='volver' type="submit" name="checkout" value="true">
            CONSULTAR SERVICIOS
            <i style="position: relative;
    left: 4px;
    top: 4px;" class="material-icons">mail_outline</i>
        </button>
    </form>

@endif
</div>
</div>

{{-- FIN CAJITA FIXED --}}
   @if ($products!==[])

        <h3>Eventos Seleccionados</h3>
        <hr>
        @foreach ($products as $item)
        <li>
            <form class="" action="/event/edit" method="post">
                <h2><a href="/products/{{$item->id}}">{{$item->name}} </a>
                    <button style="cursor: pointer;" class="boton_editar2" type="submit" name="rem" value="{{$item->id}}"><i  class="material-icons">clear</i><b>ELIMINAR</b>
                    </button>
                </h2>
                {{ csrf_field() }}
            </form>
            <h2><b>Precio: </b>{{$item->price}}</h2>
            <br><br>
        </li>
        @endforeach
        @endif
    </ul>
    @if (isset($products) && !empty($products))
    <form class="" action="/event/store" method="post" >
        {{ csrf_field() }}
        <input type="hidden" name="hola" value="asd">
        <button class='volver' type="submit" name="checkout" value="true">
            CONSULTAR SERVICIOS
            <i style="position: relative;
    left: 4px;
    top: 4px;" class="material-icons">mail_outline</i>
        </button>
    </form>
</div>
</div>
@endif
@include('partials/footer')


<script type="text/javascript">

    window.addEventListener('load',function(){
        // fade out

function fadeOut(el){
  el.style.opacity = 1;

  (function fade() {
    if ((el.style.opacity -= .1) < 0) {
      el.style.display = 'none';
      el.classList.add('is-hidden');
    } else {
      requestAnimationFrame(fade);
    }
  })();
}

// fade in

function fadeIn(el, display){
  if (el.classList.contains('is-hidden')){
    el.classList.remove('is-hidden');
  }
  el.style.opacity = 0;
  el.style.display = display || "block";

  (function fade() {
    var val = parseFloat(el.style.opacity);
    if (!((val += .1) > 1)) {
      el.style.opacity = val;
      requestAnimationFrame(fade);
    }
  })();
}

var btn = document.querySelector('.js-btn');
var el = document.querySelector('.js-fade');

btn.addEventListener('click', function(e){
  if(el.classList.contains('is-hidden')){
    fadeIn(el);
  }
  else {
    fadeOut(el);
  }
});

});

</script>
<script src="{{mix('js/app.js')}}" charset="utf-8"></script>
</body>
</html>