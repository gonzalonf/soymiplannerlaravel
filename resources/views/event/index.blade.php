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
        <title></title>
        <link rel="stylesheet" href="/css/style.css">

        <style media="screen">
            .eventCont1{
                padding:3em;
                background:pink;
                width:100%;
            }
            .eventCont2{
                padding:3em;
                background:lightblue;
                width:100%;
            }
            .eventCont3{
                padding:3em;
                background:pink;
                width:100%;
            }
        </style>
    </head>
    <body>
        @include('partials/nav')
        <article class="" >

            {{-- Para guardar (o sea, pasar de sesion a db) logear
            La idea es que puedan guardar muchos 'carts' de eventos y recuperarlos --}}


        <div class="eventCont1">
            <h1>Evento</h1><br>

            <h3>Nombre:
                <form class="" action="/event/edit" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="name" value="{{$eventName}}">
                    <button type="sumbit" name="send">cambiar</button>
                </form>
            </h3>

            <h3>Fecha:
                <form class="" action="/event/edit" method="post">

                    <select class="" name="day">
                        @for ($i=1; $i <=31 ; $i++)
                            <option value="{{$i}}"
                                @if (session()->has('event.day') && $i==session()->get('event.day'))
                                    {{'selected'}}
                                @endif >
                                {{$i}}
                            </option>
                        @endfor
                    </select>
                    <select class="" name="month">
                        @for ($i=1; $i <=12 ; $i++)
                            <option value="{{$i}}"
                                @if (session()->has('event.month') && $i==session()->get('event.month'))
                                    {{'selected'}}
                                @endif >
                                {{$i}}
                            </option>
                        @endfor
                    </select>
                    <select class="" name="year">

                        @for ($i=$year; $i <= ($year+5) ; $i++)
                            <option value="{{$i}}"
                                @if (session()->has('event.year') && $i==session()->get('event.year'))
                                    {{'selected'}}
                                @endif >
                                {{$i}}
                            </option>
                        @endfor
                    </select>


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

                    <button type="sumbit" name="dateAdd">agregar</button>

                    {{ csrf_field() }}
                </form>
            </h3>

            <mark>(después..hacer un input desplegable o algo mas copado con js)</mark><br><br>
            <br>

            @if (session()->has('event.time'))
                <form class="" action="/event/edit" method="post">
                    <h4>
                        {{$eventDate}}
                        <button type="submit" name="remDate" value="true">
                            <b>-eliminar</b>
                        </button>
                        {{ csrf_field() }}
                    </h4>
                </form>
            @endif


        </div>

        <div class="eventCont2" >

            <h3>Lugar</h3>
            <p>Ya tenés locación?</p>
            <form class="" action="/event/edit" method="post">
                {{ csrf_field() }}
                <select class="" name="city">
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
                <input type="text" name="dir" value="" placeholder="dirección">
                <button type="submit" name="send">agregar</button>
                <a href="/products/filter?q=&order=&city=Elegir+Zona&cat=1">
                    ..o consultá nuestras opciones!
                </a>
            </form>
            <br><br>
                    @foreach ($locations as  $city)

                        @if ($city->id == $sessionCity )
                            <form class="" action="/event/edit" method="post">
                                <h4>{{$city->location}}
                                    > {{session()->get('dir')}}
                                    <button type="submit" name="remLoc" value="true"><b>-eliminar</b>
                                    </button>
                                    {{ csrf_field() }}
                                </h4>
                            </form>
                        @endif
                    @endforeach

        </div>
        <div class="eventCont3" >
            <a href="/products/filter?q=&order=&city={{$sessionCity}}Elegir+Zona&cat=3">Catering</a>
            <a href="/products/filter?q=&order=&city={{$sessionCity}}Elegir+Zona&cat=2">Decoración</a>
            <a href="/products/filter?q=&order=&city={{$sessionCity}}Elegir+Zona&cat=4">Entretenimiento</a>
            <a href="/products/filter?q=&order=&city={{$sessionCity}}Elegir+Zona&cat=5">Otros Servicios</a>
            <mark>estaría bueno hacer que vayan marcado las categorías que las están yponerle mas onda a los botones</mark>


            <br><br>
            @if ($products!==[])

                @foreach ($products as $item)
                    <li>
                        <form class="" action="/event/edit" method="post">
                            <h4><a href="/products/{{$item->id}}">{{$item->name}} </a>
                                <button type="submit" name="rem" value="{{$item->id}}"><b>-eliminar</b>
                                </button>
                            </h4>
                            {{ csrf_field() }}
                        </form>
                        <p><b>Precio: </b>{{$item->price}}</p>
                        <br><br>
                    </li>
                @endforeach

            @endif

        </ul>

        @if (isset($products) && !empty($products))
            <form class="" action="" method="post" >
                {{ csrf_field() }}
                <input type="hidden" name="hola" value="asd">
                <button type="submit" name="checkout" value="true" style="padding:1em;border:solid 2px;background:violet">
                    CONSULTAR SERVICIOS
                </button>
            </form>
        @endif

    </div>

    </article>

        @include('partials/footer')

    </body>
</html>

