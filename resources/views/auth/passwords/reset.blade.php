<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Ingrese Nueva Contraseña</title>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style type="text/css">
        .registro-container {
            display: block;
            text-align: left;
            font-size: 7px;
            padding-top: 10px;
        }

        .crear-cuenta{
            width: 80%;
            margin: auto;
            text-align: center;
        }

        .formulario {
            color: #ff5a5f;
            width: 70%;
            margin: 12px auto;
        }

        .decorative-input, .decorative-input-mail, .decorative-input-password{
            background: #f4f4f4;
            border: 1px solid lightgrey;
            background-repeat: no-repeat;
            background-image: url(../images/text-field-icons.png);
            box-sizing: border-box;
            display: block;
            width: 100%;
            height: 40px;
            background-size: 40px 171px;
            border-radius: 3px;
            padding-left: 15px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .decorative-input{
            background-position: right 9px;
        }

        .decorative-input-mail {
            background-position: right -40px;
        }

        .decorative-input-password {
            background-position: right -90px;
        }

        .decorative-input-fecha {
            background: #f4f4f4;
            border: 1px solid lightgrey;
            box-sizing: border-box;
            display: inline-block;
            text-align: justify;
            width: 32.5%;
            height: 40px;
            border-radius: 3px;
            padding-left: 15px;
            margin-top: 5px;
            margin-bottom: 5px;
            color: grey;
        }

        .decorative-input-imagen-boton {
            background: #f4f4f4;
            border: 1px solid lightgrey;
            box-sizing: border-box;
            display: block;
            width: 100%;
            border-radius: 3px;
            margin-top: -5px;
            font-size: 14px;
            cursor: pointer;
        }

        .text-label {
            display: block;
            text-align-last: left;
            color: grey;
            font-size: 12px;
        }

        .checkbox{
            cursor: pointer;
            line-height: normal;
            padding-right: 9px;
            margin-bottom: 50px;
            float: left;
        }

        .me-gustaria{
            text-align-last: justify;
            font-size: 12px;
            color: grey;
        }

        .enviar{
            padding: 14px;
            box-sizing: border-box;
            border: none;
            outline: none;
            background-color: #ff5a5f;
            color: #fff;
            width: 100% !important;
            font-weight: bold;
            font-size: 16px;
        }

        .enviar:hover{
            background: #ed878a;
        }


        .aclaracion{
            margin: 10px 0;
            text-align: center;
            color: grey;
            font-size: 9px;
        }

        .volver{
            display: block;
            text-align: center;
            padding: 14px;
            box-sizing: border-box;
            border: none;
            outline: none;
            background-color: #ff5a5f;
            color: #fff;
            width: 100% !important;
            font-weight: bold;
            font-size: 16px;
        }

        .volver a{
            padding: 14px 42%;
        }

        .volver:hover{
            background: #ed878a;
        }

        .dato-generico{
            margin: 20px;
            color: black;
            font-size: 20px;
        }

        .input-oculto {
            height: 0; 
            width: 0;
            opacity: 0; 
        }

        .msj_error {
            margin-left: 25px;
            margin-top: -5px;
            margin-bottom: 15px;
            font-size: 12px;
            color: red;
        }

        .editarContainer{
            margin: 0 auto; /* centrado */
            text-align: center;
        }

    </style>
</head>
<body>

 {{--    @include('partials/nav') --}}

    <!-- inicia el CONTENEDOR para el Registro -->

    <div class='registro-container'>
        <div class='crear-cuenta'>
            <h1>Olvide Contraseña - Solicitar nueva contraseña al correo</h1>
            <hr>
        </div>

        <form class='formulario' method='POST' action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <input type='email' id="email" class='decorative-input-mail' placeholder='Correo electronico' name='email' value="{{ $email or old('email') }}" required autofocus> <br>

            @if ($errors->has('email'))
            <p class='msj_error'>{{ $errors->first('email') }}</p>
            @endif

            <input id="password" type="password" class='decorative-input-password text-label' placeholder='Nueva contraseña' name="password" required>

            @if ($errors->has('password'))
            <p class='msj_error'>{{ $errors->first('password') }}</p>
            @endif

            <input id="password-confirm" type="password" class='decorative-input-password text-label' placeholder='Repetir nueva contraseña' name="password_confirmation" required>

            @if ($errors->has('password_confirmation'))
            <p class='msj_error'>{{ $errors->first('password_confirmation') }}</p>
            @endif       

            @if (session('status'))
            <p class='msj_error' style="color: green;"> {{ session('status') }} <p>
                @endif

                <button type='submit' class='enviar'><strong>CONFIRMAR</strong></button>
                <br>

            </div>
        </form>
    </div>

    <div class='registro-container' {{-- style="margin-top: -50px;" --}}>
        <div class='formulario'>
            <a class='volver' href="/">VOLVER</a>
        </div>
    </div>

{{--     @include('partials/footer') --}}
</body>
</html>