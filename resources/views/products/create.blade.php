<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Crear Evento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>

 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Crear Producto</h1>
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
                        <label for="name">Nombre de Producto</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" name="price" id="price" value="{{old('price')}}" class="form-control">
                        <label for="conv">A convenir</label>
                        <input type="checkbox" name="a convenir" id="conv">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" name="description" value="{{old('description')}}" id="description" class="form-control">
                    </div>
                    
                        
                    <div class="form-group">
                        <label for="category">Elige la Categoria</label>
                          <select name="category" class="form-control" id="exampleSelect1">
                          {{-- el primer value debe ser vacio--}}
                          <option selected="selected">---</option>
                          <option value="1">Lugar</option>
                          <option value="2">Decoracion</option>
                          <option value="3">Servicios</option>
                          <option value="4">Otros</option>
                         
                        </select>   
                    </div>
                    

                    <div class="form-group form-control-file">
                        <label for="img">Imagen</label>
                        <input type="file" name="image" id="img" class="form-control">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="enviador" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>



	
	
  </body>
</html>