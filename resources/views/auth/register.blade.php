<html>
<head>
    <meta charset='utf-8'>
    <title>Registro</title>
    <link id='pagestyle' rel='stylesheet' type='text/css' href='../css/style.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

    <!-- navegación -->
    @include('partials/nav')

    <!-- inicia el CONTENEDOR para el Registro -->


    <div class='registro-container'>
        <div class='crear-cuenta'>
            <h1>CREAR CUENTA</h1>
            <hr>

        </div>

        <form class='formulario' method='POST' action='{{ route('register') }}' enctype='multipart/form-data'>
            {{ csrf_field() }}

            <input {{-- id='first_name' --}} class='decorative-input text-label' type='text' name='first_name' placeholder='Nombre' value='{{ old('first_name') }}' required autofocus> <br>

            @if ($errors->has('first_name'))
            <p class='msj_error'>{{ $errors->first('first_name') }}</p>
            @endif

            <input {{-- id='last_name' --}} class='decorative-input text-label' type='text' name='last_name' placeholder='Apellido' value='{{ old('last_name') }}' required> <br>

            @if ($errors->has('last_name'))
            <p class='msj_error'>{{ $errors->first('last_name') }}</p>
            @endif

            <select class="decorative-input text-label" style="margin-bottom: 20px;" name="home">
                <option value="">--Seleccioná tu zona--</option>
                @foreach ($locations as  $loc)
                    <option
                        @if (old('home')==$loc->location)
                            {{'selected'}}
                        @endif
                        value="{{$loc->location}}">
                            {{$loc->location}}
                    </option>
                @endforeach
            </select>

            @if ($errors->has('home'))
            <p class='msj_error'>{{ $errors->first('home') }}</p>
            @endif

            <input class='decorative-input-mail text-label' type='tel' name='phone' placeholder='Teléfono' value='{{ old('phone') }}' required autofocus> <br>

            @if ($errors->has('phone'))
            <p class='msj_error'>{{ $errors->first('phone') }}</p>
            @endif            

            <input {{-- id='email' --}} class='decorative-input-mail text-label' type='email' name='email' placeholder='Correo electronico' value='{{ old('email') }}' required autofocus> <br>

            @if ($errors->has('email'))
            <p class='msj_error'>{{ $errors->first('email') }}</p>
            @endif

            <input {{-- id='password' --}} class='decorative-input-password text-label' type='password' name='password' placeholder='Contraseña' required> <br>

            @if ($errors->has('password'))
            <p class='msj_error'>{{ $errors->first('password') }}</p>
            @endif

            <input {{-- id='password-confirm' --}} class='decorative-input-password text-label' type='password' name='password_confirmation' placeholder='Confirmar contraseña' required> <br>

            <label for='avatar' class='text-label'>Imagen de perfil: </label> <br>
            <input class='decorative-input-imagen-boton' type='file' name='avatar'> <br>

                <p class='msj_error'> <!--  $errores['variable'])) {
                    echo $errores['variable'] -->
                </p>

                <div class='checkbox'>
                    <input checked='checked' name='mail-promociones' type='checkbox' value='1'>
                </div>

                <label for='mail-promociones' class='text-label'>  Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre Soy Mi Planner y sus socios.
                </label>
                <br>

                <button type='submit' class='enviar' name='submit' value='registrate'><strong>REGISTRATE</strong></button>
                <br>

                <div class='aclaracion'>
                    <p>Al registrarme, acepto las Condiciones del servicio, la Política de Privacidad y de Cookies.</p>
                    <br>
                </div>

            </form>
        </div>

        @include('partials/footer')

        {{-- <script src='../js/register.js' charset='utf-8'></script> --}}

    </body>
    </html>
