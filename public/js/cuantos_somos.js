;(function (window, document, undefined) {

  function ajax() {
    var contador = document.querySelector(".contador");
    var req = new XMLHttpRequest();

    req.onreadystatechange=function(){

      if (req.readyState == 4 && req.status == 200) {
        var res = JSON.parse(this.responseText);
        contador.innerText = res;
                  // console.log(res);
                  animateValue("value", 0, res, 2000);
                }
              }

              req.open('GET', '/partials', true);
              req.send();
            }

            ajax();
            setInterval(ajax, 300000);

      // animateValue("value", 0, 257, 2000); // para test

     function animateValue(id, start, end, duration) {
      var range = end - start;
      var current = start;
      var increment = end > start? 1 : -1;
      var stepTime = Math.abs(Math.floor(duration / range));
      var obj = document.getElementById(id);
      
      var timer = setInterval(function() {
        current += increment;
        obj.innerHTML = current;

        if (current == end) {
          clearInterval(timer);
        }
      }, stepTime);
    }

  })(window, document);


  
  

