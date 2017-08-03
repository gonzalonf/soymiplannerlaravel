<style media="screen">

    #content{
        min-width: 270px;  
        background-color: rgba(0, 0, 0, 0.1);
    }
    #search_products {
        height: 35px;
        border: none;
        position: relative;
        top: 2.3px;
        width: 70%;
        margin: auto;
    }
    .buscador {
        text-align: center;
        margin: 7px auto;

    }
    .tag_search{
        margin:0.5em;
        padding: 0.5em;
        background: lightblue;
        overflow: hidden;
        border-radius: 3px;
        box-sizing: border-box;
    }
    .tag_search a:hover{
        text-decoration: none;
        font-weight: bold;
    }
    .tag_search a{
        float: right;
    }
</style>
{{-- los estilos llevarlos al css --}}

 <div id='content' class='row-fluid'>


    <form class="buscador" method="get" action="/products/filter">

		<input type="search" name="q"  id="search_products" placeholder="Buscá" value="">
        <button class="btn btn-danger" type="submit">
            <span class=" glyphicon glyphicon-search"></span>
        </button>


        @if (isset( $_GET['q']) && trim($_GET['q'])!=='')
            <div class="tag_search">
                <b>{{ '"'.$_GET['q'].'"' }}</b>
                <a href="#">X</a>
            </div>
        @endif
        @if (isset(request()->cat))
            <div class="tag_search">
                @foreach ($categories as $cat)
                    @if ($cat->id == request()->cat)
                        <b>{{$cat->category_name}}</b>
                    @endif
                @endforeach
                <a href="#">X</a>
            </div>
        @endif


        <div class="" style="text-align: left; padding:1em;">


        	<h4>Ordenar Publicaciones</h4>


            <select class="" name="order">
                <option value="">Orden</option>
        	    <option {{request()->order=='mayor'?'selected':''}} value="mayor">Mayor Precio</option>
                <option {{request()->order=='menor'?'selected':''}} value="menor">Menor Precio</option>
        	</select>

            <h4>Ubicación</h4>
        	{{-- Ojaldre... esto debería venir de una nueva DB, no hardcodeado --}}
            <select placeholder="hola" class="" name="city" >
                <option>Elegir Zona</option>
                @foreach ($locations as $loc)
                    <option
                        @if (request()->city==$loc->id)
                                {{'selected'}}
                        @endif
                    value={{$loc->id}}>
                        {{$loc->location}}
                    </option>
                @endforeach
        	</select>


            {{-- NOTA: los radios van en hidden cuando tenga JS --}}
            <h4>Categorias</h4>
            <ul class="nav nav-tabs nav-stacked">
                @foreach ($categories as $cat)
                    @if ($cat->subcategory_child_of_id == null )
                        <li>
                            <input  type="radio" name="cat" value="{{$cat->id}}" id="{{$cat->id}}">
                            <label for="{{$cat->id}}">
                                {{$cat->category_name}}
                            </label>
                            {{-- traer subcategorias --}}
                            <ul style="font-size:0.8em; margin-left:1em;">
                            @foreach ($categories as $subcat)
                                @if ($subcat->subcategory_child_of_id == $cat->id )
                                    <li>
                                        <input  type="radio" name="cat" value="{{$subcat->id}}" id="{{$subcat->id}}">
                                    <label for="{{$subcat->id}}">
                                        {{$subcat->category_name}}
                                    </label>
                                    </li>
                                @endif
                            @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>

{{--
            CAT X(volver)
                subcategory
                subcategory --}}





        	</div>
    </form>
 </div>

