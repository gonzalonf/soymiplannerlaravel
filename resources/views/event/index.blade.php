<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mis Eventos</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        @include('partials/nav')
        @if ($events->count() > 0)
            <ul>

            @foreach ($events as  $ev)
                <li>

                <a href="#">
                    <div class="" style="width:30%;border:solid;padding:2em;margin:auto;overflow:hidden">
                        <h2>{{\App\Event::toHumanDate($ev->event_date)}}</h2>
                        <h3>{{\App\Event::toHumanTime($ev->event_time)}}</h3>
                        <h3>{{$ev->event_name}}</h3>

                    </div>
                </a>
                </li>

            @endforeach
        </ul>

        @endif

        @include('partials/footer')

    </body>
</html>
