<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PRODUCTOS DE {{$user->first_name.' '.$user->last_name}}</title>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="icon" type="favicon" href="/images/favicon.png">
</head>
<body>
    @include('partials/nav')

    <div class='registro-container editarContainer'>
        <div class='crear-cuenta'>
            @if ($user->count() > 0)
            <h1 class="titulo_seccion">{{$user->first_name.' '.$user->last_name}}</h1>
            @endif
            <hr>
        </div>

        <div>
            <p style="font-size: 1.2rem; line-height: 3rem;">
                Reputación: ☆☆☆☆☆
            </p><hr><br>
        </div>

        @if ($products->count() > 0)
        @foreach ($products as $prod)
        <div class="wrapper_products">

            <div>
                @if  (!empty (glob ('storage/product/'. $prod->id .'.*') [0]) )
                <img class="thumbnail"  src="{{asset (glob ('storage/product/'. $prod->id .'.*') [0]) }}" alt="producto">
                @else
                <img class="thumbnail"  src="/images/default_prod.png" alt="producto">
                @endif
            </div>

            <div class="info">
                <h3> {{$prod->name}} </h3>
                @foreach ($categories as  $cat)
                @if ($cat->id == $prod->category_id)
                <p>{{$cat->category_name}}</p>
                @endif
                @endforeach
                <strong>Precio: {{$prod->price}}</strong>
                <a class="boton_editar" href='/products/{{$prod->id}}'>VER</a>
            </div>

        </div><hr><br>
        @endforeach
        @endif
    </div>

    @include('/partials/footer')

</body>
</html>