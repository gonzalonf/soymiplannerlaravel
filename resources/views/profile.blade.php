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

    <div class='registro-container editarContainer'>

        <div class='crear-cuenta'>
            <h1 style="font-size: 30px;">MI PERFIL</h1>
            <hr>
        </div>

        <div class="avatar" style="margin-top: 10px;">
            @if (file_exists(glob('storage/avatar/'. Auth::User()->id . ".*")[0]) )
            <img src="{{ glob('storage/avatar/'. Auth::User()->id . ".*")[0] }}" alt="avatar">
            @else
            <img src="images/default.png" alt="avatar">
            @endif
        </div>

        <form class='formulario' method="post" action="{{action('ProfileController@update', Auth::User()->id)}}">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">

        {{-- NOMBRE --}}
            <input class='decorative-input text-label' style="width: 67% !important; display: inline-block;" type="text" placeholder={{Auth::User()->first_name}} name="first_name" value='{{Auth::User()->first_name}}'>
            <button type='submit' class='enviar' style="width: 30% !important; padding: 10px; margin-left: 2%;" name='submit'><strong>CAMBIAR</strong></button>
            <br>

            @if ($errors->has('first_name'))
            <p class='msj_error'>{{ $errors->first('first_name') }}</p>
            @endif

        {{-- APELLIDO --}}
            <input class='decorative-input text-label' style="width: 67% !important; display: inline-block;" type="text" placeholder={{Auth::User()->last_name}} name="last_name" value='{{Auth::User()->last_name}}'>
            <button type='submit' class='enviar' style="width: 30% !important; padding: 10px; margin-left: 2%;" name='submit'><strong>CAMBIAR</strong></button>
            <br>

            @if ($errors->has('last_name'))
            <p class='msj_error'>{{ $errors->first('last_name') }}</p>
            @endif

        {{-- BARRIO --}}
            <input class='decorative-input text-label' style="width: 67% !important; display: inline-block;" type="text" placeholder={{Auth::User()->home}} name="home" value='{{Auth::User()->home}}'>
            <button type='submit' class='enviar' style="width: 30% !important; padding: 10px; margin-left: 2%;" name='submit'><strong>CAMBIAR</strong></button>
            <br>

            @if ($errors->has('home'))
            <p class='msj_error'>{{ $errors->first('home') }}</p>
            @endif

        {{-- EMAIL --}}
            <input class='decorative-input-mail text-label' style="width: 67% !important; display: inline-block;" type="email" placeholder={{Auth::User()->email}} name="email" value='{{Auth::User()->email}}'>
            <button type='submit' class='enviar' style="width: 30% !important; padding: 10px; margin-left: 2%;" name='submit'><strong>CAMBIAR</strong></button>
            <br>

            @if ($errors->has('email'))
            <p class='msj_error'>{{ $errors->first('email') }}</p>
            @endif

        {{-- PASSWORD --}}
            <input class='decorative-input-password text-label' style="width: 67% !important; display: inline-block;" type="password" placeholder='●●●●●●' name="password">
            <button type='submit' class='enviar' style="width: 30% !important; padding: 10px; margin-left: 2%;" name='submit'><strong>CAMBIAR</strong></button>
            <br>

            @if ($errors->has('password'))
            <p class='msj_error'>{{ $errors->first('password') }}</p>
            @endif

        </form>

        <div class='formulario'>
            <a class='volver' href="/">INICIO</a>
        </div>

    </div>


    @include('partials/footer')

    {{-- si no esta logueado hacia header("Location:login.php");exit;--}}

</body>
</html>