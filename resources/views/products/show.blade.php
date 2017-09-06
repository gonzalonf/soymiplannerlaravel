<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title> {{$product->name}}</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="favicon" href="/images/favicon.png">
  </head>
  <style type="text/css">
  h2, p{
  font-size: 1rem;
  font-weight: normal;
  line-height: 1.5rem;
  margin: 20px 0;
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
    
    @if (Auth::guest())
    <a style="text-align: center;" href="{{ url('/register') }}">"Que esperas, Registrate!" </a>
    @endif
    <hr>
    @if (!Auth::guest())
    <h3 style="margin: 10px;">Comentarios:</h3>
    @foreach ($comments as $comment)
    <div style="margin: 35px auto; text-align: center; border: solid, black, 2px;">
      <b>Comentario:</b>{{ $comment->comment }} <br>
      <b>Nombre:</b> {{ $comment->name }} <br>
      <b>Hora: </b>{{ date($comment->created_at) }}
    </div>
    @endforeach
    <div class="row" style="text-align: center">
      <div class="col-md-8 col-md-offset-2">
        <h4>Comentar</h4>
        @if ($errors->any())
        <div style="margin: auto;" class='msj_error'>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form method="Post" action="/products/{{$product->id}}">
          {{ csrf_field() }}
          <textarea style="margin: 0px; width: 666px; height: 87px; z-index: auto; position: relative; line-height: normal; font-size: 11px; transition: none; background: transparent !important;" id="comment" name="c" ></textarea> <br>
          {{--  <input style="width: 300px; height: 300px" type="text" name="c"> <br> --}}
          <input style="width: 100px; margin-bottom: 40px;" class="button" type="submit" name="submit" value="Enviar" id="submit"/>
        </form>
      </div>
    </div>
    
    @endif
    @include('partials/footer')
  </body>
</html>