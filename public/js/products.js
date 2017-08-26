;(function(window,document,undefined){
window.addEventListener('DOMContentLoaded',function(){

    var cats = document.getElementsByClassName('cat_parent_label');
    var cats_radio = document.getElementsByClassName('cat_radio');


    Object.keys(cats).forEach( function(v){
        var popup = document.getElementsByClassName('subcat')[v];

        cats[v].addEventListener('click', function(){
            popup.classList.toggle('show');
        });
        var parent_radio = cats[v].parentNode.children[0];
        var subcat_container = cats[v].parentNode.children[2];

        if ( parent_radio.checked===false ) {
            subcat_container.classList.remove('show');
            Object.values(subcat_container.children).forEach(function(v){
                if (v.children[0].checked){
                    subcat_container.classList.add('show');
                }
            })

        }
    });


    if (document.getElementById('rem_cat')){
        var rem_cat = document.getElementById('rem_cat');
        rem_cat.addEventListener('click',function(){
            document.forms[0].elements['cat'].forEach(function(e) {
                if (e.checked==true){
                    e.checked=false;
                }
                document.forms[0].elements['cat'].value = '';
                console.log(document.forms[0].elements['cat'].value)

            });
            this.parentNode.remove();
            document.forms[0].submit();
        });
    }


    if (document.getElementById('rem_search')){
        var rem_search = document.getElementById('rem_search');
        rem_search.addEventListener('click',function(){
            document.forms[0].elements['search'].value = '';
            document.forms[0].submit();
        });
    }

    if (document.getElementById('rem_loc')){
        var rem_loc = document.getElementById('rem_loc');
        rem_loc.addEventListener('click',function(){
            document.forms[0].elements['city'].value = '';
            this.parentNode.remove();
            document.forms[0].submit();
        });
    }


    document.forms[0].addEventListener('change',function(e){

        this.submit();

    });


    console.log("JS cargado");

});// Fin ON LOAD!!
}(window,document));