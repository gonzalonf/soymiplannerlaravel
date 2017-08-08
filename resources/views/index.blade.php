@include('partials/head')
<body>

	<!-- navegación -->
	@include('partials/nav')

	<section class="type_portada">

		<div class="contenedorFijo">
			<div class="contenedorMovil">
				<div class="contenido1"></div>
				<div class="contenido2"></div>
				<div class="contenido3"></div>
				<div class="contenido4"></div>
			</div>
		</div>
		<button type="button" class="buttonCarrusel buttonLeft">&lt;</button>
		<button type="button" class="buttonCarrusel buttonRight">&gt;</button>

		<div class="contenedor-responsive ">
			<h2 class="contenedor-responsive-altura">¡Todo lo que necesitás para planificar TU EVENTO!</h2>

			<div class="mainButton">

				<div class="opciones_principales1">
					<a href="{{ url('/event/create') }}">ARMÁ TU EVENTO DESDE CERO</a>
				</div>
				<div class="opciones_principales2">
					<a href="{{ url('/products') }}">EXPLORÁ NUESTRAS PROPUESTAS</a>
				</div>
			</div>

			<form class="buscador" method="get" action="products/filter">
				<label  for="search"> Buscá: <br> </label>
				<input type="search" name="q"  id="search" placeholder="Salones, Catering, Dj, Fotografía, Ambientación, ..." >
				<input type="submit" value="" id=lupita>
			</form>
		</div>
	</section>
	@include ('partials/cuantos_somos')

	@include('partials/quienes_somos')

	@include('partials/faq')


	<!-- footer -->
	@include('partials/footer')

	<script src="../js/carrusel.js"></script>
	<script src="../js/cuantos_somos.js"> </script>
</body>
</html>