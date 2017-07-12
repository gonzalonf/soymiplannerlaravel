<footer>
		<img class="logoFooter" src="../images/logo.png" height=45px alt="logotipo" class="logo">
	<div class="footerContainer">
	<nav>
		<ul>
			<li><a href="#">Acerca de</a></li>
			<li><a href="#">Usuarios</a></li>
			<li><a href="faq">FAQs</a></li>
			<li><a href="mailto:soymiplanner@soymiplanner.com?subject=feedback">Contacto</a></li>
		</ul>
	</nav>
		<div class="lugar">


			<img class="map" src="../images/mapMarker.png" alt="map" width="30px"
			style="
			display: block;
			margin: auto;
			">

			<a href="https://www.google.com.ar/maps/place/Monroe+860,+C1428BKD+CABA/@-34.5486883,-58.4437777,17z/data=!3m1!4b1!4m5!3m4!1s0x95bcb436f0040d09:0x4aeb76b157369423!8m2!3d-34.5486883!4d-58.4437777" target="_blank">Monroe 860</a>
			<br>
			<a href="#">soymiplanner@soymiplanner.com</a>
			<br>
			<p>011 5263-7400</p>
			<p>Buenos Aires, Argentina</p>
			<br>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3286.192217351854!2d-58.44596638477182!3d-34.548688280473726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb436f0040d09%3A0x4aeb76b157369423!2sMonroe+860%2C+C1428BKD+CABA!5e0!3m2!1ses-419!2sar!4v1493246315817" width="200" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="redesSociales">
			<ul>
				<li><a href="http://www.facebook.com" target="_blank"><img src="../images/f.png" alt="facebook" width="50px"> </a></li>
				<li><a href="http://www.twitter.com" target="_blank"><img src="../images/t.png" alt="twitter" width="50px"> </a></li>
				<li><a href="http://www.youtube.com" target="_blank"><img src="../images/yt.png" alt="YouTube" width="50px"> </a></li>
				<li><a href="http://www.instagram.com" target="_blank"><img src="../images/i.png" alt="Instagram" width="50px"> </a></li>
			</ul>
			<br>
			<br>
		</div>
	</div>
	<p class="copyRight">Copyright © 2017 - Soy mi Planner</p>

	<button onclick="topFunction()" id="myBtn" title="Go to top">↑</button>

	<script>
	window.onscroll = function() {scrollFunction()};

	//cuando baja 100px aparece el boton
	function scrollFunction() {
		if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
			document.getElementById("myBtn").style.display = "block";
		} else {
			document.getElementById("myBtn").style.display = "none";
		}
	}

	// vuelve arriba
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
	</script>

</footer>
