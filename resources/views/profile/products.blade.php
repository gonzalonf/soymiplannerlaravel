<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Mis Productos</title>
        <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" type="favicon" href="images/favicon.png">
        <style type="text/css">
            @media (max-width : 400px) {
                .wrapper_products {
                    display: block;
                    margin: 0 auto;
                    text-align: center;
                }
                .thumbnail
                {
                    margin: 20px;
                }
                .boton_editar{
                    text-align: center;
                    margin: 20px auto;
                }
            }
        </style>
    </head>
    <body>
        @include('partials/nav')
        <div class='registro-container editarContainer'>

            <div class='crear-cuenta'>
                <h1 class="titulo_seccion">MIS PUBLICACIONES</h1>
                <hr>
            </div>
            <div class="">
                {{$error}}
            </div>
            @foreach ($products as $product)
            <div class="wrapper_products">
                <div>
                    @if  (!empty (glob ('storage/product/'. $product->id .'.*') [0]) )
                    <img class="thumbnail"  src="{{asset (glob ('storage/product/'. $product->id .'.*') [0]) }}" alt="producto">
                    @else
                    <img class="thumbnail"  src="/images/default_prod.png" alt="producto">
                    @endif
                </div>
                <div class="info">
                    <h3>Producto/Servicio: {{$product->name}}</h3>
                    <p>Descripcion: {{$product->description}}</p>
                    <strong>Precio: {{$product->price}}</strong>
                    <a class="boton_editar" href='/products/{{$product->id}}/edit'>EDITAR</a>
                </div>
            </div><hr><br>
            @endforeach
        </div>
        @include('partials/footer')
    </body>
</html>