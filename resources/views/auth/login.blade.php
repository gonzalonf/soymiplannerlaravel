{{-- @extends('layouts.app')

@section('content') --}}

{{-- <script src="../js/login.js" charset="utf-8"></script> --}}

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LOGIN</title>
  <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <link rel="icon" type="favicon" href="images/favicon.png">
</head>
<body>
  @include('partials/nav')

  <form class="caja-login" style="height: auto;" action="{{ route('login') }}" method="POST">
      {{ csrf_field() }}

      <div class="login-container-arriba">

      </div>
      <div class="logear-con">
          <ul>
            <h2>INGRESAR CON</h2>
            <li><a class="boton-logear-con-red" href="#"><img src="../images/facebook.png" alt="facebook"></a></li>
            <li><a class="boton-logear-con-red" href="#"><img src="../images/linkedin.png" alt="linkedIn"></a></li>
        </ul>
    </div>
    <div class="login-container">

      <label for='email'><b>Correo Electrónico</b></label>
      <input id='email' class="login-input" type="email" placeholder="Correo Electrónico" name="email" value="{{ old('email') }}" required autofocus>

      @if ($errors->has('email'))
      <p class='msj_error'>{{ $errors->first('email') }}</p>
      @endif

      <label for='password'><b>Clave</b></label>
      <input id='password' class="login-input" type="password" placeholder="Contraseña" name="password" required>

      @if ($errors->has('password'))
      <p class='msj_error'>{{ $errors->first('password') }}</p>
      @endif

      <button type="submit" class="login-botones">INGRESAR</button>

      <label for="recordarme" >Recordarme</label>
      <input style="float:left" type="checkbox" id="recordarme" name="remember" {{ old('remember') ? 'checked' : '' }}>

  </div>

  <div class="login-container-abajo">
      <span class="login-olvidaste"> <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></span>
      <span class="ir-registro"> <a href="register">REGISTRATE!</a></span>
  </div>
</div>
</form>

@include('partials/footer')

</body>
</html>

{{-- @endsection --}}
