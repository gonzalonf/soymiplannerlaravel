<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Mis Eventos</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="favicon" href="/images/favicon.png">
</head>
<body>
    @include('partials/nav')

    <div class='registro-container editarContainer'>
        <div class='crear-cuenta'>
            <h1 class="titulo_seccion">TUS EVENTOS</h1>
            <hr>
        </div>
        @if ($events->count() > 0)
        <ul>
        @foreach ($events as $ev)
            <li>
                <a href="#">
                    <div class="" style="width:70%; font-size: 20px; border: thin dotted; padding:1em; margin:20px auto; text-align: center;">
                        <h3>Nombre de tu Evento:{{$ev->event_name}}</h3>
                        <h3>Fecha: {{\App\Event::toHumanDate($ev->event_date)}}</h3>
                        <h3>Horario: {{\App\Event::toHumanTime($ev->event_time)}}</h3>
                    </div>
                </a>


            </li>

            @endforeach
        </ul>
        @endif
    </div>


    @include('partials/footer')
</body>
</html>