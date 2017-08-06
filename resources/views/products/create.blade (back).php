<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Crear Evento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="favicon" href="images/favicon.png">
  </head>
  <body>
  @include('partials/nav')

 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 style="margin: 30px 0">Crear Publicación</h1>
                <form action="/create" method="POST" id="create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if ($errors->any())
                    {{-- como pasar errores campo por campo ????--}}
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Nombre de la Publicación</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}} " autofocus>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" name="price" id="price" value="{{ old('price')}} " class="form-control">
                        <label for="conv">A convenir</label>
                        <input type="checkbox" onclick="if(this.checked){a()}" name="a convenir" id="conv">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" name="description" value="{{old('description')}}" id="description" class="form-control">
                    </div>
                    
                        
                    <div class="form-group">
                        <label for="category">Elige la Categoria</label>
                          <select name="category" class="form-control" id="exampleSelect1">
                          {{-- el primer value debe ser vacio--}}
                          <option selected="selected">-</option>
                          <option value="1">Lugar</option>
                          <option value="2">Decoracion</option>
                          <option value="3">Servicios</option>
                          <option value="4">Servicios</option>
                          <option value="5">Otros</option>
                         
                        </select>   
                    </div>
                    

                    <div class="form-group form-control-file">
                        <label for="img">Imagen</label>
                        <input type="file" name="image" id="img" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <p>Esta telefono sera mostrado en la publicación</p>
                        <input type="text" name="telefono" value="{{ Auth::User()->phone }}" id="telefono" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="localidad">Localidad</label>
                        <p>Este localidad sera mostrado en la publicación</p>
                        <input type="text" name="localidad" value="{{ Auth::User()->home }}" id="localidad" class="form-control">
                    </div>
                    

                     <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <p>Esta direccion sera mostrado en la publicación</p>
                        <input type="text" name="direccion" value="{{ old('direccion') }}" id="direccion" class="form-control">
                    </div>
                    


                    
     

    <div class="pricing-grid" style="max-width: 750px; margin: 0 auto; display: flex; margin-bottom: 40px; align-items: center;">
        <div class="plan-1" style=" margin:20px; border-radius: 4px; text-align: center; cursor: pointer;">
            <h2>Gratuita</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <ul class="features">
                <li> </li>
                <li></li>
                <li></li>
            </ul>

            <p class="price"> Gratis
            <input type="radio" style="background-color: yellow; padding: 10px; color: black; 
            border-radius: 4px" name=" Gratuita" >
            </p>
        

        </div>

        <div class="plan-2" style="text-align: center; margin: 20px;">
            <h2>Premium</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
            <ul>
                <li> </li>
                <li></li>
                <li></li>
            </ul>
            <p class="price" style="text-align: center;"> mercadolibre $477/90dias <br> Nosotros:<b> $120/90dias </b> </p>
            <input type="radio" style="background-color: yellow; padding: 10px; color: black; 
            border-radius: 4px; margin: auto 50%;" name=" Gratuita" > 
            
            
        </div>

    </div>

    <div class="form-group" style="margin: 30px 0;">
        <input class="btn btn-primary center-block" type="submit" name="enviador" value="Publicar">
  </div>
  </form>
                


           </div>
        </div>
    </div>

    @include('partials/footer')
    <script type="text/javascript">
       
            var precio =document.getElementById('price');
            var x = document.getElementById('conv');
            function a(){
                precio.type='text';
                if(x.checked){
                    precio.value='A convenir'
                } else {
                    precio.value=' ';
                }
                // hay que arreglar este if para que funcione
                
            }
       
    </script>



	
	
  </body>
</html>