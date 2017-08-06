<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mis Productos</title>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="favicon" href="images/favicon.png">
</head>
<body>
    @include('partials/nav')

    <div class='registro-container editarContainer'>
        <div class='crear-cuenta'>
            <h1 class="titulo_seccion">MIS PRODUCTOS</h1>
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