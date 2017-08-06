<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mis Productos</title>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="favicon" href="images/favicon.png">
    <style type="text/css">
        .wrapper{
            display: flex;
            align-items: flex-start;
            text-align: left;
            margin: 50px 0;
        }
        img.thumbnail{
            height: 200px; 
            width: 200px; 
            border-radius: 5px;
            object-fit: cover
        }
        .info{
            display: flex;
            flex-flow: column;
            margin: 0 30px; 
            font-size: .8rem;
            line-height: 1.3rem;      
        }
        .info strong{
            margin: 10px 0; 
            font-size: 1.4rem;
            line-height: 1.2rem;      
        }
        .boton_editar{
            width: 100px;
            margin: 10px 0;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 2px;
            background-color: #ff5a5f;
            color: #fff;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>
    @include('partials/nav')

    <div class='registro-container editarContainer'>
        <div class='crear-cuenta'>
            <h1 style="font-size: 30px;">MIS PRODUCTOS</h1>
            <hr>
        </div>

        <div class="">
            {{$error}}
        </div>

        @foreach ($products as $product)
        <div class="wrapper">
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