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
            document.forms.search.elements['cat'].forEach(function(e) {
                if (e.checked==true){
                    e.checked=false;
                }
                document.forms.search.elements['cat'].value = '';
                console.log(document.forms.search.elements['cat'].value)

            });
            this.parentNode.remove();
            document.forms.search.submit();
        });
    }


    if (document.getElementById('rem_search')){
        var rem_search = document.getElementById('rem_search');
        rem_search.addEventListener('click',function(){
            document.forms.search.elements['search'].value = '';
            document.forms.search.submit();
        });
    }

    if (document.getElementById('rem_loc')){
        var rem_loc = document.getElementById('rem_loc');
        rem_loc.addEventListener('click',function(){
            document.forms.search.elements['city'].value = '';
            this.parentNode.remove();
            document.forms.search.submit();
        });
    }


    document.forms.search.addEventListener('change',function(){
        this.submit();
        console.log('change');
    });

    console.log("JS cargado");

});// Fin ON LOAD!!
}(window,document));