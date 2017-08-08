<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Perfil Público</title>

        <!-- Bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <!---------------->

        <link id="pagestyle" rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="icon" type="favicon" href="images/favicon.png">
    </head>
    <body>
        @include('/partials/nav')

        @if ($user->count() > 0)
            <h2>
                {{$user->first_name.' '.$user->last_name}}
            </h2>
            <mark>IMAGEN</mark>


        @endif

        <h2>Reputación</h2>
        <p>estrellas</p>


        @if ($products->count() > 0)
            <h3><b>Sus productos:</b></h3>
            <ul>
                @foreach ($products as $prod)
                    <li>
                        <h4> <b> {{$prod->name}} </b> </h4>
                        <h4>precio: {{$prod->price}}</h4>
                        @foreach ($categories as  $cat)
                            @if ($cat->id == $prod->category_id)
                                <h4>{{$cat->category_name}}</h4>
                            @endif
                        @endforeach
                        @if (!empty (glob ('storage/product/'. $prod->id .'.*') [0]))
                        <img src="{{asset (glob ('storage/product/'. $prod->id .'.*') [0]) }}" alt="producto" class="imagen_prod">
                        @else
                        <img src="/images/default_prod.png" alt="producto" class="imagen_prod">
                        @endif
                    </li>
                @endforeach
            </ul>

        @endif


        @include('/partials/footer')
    </body>
</html>