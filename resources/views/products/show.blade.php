<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title></title>
  <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="icon" type="favicon" href="images/favicon.png">
</head>
<style type="text/css">
  h2, p{
    font-size: 1.2rem;
    font-weight: normal;
  }
</style>
<body>

  @include('partials/nav')

  <div class='registro-container editarContainer'>
    <div class='crear-cuenta'>
      <h1 class="titulo_seccion">{{$product->name}}</h1>
      <hr>
    </div>

    <div class="avatar" style="margin-top: 10px;">
      @if (!empty (glob ('storage/product/'. $product->id .'.*') [0]) )
      <img src="{{asset (glob ('storage/product/'. $product->id .'.*') [0]) }}" alt="producto">
      @else
      <img src="/images/default_prod.png" alt="producto">
      @endif 
    </div>
<div style="width: 70%; margin: 0 auto !important; text-align: left;">
    <h2 >{{$product->description}}</h2>
    <p><strong>Precio: {{$product->price}}</strong></p>
</div>
    <div class='formulario'>
    <button type='submit' class='editar volver' name='submit'><strong>Añadir a Tu Carruaje de Eventos</strong></button>
   </div>
 </div>

 @include('partials/footer')

</body>
</html>