<div id='content' class='row-fluid'>
    <form class="buscador" method="get" action="/products/filter">
        <input type="search" name="search"  id="search_products" placeholder="Buscá" value="{{request()->search}}">
        {{-- <input type="hidden" name="search" value="{{$_GET['search']}}"> --}}
        <button class="btn btn-danger" type="submit">
        <span class=" glyphicon{{--  glyphicon-search  --}} lupita" ></span>
        </button>

        @if (isset( $_GET['search']) && trim($_GET['search'])!=='')
        <div class="tag_search">
            <b>{{ '"'.$_GET['search'].'"' }}</b>
            <a href="#" id="rem_search">&#10006;</a>
        </div>
        @endif
        @if (isset(request()->cat))
        <div class="tag_search">
            @foreach ($categories as $cat)
            @if ($cat->id == request()->cat)
            <b>{{$cat->category_name}}</b>
            @endif
            @endforeach
            <a href="#" id="rem_cat">&#10006;</a>
        </div>
        @endif
        @if (isset( request()->city))
        <div class="tag_search">
            <b>
                @foreach ($locations as $loc)
                    @if ($loc->id == request()->city)
                        {{$loc->location}}
                    @endif
                @endforeach
            </b>
            <a href="#" id="rem_loc">&#10006;</a>
        </div>
        @endif

        <div class="filters" >

            <h4>Ordenar Publicaciones</h4>
            <select class="" name="order">
                <option value="">Orden</option>
                <option {{request()->order=='mayor'?'selected':''}} value="mayor">Mayor Precio</option>
                <option {{request()->order=='menor'?'selected':''}} value="menor">Menor Precio</option>
            </select>

            <h4>Ubicación</h4>
            <select placeholder="hola" class="" name="city" >
                <option value="">Elegir Zona</option>
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

            <h4>Categorias</h4>
            <ul class="nav nav-tabs nav-stacked">
                @foreach ($categories as $cat)
                @if ($cat->subcategory_child_of_id == null )
                <li>
                    <input  class="cat_radio cat_parent"
                    type="radio" name="cat" value="{{$cat->id}}" id="{{$cat->id}}"
                    @if (request()->cat && request()->cat==$cat->id)
                        {{ "checked" }}
                    @endif
                    >
                    <label class="cat_label cat_parent_label" for="{{$cat->id}}">
                        {{$cat->category_name}}
                    </label>
                    {{-- traer subcategorias --}}
                    <ul
                        {{-- @if (request()->cat && $cat->id==request()->cat || $cat->subcategory_child_of_id==request()->cat )
                            class="subcat show"
                        @else --}}
                            class="subcat show"
                        {{-- @endif --}}

                    id="subcat_container_{{$cat->id}}">
                        @foreach ($categories as $subcat)
                        @if ($subcat->subcategory_child_of_id == $cat->id )
                        <li>
                            <input class="cat_radio"  type="radio" name="cat" value="{{$subcat->id}}" id="{{$subcat->id}}"
                            @if (request()->cat && request()->cat==$subcat->id)
                                {{ "checked"}}
                            @endif
                            >
                            <label class="cat_label" for="{{$subcat->id}}">
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

        </div>
    </form>
    <script src="../js/products.js" charset="utf-8"></script>
</div>