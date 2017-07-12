;(function (window, document, undefined) {

	window.onload = function () {

		var contFijo = document.querySelector('.contenedorFijo')
		var contMov = document.querySelector('.contenedorMovil')
		var pos = 0
		
		function animarDer() {	

			if (pos <= -(contFijo.clientWidth*3)  ){
				pos = 0
				contMov.style.transform = 'translate(' + pos + 'px)'
				contMov.style.transition = "transform 0s";
			}	

			pos-=contFijo.clientWidth
			contMov.style.transform = 'translate(' + pos + 'px)'
			contMov.style.transition = "transform .4s";
		}

		function animarIz() {	

			if (pos >= 0 ){
				pos = -(contFijo.clientWidth*3)
				contMov.style.transform = 'translate(' + pos + 'px)'
				contMov.style.transition = "transform 0s";
			}	

			pos+=contFijo.clientWidth
			contMov.style.transform = 'translate(' + pos + 'px)'
			contMov.style.transition = "transform .4s";
		}

		setInterval(function(){ animarDer() }, 3000);

		document.querySelector('.buttonLeft').onclick = animarIz

		document.querySelector('.buttonRight').onclick = animarDer

		window.onresize = function(){ location.reload(); }

	}

}(window, document));