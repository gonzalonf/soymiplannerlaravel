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
        <title>Crea tu evento</title>
        <link rel="stylesheet" href="/css/style.css">
        <style media="screen">
        .eventCont1{
        padding:3em;
        background:white;
        width:100%;
        }
        .eventCont2{
        padding:3em;
        background:snow;
        width:100%;
        }
        .eventCont3{
        padding:3em;
        background:white;
        width:100%;
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
            {{-- Para guardar (o sea, pasar de sesion a db) logear
            La idea es que puedan guardar muchos 'carts' de eventos y recuperarlos --}}
            <div class="eventCont1">
                <h3><strong>NOMBRE:</strong>
                <form class="" action="/event/edit" method="post">
                    {{ csrf_field() }}
                    <input class='decorative-input-edit text-label inputUpdate' type="text" name="name" value="{{$eventName}}">
                    <button class="boton_editar2" type="sumbit" name="send">CAMBIAR</button>
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
                    <button class="boton_editar2" type="sumbit" name="dateAdd">AGREGAR</button>
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
                    {{ csrf_field() }}
                    </h2>
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
                    <button class="boton_editar2" type="submit" name="send">AGREGAR</button>
                    <a href="/products/filter?q=&order=&city=Elegir+Zona&cat=1"><br>
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
                <a class="boton_editar3" href="/products/filter?q=&order=&city={{$sessionCity}}Elegir+Zona&cat=3">Catering</a>
                <a class="boton_editar3" href="/products/filter?q=&order=&city={{$sessionCity}}Elegir+Zona&cat=2">Decoración</a>
                <a class="boton_editar3" href="/products/filter?q=&order=&city={{$sessionCity}}Elegir+Zona&cat=4">Entretenimiento</a>
                <a class="boton_editar3" href="/products/filter?q=&order=&city={{$sessionCity}}Elegir+Zona&cat=5">Otros Servicios</a>
                {{-- estaría bueno hacer que vayan marcado las categorías que las están yponerle mas onda a los botones --}}
                <br><br>
                @if ($products!==[])
                @foreach ($products as $item)
                <li>
                    <form class="" action="/event/edit" method="post">
                        <h2><a href="/products/{{$item->id}}">{{$item->name}} </a>
                        <button class="boton_editar2" type="submit" name="rem" value="{{$item->id}}"><b>ELIMINAR</b>
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
                <button class='volver'>
                CONSULTAR SERVICIOS
                </button>
            </form>
            @endif
        </div>
    </div>
    @include('partials/footer')
</body>
</html>