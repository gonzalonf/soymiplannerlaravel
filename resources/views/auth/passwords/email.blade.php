<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Olvide Contraseña</title>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

    @include('partials/nav')

    <!-- inicia el CONTENEDOR para el Registro -->

    <div class='registro-container'>
        <div class='crear-cuenta'>
            <h1>Olvide Contraseña - Solicitar nueva contraseña al correo</h1>
            <hr>
        </div>

        <form class='formulario' method='POST' action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <input type='email' id="email" class='decorative-input-mail' placeholder='Correo electronico' name='email' value="{{ old('email') }}" required> <br>

            @if ($errors->has('email'))
            <p class='msj_error'> {{ $errors->first('email') }}</p>
            @endif       

            @if (session('status'))
            <p class='msj_error' style="color: green;"> {{ session('status') }} <p>
                @endif

                <button type='submit' class='enviar'><strong>CONFIRMAR</strong></button>
                <br>

            </div>
        </form>
    </div>

    <div class='registro-container' style="margin-top: -50px;">
        <div class='formulario'>
            <a class='volver' href="/">VOLVER</a>
        </div>
    </div>

    @include('partials/footer')

</body>
</html>