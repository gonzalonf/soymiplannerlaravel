<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<title></title>
	<link {{-- id="pagestyle" --}} rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>

	{{-- si esta logueado... --}}
	@include('partials/nav')

	<div class='registro-container editarContainer'>

		<div class='crear-cuenta'>
			<h1 class="titulo_seccion">EDITAR PRODUCTO</h1>
			<hr>
		</div>

		<div class="avatar" style="margin-top: 10px;">
			@if (!empty (glob ('storage/product/'. $product->id .'.*') [0]) )
			<img src="{{asset (glob ('storage/product/'. $product->id .'.*') [0]) }}" alt="producto">
			@else
			<img src="/images/default_prod.png" alt="producto">
			@endif 
		</div>
		
		{{-- FORM AVATAR --}}
		<form enctype='multipart/form-data' class='formulario' method='post' action='{{action('ProductsController@update', $product->id)}}'>
			{{ csrf_field() }}
			<input name='_method' type='hidden' value='PATCH'>

			{{-- AVATAR --}}
			<h2 class='datosUsuario'>Imagen del producto:</h2>
			<input class='inputImagen' type='file' name='prod_image'>
			<button type='submit' class='boton_update'><strong>CAMBIAR</strong></button>
			
			{{-- PRODUCTO --}}
			<input type="hidden" name="name" value='{{$product->name}}'>

			{{-- CATEGORIA --}}
			<input type="hidden" name="category_id" value='{{$product->category_id}}'>

			{{-- PRECIO --}}
			<input type="hidden" name="price" value='{{$product->price}}'>

			{{-- DESCRIPCION --}}
			<input type="hidden" name="description" value='{{$product->description}}'>
		</form>
		
		{{-- FORM NOMBRE PRODUCTO --}}
		<form class='formulario' method="post" action="{{action('ProductsController@update', $product->id)}}">
			{{csrf_field()}}
			<input name="_method" type="hidden" value="PATCH">

			{{-- PRODUCTO --}}
			<h2 class="datosUsuario">Producto: <strong> {{$product->name}} </strong> </h2>
			<input class='inputGenerico' type="text" placeholder={{$product->name}} name="name" value='{{$product->name}}'>
			<button type='submit' class='boton_update' name='submit'><strong>CAMBIAR</strong></button>

			@if ($errors->has('name'))
			<p class='msj_error'>{{ $errors->first('name') }}</p>
			@endif

			{{-- CATEGORIA --}}
			<input type="hidden" name="category_id" value='{{$product->category_id}}'>

			{{-- PRECIO --}}
			<input type="hidden" name="price" value='{{$product->price}}'>

			{{-- DESCRIPCION --}}
			<input type="hidden" name="description" value='{{$product->description}}'>
		</form>
		
		{{-- FORM CATEGORIA --}}
		<form class='formulario' method="post" action="{{action('ProductsController@update', $product->id)}}">
			{{csrf_field()}}
			<input name="_method" type="hidden" value="PATCH">

			{{-- PRODUCTO --}}
			<input type="hidden" name="name" value='{{$product->name}}'>

			{{-- CATEGORIA --}}
			<h2 class="datosUsuario">Categoria: <strong>{{$product->category_id}}</strong> </h2>
				<select class="inputGenerico" name="category_id" id="exampleSelect1">
					{{-- el primer value debe ser vacio--}}
					<option selected=""></option>
					<option value="1" {{$product->category_id == 1?"selected":"" }} >1.Lugar</option>
					<option value="2" {{$product->category_id == 2?"selected":"" }} >2.Decoracion</option>
					<option value="3" {{$product->category_id == 3?"selected":"" }} >3.Catering</option>
					<option value="4" {{$product->category_id == 4?"selected":"" }} >4.Servicios</option>
					<option value="5" {{$product->category_id == 5?"selected":"" }} >5.Otros</option>
				</select>   
			<button type='submit' class='boton_update' name='submit'><strong>CAMBIAR</strong></button>

			@if ($errors->has('category_id'))
			<p class='msj_error'>{{ $errors->first('category_id') }}</p>
			@endif

			{{-- PRECIO --}}
			<input type="hidden" name="price" value='{{$product->price}}'>

			{{-- DESCRIPCION --}}
			<input type="hidden" name="description" value='{{$product->description}}'>
		</form>
		
		{{-- FORM PRECIO --}}
		<form class='formulario' method="post" action="{{action('ProductsController@update', $product->id)}}">
			{{csrf_field()}}
			<input name="_method" type="hidden" value="PATCH">

			{{-- PRODUCTO --}}
			<input type="hidden" name="name" value='{{$product->name}}'>

			{{-- CATEGORIA --}}
			<input type="hidden" name="category_id" value='{{$product->category_id}}'>

			{{-- PRECIO --}}
			<h2 class="datosUsuario">Precio: <strong> {{$product->price}} </strong> </h2>
			<input class='inputGenerico' type="text" placeholder={{$product->price}} name="price" value='{{$product->price}}'>
			<button type='submit' class='boton_update' name='submit'><strong>CAMBIAR</strong></button>

			@if ($errors->has('price'))
			<p class='msj_error'>{{ $errors->first('price') }}</p>
			@endif

			{{-- DESCRIPCION --}}
			<input type="hidden" name="description" value='{{$product->description}}'>
		</form>
		
		{{-- FORM DESCRIPCION --}}
		<form class='formulario' method="post" action="{{action('ProductsController@update', $product->id)}}" id="usrform">
			{{csrf_field()}}
			<input name="_method" type="hidden" value="PATCH">

			{{-- PRODUCTO --}}
			<input type="hidden" name="name" value='{{$product->name}}'>

			{{-- CATEGORIA --}}
			<input type="hidden" name="category_id" value='{{$product->category_id}}'>

			{{-- PRECIO --}}
			<input type="hidden" name="price" value='{{$product->price}}'>

			{{-- DESCRIPCION --}}
			<h2 class="datosUsuario">Descripción:</h2>
			<textarea rows="8" cols="50" class='comment' name="description" value="{{$product->description}}" form="usrform">{{$product->description}}</textarea>
			<button type='submit' class='boton_update' name='submit'><strong>CAMBIAR</strong></button>

			@if ($errors->has('description'))
			<p class='msj_error'>{{ $errors->first('description') }}</p>
			@endif
		</form>

		<div class='formulario'>
			<a class='volver' href="/">INICIO</a>
		</div>

	</div>


	@include('partials/footer')



</body>
</html>