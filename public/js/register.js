;(function(window,document,undefined){

window.addEventListener('DOMContentLoaded',function(){
// -----------------------

console.log('js cargado');

var form = document.forms[0];

// var errores
var e_nom = document.getElementsByClassName('msj_error')[0];
var e_ap = document.getElementsByClassName('msj_error')[1];
var e_loc = document.getElementsByClassName('msj_error')[2];
var e_email = document.getElementsByClassName('msj_error')[3];
var e_psw = document.getElementsByClassName('msj_error')[4];
var e_psw2 = document.getElementsByClassName('msj_error')[5];
var e_all = document.getElementsByClassName('msj_error');

// var inputs
var nom = document.querySelector('[name=first_name]');
var ap = document.querySelector('[name=last_name]');
var loc = document.querySelector('[name=home]');
var email = document.querySelector('[name=email]');
var psw = document.querySelector('[name=password]');
var psw2 = document.querySelector('[name=password_confirmation]');


// ON BLUR EMAIL... COMPRUEBA EXISTENCIA
email.addEventListener('blur',function(){
    if (this.value.trim()!==''){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if (this.readyState===4){
                var resp = JSON.parse(this.responseText);
                if (resp.hasOwnProperty('email')){
                    e_email.innerHTML = resp.email;
                    console.log('email inválido');
                } else {
                    e_email.innerHTML = "";
                }
            }
        }

        req.open(this.parentElement.method,this.parentElement.action);
        req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        req.setRequestHeader('X-mail', 'true');

        var mailData = new FormData();
        mailData.append('email',email.value);
        req.send(mailData);
    }
});

// ON SUBMIT!!! Validación....
form.addEventListener('submit',function(e){
    e.preventDefault();
    // limpio errores previos...
    e_nom.innerHTML="";
    e_ap.innerHTML='' ;
    e_loc.innerHTML='' ;
    e_psw.innerHTML='' ;
    e_psw2.innerHTML='' ;

    // validación desde Javascript...

    if (nom.value.trim() == ''){
        e_nom.innerHTML="* Completar el nombre.";
    } else if (nom.value.length > 15) {
        e_nom.innerHTML='* El nombre no puede tener mas de 15 caracteres.';
    }
    if (ap.value.trim() == ''){
        e_ap.innerHTML="* Completar el apellido.";
    } else if (ap.value.length > 15) {
        e_ap.innerHTML='* El apellido no puede tener mas de 15 caracteres.';
    }
    if (loc.value.trim() == ''){
        e_loc.innerHTML="* Completar la localidad.";
    }
    if (email.value.trim() == ''){
        e_email.innerHTML="* Completar el email.";
    }
    if (psw.value == ''){
        e_psw.innerHTML="* Completar la contraseña.";
    } else if (psw.value.length < 6){
        e_psw.innerHTML="* La contraseña debe tener al menos 6 caracteres.";
    }
    if (psw2.value == ''){
        e_psw2.innerHTML="* Confirmar la contraseña.";
    } else if (psw2.value.length < 6){
        e_psw2.innerHTML="* La contraseña debe tener al menos 6 caracteres.";
    } else if (psw2.value !== psw.value) {
        e_psw2.innerHTML = '* Las contraseñas no coinciden.';
    }

    // preparo pedido AJAX...
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){

        if (this.readyState===4){
            if (this.status===200){
                console.log('registro exitoso');
                window.location.replace("login.php");
            } else {
                console.log('registración fallida: hay errores en el formulario');
                var resp = JSON.parse(this.responseText);
                e_nom.innerHTML=(resp.hasOwnProperty('first_name'))?resp.first_name : "";
                e_ap.innerHTML=(resp.hasOwnProperty('last_name'))?resp.last_name : "";
                e_loc.innerHTML=(resp.hasOwnProperty('home'))?resp.home : "";
                e_email.innerHTML=(resp.hasOwnProperty('email'))?resp.email : "";
                e_psw.innerHTML=(resp.hasOwnProperty('password'))?resp.password : "";
                e_psw2.innerHTML=(resp.hasOwnProperty('password_confirmation'))?resp.password_confirmation: "";
            }
        }
    }
    // compruebo que no haya errores antes de mandar...
    errorJS=false;
    for (i in Object.keys(e_all) ){
        if (e_all[i].innerHTML.length > 0){
            errorJS=true;
            break;
        }
    }
    // si no hay manda el request....
    if (!errorJS){
        req.open(this.method,this.action);
        req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        var data = new FormData(form);
        req.send(data);
    }


});

// ----------------------
});
}(window,document));