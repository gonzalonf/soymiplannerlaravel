;(function(window,document,undefined){
window.addEventListener('DOMContentLoaded',function(){

console.log('js cargado');

var form = document.forms[0];

// var errores div
var err = document.getElementsByClassName('msj_error')[0].children[0];

// var inputs
var email = document.querySelector('[name=email]');
var psw = document.querySelector('[name=password]');


// ON SUBMIT
form.addEventListener('submit',function(e){
    e.preventDefault();
    if (email.value.trim()==='' || psw.value.trim()===''){
        err.innerText = "* Debe completar todos los campos";
    } else {
        err.innerText = "";
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if (this.readyState===4){
                var resp = JSON.parse(this.responseText);

                if (this.status===200){
                    // ¡no hay errores!
                    console.log('ingreso exitoso');
                    window.location.replace("perfil.php");

                } else {
                    console.log('credenciales incorrectas');
                    var keys = Object.keys(resp);
                    keys.forEach( function(k){
                        var error = document.createElement('li');
                        var msj = resp[k];
                        error.innerHTML = msj;
                        err.append(error);
                    });
                }
            }
        }
        req.open(this.method,this.action);
        req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        var data = new FormData(form);
        req.send(data);
    }
}); //fin ON SUBMiIT!

});// Fin ON LOAD!!
}(window,document));