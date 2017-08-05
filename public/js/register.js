;(function(window,document,undefined){

    window.addEventListener('DOMContentLoaded',function(){
// -----------------------

// ERRORES
var e_email=document.querySelector('#errorEmail');

// INPUT
var email = document.querySelector('[name=email]');


// ON BLUR EMAIL... COMPRUEBA EXISTENCIA
email.addEventListener('blur',function(){
    if (this.value.trim()!==''){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if (this.readyState===4){
                var resp = JSON.parse(this.responseText);
                if (resp.hasOwnProperty('email')){
                    e_email.innerHTML = resp.email;
                } else {
                    e_email.innerHTML = resp.email;
                }
            }
        }

        req.open('get','/auth');
        req.setRequestHeader('X-Requested-With', 'XMLHttpRequest', true);
        req.setRequestHeader('X-mail', 'true');

        var mailData = new FormData();
        mailData.append('email',email.value);
        req.send(mailData);
    }
});
// -----------------------
});
}(window,document));