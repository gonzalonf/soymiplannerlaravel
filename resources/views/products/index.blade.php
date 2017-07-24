<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
<body>

@include('partials/nav')



<div class="jumbotron">
	<h2>Eventos</h2>
</div>



 <div id='content' class='row-fluid' style="
    
    position: fixed;
    top: 180px;
    z-index: 1;
    background-color: #F1F1F1">
    <form style="
    text-align: center;
    margin: 7px auto;
    "
    class="buscador" method="get" action="/products/search">

		<input type="search" name="q"  id="search" placeholder="Buscá" style="
		height: 35px;
		border: none;
		position: relative;
		top: 2.3px;
		max-width: 128px;
        margin: auto;

		" >
	        <button class="btn btn-danger" type="submit">
	            <span class=" glyphicon glyphicon-search"></span>
	        </button>
	</form>
    
        
    @if (isset( $_GET['q']) && $_GET['q']!=='')
        <b>{{ '"'.$_GET['q'].'"' }}</b>
    @endif



    <div style="font-size: 0.8em" class='span2 sidebar col-md-3'>
    	<h4>Ordenar Publicaciones</h4>
    	<ul class="nav nav-tabs nav-stacked ">
    		<li><a href="">Más Relevantes</a></li>
    		<li><a href="">Menor Precio</a></li>
    		<li><a href="">Mayor Precio</a></li>
    	</ul>
        <h4>Categorias</h4>
        <ul class="nav nav-tabs nav-stacked">
          <li><a href='#'>Salones</a></li>
          <li><a href='#'>Catering</a></li>
          <li><a href='#'>Musica</a></li>
        </ul>

  	<h4>Ubicación</h4>
    	<ul class="nav nav-tabs nav-stacked ">
    		<li><a href="">Capital  Federal</a></li>
    		<li><a href="">Provincia de Bs As</a></li>
    		<li><a href="">Cordoba</a></li>
    	</ul>

    	</div>
 </div>


@if (isset($error))
    <div style="
    width:70%;
    padding:2em;
    margin:auto;
    background:pink;
    float: right;

    ">
        <h2>{{$error}}</h2>
        (Hacer algo mejor...con redireccion)
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
					@endif ($product->imgName)
					<div class="caption">
						<h3>Nombre de Evento: {{$product->name}}</h3>
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

<div class="paginacion" style="text-align: center;">
{{$products->links()}}
</div>

</body>
</html>

