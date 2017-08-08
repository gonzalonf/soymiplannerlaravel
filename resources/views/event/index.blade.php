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
                {{var_dump($ev)}}
                <li>

                <a href="#">
                    <div class="" style="width:30%;border:solid;padding:2em;margin:auto;overflow:hidden">
                        <h2>
                            {{$ev->event_date}}
                        </h2>
                        <h2>

                            {{$ev->event_name}}
                        </h2>

                    </div>
                </a>
                </li>

            @endforeach
        </ul>

        @endif

        @include('partials/footer')

    </body>
</html>

