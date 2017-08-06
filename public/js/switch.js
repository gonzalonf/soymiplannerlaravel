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