<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title></title>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <style type="text/css">
        .datosUsuario{
            display: inline-block;
            width: 28% !important;
            padding-bottom: 12px;
            margin-right: 2%; 
            color: black;
            font-size: .7rem;
            vertical-align: bottom;
            text-align: right;
        }
        .inputUpdate{
            display: inline-block;
            width: 40% !important; 
            font-size: .7rem; 
        }
        .enviarUpdate{
            display: inline-block;
            width: 27% !important; 
            padding: 10px 0; 
            margin-left: 2%;
            font-size: .7rem; 
        }

    </style>
</head>
<body>

    {{-- si esta logueado... --}}
    @include('partials/nav')

    <div class='registro-container editarContainer'>

        <div class='crear-cuenta'>
            <h1 style="font-size: 30px;">MI PERFIL</h1>
            <hr>
        </div>


        <div class="avatar" style="margin-top: 10px;">
         @if (!empty(glob('storage/avatar/'. Auth::User()->id . ".*")[0]) )
         <img src="{{ glob('storage/avatar/'. Auth::User()->id . ".*")[0] }}" alt="avatar">
         @else
         <img src="images/default.png" alt="avatar">
         @endif 
     </div>


     {{-- FORM NOMBRE --}}
     <form class='formulario' method="post" action="{{action('ProfileController@update', Auth::User()->id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        {{-- NOMBRE --}}
        <h2 class="datosUsuario">Nombre: <strong> {{Auth::User()->first_name}} </strong> </h2>
        <input class='decorative-input text-label inputUpdate' type="text" placeholder={{Auth::User()->first_name}} name="first_name" value='{{Auth::User()->first_name}}'>
        <button type='submit' class='enviar enviarUpdate' name='submit'><strong>CAMBIAR</strong></button>

        @if ($errors->has('first_name'))
        <p class='msj_error'>{{ $errors->first('first_name') }}</p>
        @endif

        {{-- APELLIDO --}}
        <input type="hidden" name="last_name" value='{{Auth::User()->last_name}}'>
        
        {{-- LOCALIDAD --}}
        <input type="hidden" name="home" value='{{Auth::User()->home}}'>

        {{-- TEL --}}
        <input type="hidden" name="phone" value='{{Auth::User()->phone}}'>

        {{-- EMAIL --}}
        <input type="hidden" name="email" value='{{Auth::User()->email}}'>

        {{-- PASSWORD --}}
        <input type="hidden" name="password" value='{{Auth::User()->password}}'>
        <input  type='hidden' name='password_confirmation' value='{{Auth::User()->password}}'>
    </form>


    {{-- FORM APELLIDO --}}
    <form class='formulario' method="post" action="{{action('ProfileController@update', Auth::User()->id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        {{-- NOMBRE --}}
        <input type="hidden" name="first_name" value='{{Auth::User()->first_name}}'>

        {{-- APELLIDO --}}
        <h2 class="datosUsuario">Apellido: <strong> {{Auth::User()->last_name}} </strong> </h2>
        <input class='decorative-input text-label inputUpdate' type="text" placeholder={{Auth::User()->last_name}} name="last_name" value='{{Auth::User()->last_name}}'>
        <button type='submit' class='enviar enviarUpdate' name='submit'><strong>CAMBIAR</strong></button>

        @if ($errors->has('last_name'))
        <p class='msj_error'>{{ $errors->first('last_name') }}</p>
        @endif
        
        {{-- LOCALIDAD --}}
        <input type="hidden" name="home" value='{{Auth::User()->home}}'>

        {{-- TEL --}}
        <input type="hidden" name="phone" value='{{Auth::User()->phone}}'>

        {{-- EMAIL --}}
        <input type="hidden" name="email" value='{{Auth::User()->email}}'>

        {{-- PASSWORD --}}
        <input type="hidden" name="password" value='{{Auth::User()->password}}'>
        <input  type='hidden' name='password_confirmation' value='{{Auth::User()->password}}'>
    </form>


    {{-- FORM LOCALIDAD --}}
    <form class='formulario' method="post" action="{{action('ProfileController@update', Auth::User()->id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        {{-- NOMBRE --}}
        <input type="hidden" name="first_name" value='{{Auth::User()->first_name}}'>

        {{-- APELLIDO --}}
        <input type="hidden" name="last_name" value='{{Auth::User()->last_name}}'>
        
        {{-- LOCALIDAD --}}
        <h2 class="datosUsuario">Localidad: <strong> {{Auth::User()->home}} </strong> </h2>
        <input class='decorative-input text-label inputUpdate' type="text" placeholder={{Auth::User()->home}} name="home" value='{{Auth::User()->home}}'>
        <button type='submit' class='enviar enviarUpdate' name='submit'><strong>CAMBIAR</strong></button>

        @if ($errors->has('home'))
        <p class='msj_error'>{{ $errors->first('home') }}</p>
        @endif

        {{-- TEL --}}
        <input type="hidden" name="phone" value='{{Auth::User()->phone}}'>

        {{-- EMAIL --}}
        <input type="hidden" name="email" value='{{Auth::User()->email}}'>

        {{-- PASSWORD --}}
        <input type="hidden" name="password" value='{{Auth::User()->password}}'>
        <input  type='hidden' name='password_confirmation' value='{{Auth::User()->password}}'>
    </form>


    {{-- FORM PHONE --}}
    <form class='formulario' method="post" action="{{action('ProfileController@update', Auth::User()->id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        {{-- NOMBRE --}}
        <input type="hidden" name="first_name" value='{{Auth::User()->first_name}}'>

        {{-- APELLIDO --}}
        <input type="hidden" name="last_name" value='{{Auth::User()->last_name}}'>
        
        {{-- LOCALIDAD --}}
        <input type="hidden" name="home" value='{{Auth::User()->home}}'>

        {{-- TEL --}}
        <h2 class="datosUsuario">Teléfono: <strong> {{Auth::User()->phome}} </strong> </h2>
        <input class='decorative-input text-label inputUpdate' type="text" placeholder={{Auth::User()->phone}} name="phone" value='{{Auth::User()->phone}}'>
        <button type='submit' class='enviar enviarUpdate' name='submit'><strong>CAMBIAR</strong></button>

        @if ($errors->has('home'))
        <p class='msj_error'>{{ $errors->first('phone') }}</p>
        @endif

        {{-- EMAIL --}}
        <input type="hidden" name="email" value='{{Auth::User()->email}}'>

        {{-- PASSWORD --}}
        <input type="hidden" name="password" value='{{Auth::User()->password}}'>
        <input  type='hidden' name='password_confirmation' value='{{Auth::User()->password}}'>
    </form>


    {{-- FORM EMAIL --}}
    <form class='formulario' method="post" action="{{action('ProfileController@update', Auth::User()->id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        {{-- NOMBRE --}}
        <input type="hidden" name="first_name" value='{{Auth::User()->first_name}}'>

        {{-- APELLIDO --}}
        <input type="hidden" name="last_name" value='{{Auth::User()->last_name}}'>
        
        {{-- LOCALIDAD --}}
        <input type="hidden" name="home" value='{{Auth::User()->home}}'>

        {{-- TEL --}}
        <input type="hidden" name="phone" value='{{Auth::User()->phone}}'>

        {{-- EMAIL --}}
        <h2 class="datosUsuario">Email: <strong> {{Auth::User()->email}} </strong> </h2>
        <input class='decorative-input-mail text-label inputUpdate' type="email" placeholder={{Auth::User()->email}} name="email" value='{{Auth::User()->email}}'>
        <button type='submit' class='enviar enviarUpdate' name='submit'><strong>CAMBIAR</strong></button>

        @if ($errors->has('email'))
        <p class='msj_error'>{{ $errors->first('email') }}</p>
        @endif

        {{-- PASSWORD --}}
        <input type="hidden" name="password" value='{{Auth::User()->password}}'>
        <input  type='hidden' name='password_confirmation' value='{{Auth::User()->password}}'>
    </form>


    {{-- FORM PASSWORD--}}
    <form class='formulario' method="post" action="{{action('ProfileController@update', Auth::User()->id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">

        {{-- NOMBRE --}}
        <input type="hidden" name="first_name" value='{{Auth::User()->first_name}}'>

        {{-- APELLIDO --}}
        <input type="hidden" name="last_name" value='{{Auth::User()->last_name}}'>
        
        {{-- LOCALIDAD --}}
        <input type="hidden" name="home" value='{{Auth::User()->home}}'>

        {{-- TEL --}}
        <input type="hidden" name="phone" value='{{Auth::User()->phone}}'>

        {{-- EMAIL --}}
        <input type="hidden" name="email" value='{{Auth::User()->email}}'>

        {{-- PASSWORD --}}
        <h2 class="datosUsuario">Contraseña:</h2>
        <input class='decorative-input-password text-label inputUpdate' type="password" placeholder='●●●●●●' name="password" {{-- required --}}>
        <div class='enviarUpdate'></div><br>

        @if ($errors->has('password'))
        <p class='msj_error'>{{ $errors->first('password') }}</p>
        @endif

        {{-- PASSWORD CONFIRM --}}
        <h2 class="datosUsuario">Confirmar contraseña:</h2>
        <input class='decorative-input-password text-label inputUpdate' type='password' name='password_confirmation' placeholder='●●●●●●' {{-- required --}}> 
        <button type='submit' class='enviar enviarUpdate' name='submit'><strong>CAMBIAR</strong></button><br>
    </form>


    <div class='formulario'>
        <a class='volver' href="/">INICIO</a>
    </div>

</div>


@include('partials/footer')

{{-- si no esta logueado hacia header("Location:login.php");exit;--}}

</body>
</html>