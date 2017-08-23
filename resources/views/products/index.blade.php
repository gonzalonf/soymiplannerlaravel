<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Productos</title>
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!---------------->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="icon" type="favicon" href="images/favicon.png">
    <style type="text/css">
        *{
            text-decoration: none !important;
        }
        .dropdown1{
            padding: 11px 0px !important;
            color: black;
        }
        .imagen_prod{
            width: 300px !important;
            height: 300px !important;
            object-fit: cover !important;
        }
        h3 > a, p > a {
            color: #ff5a5f !important;
        }
        h3 > a:hover, p > a:hover{
            color: #ed878a !important;
        }
        .paginacion{
            text-align: center;
        }
        .error_search{
            text-align: center;
            width: 50%;
            clear: both;
            border-radius: 6px;
        }

        @media (max-width : 400px) {
            #content{
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    @include('partials/nav')
        {{--
        <div class="jumbotron">
            <h2>Eventos</h2>
        </div> --}}
        <div>
            <div style="display: flex" class="contenedor-flex ">
                {{-- el aside --}}
                @include('partials/search')
                @if ($products->count()===0)
                <h2  class="error_search">
                    Lo sentimos, no pudimos encontrar su búsqueda en nuestra base de datos.
                </h2>
                @endif
                <div class="contenidos_productos">
                    @foreach ($products->Chunk(3) as $productChunk)
                    <div class="row" style="margin-left: 0;">
                        @foreach ($productChunk as $product)
                        <div class="col-xs-12 col-md-4">
                            <div class="thumbnail">
                                {{-- @if ($product->imgName ===NULL)
                                <img style="height: 300px;" src="images/default_prod.png" alt="Evento">
                                @else
                                <img src="{{Storage::url($product->imgName)}}">
                                @endif  --}}
                                @if (!empty (glob ('storage/product/'. $product->id .'.*') [0]))
                                <img src="{{asset (glob ('storage/product/'. $product->id .'.*') [0]) }}" alt="producto" class="imagen_prod">
                                @else
                                <img src="/images/default_prod.png" alt="producto" class="imagen_prod">
                                @endif
                                <div class="caption">
                                    <h3> <a href="/products/{{$product->id}}"> {{$product->name}} </a></h3>
                                    <p>
                                        <a href="/profile/{{$product->user_seller_id}}">
                                            {{$product->first_name.' '.$product->last_name}}
                                        </a>
                                    </p>
                                    @php
                                    if ($product->subcategory_child_of_id !== NULL) {
                                        foreach ($categories as $value) {
                                            if ($value->id == $product->subcategory_child_of_id){
                                                $father = $value->category_name.' / ';
                                            }
                                        }
                                    }else {
                                        $father = '';
                                    }
                                    @endphp
                                    <h5><b>{{$father.$product->category_name}}</b></h5>
                                    <p>Descripcion: 
                                    @if (strlen($product->description)>10)
                                        {{substr($product->description, 0, 50) . '...'}}
                                    @else
                                    {{$product->description}}
                                    @endif
                                    

                                    </p>
                                    <p class="caption">Precio: {{$product->price}} </p>
                                    <form class="" action="/event/edit" method="post">
                                        {{ csrf_field() }}
                                        <button class="enviar" type="submit" name="add" value="{{$product->id}}">
                                            Contactar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="paginacion">
                {{$products->links()}}
            </div>
        </div>
        @include('partials/footer')
    </body>
    </html>