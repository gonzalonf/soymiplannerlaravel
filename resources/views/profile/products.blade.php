<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mis Productos</title>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="favicon" href="images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    @include('partials/nav')


    <h1>Mis Productos</h1>
    <div class="">
        {{$error}}
    </div>

    @foreach ($products as $product)
    <div class="col-xs-12">
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
              <a class="btn btn-primary" href='/products/{{$product->id}}/edit'>EDITAR</a>
          </div>
      </div>
  </div>
  @endforeach


  @include('partials/footer')
</body>
</html>