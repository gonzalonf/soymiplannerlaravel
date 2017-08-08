<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=yes'>
    <title>PUBLICAR</title>
    <link id='pagestyle' rel='stylesheet' type='text/css' href='../css/style.css'>
    <link rel='icon' type='favicon' href='images/favicon.png'>
</head>
<body>
    @include('partials/nav')

    <div class='registro-container'>
        <div class='crear-cuenta'>
            <h1>PUBLICAR UN SERVICIO O PRODUCTO</h1>
            <hr>
        </div>


        <form class='formulario' action='/create' method='POST' id='create' enctype='multipart/form-data'>
            {{ csrf_field() }}

            @if ($errors->any())
            {{-- como pasar errores campo por campo ????--}}
            <div class='msj_error'>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <input style="margin-bottom: 30px;" type='text' name='name' class='decorative-input-edit' placeholder='Nombre del Servivio o Producto' value='{{old('name')}}' id='description' autofocus>


            <select name='category_id' class='decorative-input-imagen-boton text-label' style='    padding-left: 15px; margin: 5px 0; height: 38px;' id='exampleSelect1' class='decorative-input-edit'>
                {{-- el primer value debe ser vacio--}}
                <option disabled selected value>--Elige la Categoría--</option>
            
                @if ($categories->count() > 0){
                    @foreach ($categories as $cat)
                            <option value="{{$cat->id}}">
                                {{$cat->category_name}}
                            </option>
                    @endforeach
                }
                @endif
            </select> <br>

            <input  type='number' name='price' id='price' class='decorative-input-imagen-boton text-label' style='padding-left: 15px; margin: 5px 0; height: 38px;' placeholder='Precio' value='{{ old('price')}} '><br>


            <label class='text-label' style='display: inline-block;'>A convenir</label>
            <input type='checkbox' style='display: inline-block;' onclick='if(this.checked){a()}' name='a convenir' id='conv'>


            <input style="margin-top: 30px;" type='text' name='description' class='decorative-input-edit' placeholder='Descripción' value='{{old('description')}}' id='description' class='form-control'> <br>


            <label for='img' class='text-label'>Imagen de perfil: </label> <br>
            <input type='file' name='image' id='img' class='decorative-input-imagen-boton'> <br>


            <p class='text-label'>Este telefono sera mostrado en la publicación.</p>
            <input type='text' class='decorative-input-phone text-label' placeholder='Teléfono' name='phone' value='{{ Auth::User()->phone }}' id='telefono' class='form-control'> <br>


            <p class='text-label'>Esta localidad sera mostrada en la publicación.</p>
            <input type='text' class='decorative-input text-label' placeholder='Localidad' name='home' value='{{ Auth::User()->home }}' id='localidad' class='form-control'> <br>


            <p class='text-label'>Esta dirección sera mostrada en la publicación.</p>
            <input type='text' class='decorative-input text-label' placeholder='Direccion' name='address' value='{{ old('address') }}' id='direccion' class='form-control'> <br>


            <div class='' style='max-width: 750px; margin: 0 auto; margin-bottom: 40px; display: flex; align-items: flex-start;'>

                <div class='text-label' style=' margin:20px; flex: 1; flex-flow: column; text-align-last: center !important; cursor: pointer;'>
                    <h2>GRATUITA</h2><br>
                    <p>La publicación GRATUITA es de menor tamaño y no aparece en todas las búsquedas de su categoría.</p><br>
                    <strong>Gratis</strong><br><br>
                    <input type='radio' style='' name='subscription' value="Gratuita" {{ old('subscription')=="Gratuita" ? 'checked='.'"'.'checked'.'"' : '' }} >
                </div>

                <div class='text-label' style=' margin:20px; flex: 1; flex-flow: column; text-align-last: center !important; cursor: pointer;'>
                <h2>PREMIUM</h2><br>
                    <p>La públicacion PREMIUM aparece en las búsquedas de manera destacada.</p><br>
                    mercadolibre $477/90dias <br>
                    <b>Nosotros: $120/90dias </b> <br><br>
                    {{--  <strong>Premium</strong><br> --}}
                    <input type='radio' style='' name='subscription' value="Paga" {{ old('subscription')=="Paga" ? 'checked='.'"'.'checked'.'"' : '' }} >
                </div>

            </div>

            <input class='enviar' type='submit' name='enviador' value='Publicar'>

        </form>
    </div>
</div>
</div>

@include('partials/footer')

<script type='text/javascript'>
    var precio =document.getElementById('price');
    var x = document.getElementById('conv');
    function a(){
        precio.type='text';
        if(x.checked){// hay que arreglar este if para que funcione
            precio.value='A convenir'
        } else {
            precio.value=' ';
        }
    }
</script>

</body>
</html>