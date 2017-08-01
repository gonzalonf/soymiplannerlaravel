<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">

<body>

@include('partials/nav')


{{--
<div class="jumbotron">
	<h2>Eventos</h2>
</div> --}}

{{-- el aside --}}
@include('partials/search')

<div class="contenidos_productos">

    @if ($products->count()===0)
        <div class="error_search">
            <h2>
                Lo sentimos, no pudimos encontrar <b>'{{trim(request()->q)}}' </b> en nuestra base de datos.
            </h2>
        </div>
    @endif

    @foreach ($products->Chunk(3) as $productChunk)

    	<div class="row" style="position: relative; left: 25% ">
    		@foreach ($productChunk as $product)
    			<div class="col-xs-12 col-md-3">
    				<div class="thumbnail">
    					@if (isset($product->imgName))
    					    <img src="{{Storage::url($product->imgName)}}">
    					@else
    						<img style="height: 300px;" src="http://cdn.playbuzz.com/cdn/adabbd88-1450-44a4-b4bc-a96174ea963c/b3d6a27c-fdf4-438e-9a04-b8a67ee04b52.png" alt="Evento">
    					@endif {{-- ($product->imgName) --}}
    					<div class="caption">
    						<h3> <a href="/products/{{$product->id}}"> {{$product->name}} </a></h3>
                            <p>
                                <a href="/profile/{{$product->user_seller_id}}">
                                    {{$product->first_name.' '.$product->last_name}}
                                </a>
                            </p>
                            <h5><b>{{$product->category_name}}</b></h5>
    						<p>Descripcion: {{$product->description}}.</p>
    						<p class="caption">Precio: {{$product->price}} </p>
    						<button class="btn btn-primary">
    							Contactar
    						</button>
    					</div>
    				</div>
    			</div>
    		@endforeach
    	</div>
    @endforeach
</div>

<div class="paginacion" style="text-align: center;">
{{$products->links()}}
</div>

@include('partials/footer')
</body>
</html>

