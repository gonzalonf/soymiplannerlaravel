<header>
	<div class="barra_superior">
		<input class="burger-check" id="burger-check" type="checkbox"><label for="burger-check" class="burger"></label>

		<div class="logo-marca">
			<a href="/#">
				<img src="{{asset('images/logo2.png')}}" alt="logotipo" class="logo">
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

					<li class="dropdown"> {{Auth::User()->first_name}}
						<div class="mini_avatar">
							@if (!empty(glob('storage/avatar/'. Auth::User()->id . ".*")[0]) )
							<img src="{{ asset (glob('storage/avatar/'. Auth::User()->id . ".*")[0]) }}" height="48px;" alt="avatar">
							@else
							<img src="images/default.png" height="48px;" alt="avatar">
							@endif
						</div>
						<div class="dropdown-menu">
							<ul>
								<li><a href="{{ url('/profile/products') }}">MIS PRODUCTOS</a></li>
								<li><a href="{{ url('/profile/sales') }}">TRANSACCIONES</a></li>
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