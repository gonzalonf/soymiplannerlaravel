<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
</head>
<body>
	<h1>Productos</h1>
	<ul>
        @foreach($products as $product) {{-- products la recivo del controlador y la itero --}}
            {{-- <li> {{$products}} </li> esto llamado asi, es un objeto --}}
            <li><a href="products/{{$product->id}}">{{ $product->getName() }}</a> - <a href="#">Edit</a></li>
        @endforeach
	</ul>
</body>
</html>

