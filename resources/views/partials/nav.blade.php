<header>
	<div class="barra_superior">
		<input class="burger-check" id="burger-check" type="checkbox"><label for="burger-check" class="burger"></label>

		<label class="switch">
			<input type="checkbox" id="miCheckbox" onclick="cambiarEstilo(setearCookie());"/>
			<div class="slider round"></div>
		</label>

		<script type="text/javascript">

			window.onload = cambiarEstilo(document.cookie.replace(/(?:(?:^|.*;\s*)checkStatus\s*\=\s*([^;]*).*$)|^.*$/, "$1"))

			function setearCookie(){
				var estado = document.querySelector("#miCheckbox").checked;
				document.cookie = 'checkStatus=' + estado; // aca estoy creando la cookie
				var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)checkStatus\s*\=\s*([^;]*).*$)|^.*$/, "$1"); // aca etoy asignando la cookie a una variable
				return cookieValue
			}

			function cambiarEstilo(miCookie) {
				if (miCookie == 'true') {
					document.querySelector('link#pagestyle').setAttribute('href', '../css/style2.css');
					document.querySelector("#miCheckbox").checked = true;
				} else {
					document.querySelector('link#pagestyle').setAttribute('href', '../css/style.css');
				}
			}

		</script>

		<div class="logo-marca">
			<a href="/#">
				<img src="../images/logo2.png" alt="logotipo" class="logo">
			</a>
		</div>

		<div class="desplegable">
			<nav>
				<ul class="botonera">
					<li><a href="/">INICIO</a></li>
					<li><a href="#type1">NOSOTROS</a></li>
					<li class="preguntas"><a href="#type2">PREGUNTAS</a></li>


                    <li><a href="{{ url('/products') }}">PRODUCTOS</a></li>
                    <li ><a href="{{ url('/create') }}">PUBLICAR</a></li>
                    <li ><a href="{{ url('/event') }}">EVENTO</a></li>


					@if (Auth::guest())
					<li class="ingresa"><a href="{{ url('/login') }}">INGRESA</a></li>
					<li class="registrate"><a href="{{ url('/register') }}">REGISTRATE</a></li>


					@else
					{{ Auth::user()->name }}
					<li  class="dropdown"> {{Auth::User()->first_name}}
						<div class="dropdown-menu">
							<ul>
                                <li><a href="{{ url('/profile/products') }}">MIS PRODUCTOS</a></li>
                                <li><a href="{{ url('/profile/sales') }}">MIS TRANSACCIONES</a></li>
								<li><a href="{{ url('/profile') }}">PERFIL</a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">LOGOUT</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</div>

					@endif

				</ul>
			</nav>
		</div>
	</div>
</header>