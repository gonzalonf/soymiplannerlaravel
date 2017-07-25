<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title></title>
  <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

  {{-- si esta logueado... --}}
  @include('partials/nav')

  <div class='registro-container'>
    <div class='crear-cuenta'>
      <h1 style='font-size: 30px;'>Mi Perfil</h1>
      <hr>
    </div>
  </div>

  <div class="editarContainer">

    <div class="perfil1">

      <div class="avatar">
        @if (file_exists('storage/avatar/'. Auth::User()->id . '.jpeg' ))
           <img src="{{'storage/avatar/'. Auth::User()->id . '.jpeg' }}" alt="avatar"> 
        @else
           <img src="images/default.png" alt="avatar">
        @endif 
      </div>

      <div class="info">
        <ul>
          <li class="editarNav">Imagen de Perfil: <a href="perfilEditarAvatar.php">Cambiar</a></li>
          <li class="editarNav">Email: <b> {{Auth::User()->email}} </b> <a href="perfilEditarEmail">Cambiar</a> </li>
          <li class="editarNav">Nombre: <b> {{Auth::User()->first_name}} </b> <a href="perfilEditarNombre">Cambiar</a> </li>
          <li class="editarNav">Apellido: <b> {{Auth::User()->last_name}} </b> <a href="perfilEditarApellido">Cambiar</a> </li>
          <li class="editarNav">Localidad: <b> {{Auth::User()->home}} </b> <a href="perfilEditarLocalidad">Cambiar</a> </li>
          <li class="editarNav">Contraseña: <b> ●●●●●● </b> <a href="perfilEditarContrasenia">Cambiar</a></li>
        </ul>
      </div>

    </div>
  </div>

  <div class='registro-container' style="margin-top: 0;">
    <div class='formulario'>
      <a class='volver' href="/index">INICIO</a> {{-- el href hacia logout--}}
    </div>
  </div>

  @include('partials/footer')

  {{-- si no esta logueado hacia header("Location:login.php");exit;--}}

</body>
</html>
