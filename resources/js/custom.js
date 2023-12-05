window.onload = function() {

    var pageTitle = document.title;
    var attentionMessage = "Hot and Fresh Pizzas! 🍕";
    var blinkEvent = null;
    console.log('hello');
  
    document.addEventListener('visibilitychange', function(e) {
      var isPageActive = !document.hidden;
  
      if(!isPageActive){
        blink();
      }else {
        document.title = pageTitle;
        clearInterval(blinkEvent);
      }
    });
  
    function blink(){
      blinkEvent = setInterval(function() {
        if(document.title === attentionMessage){
          document.title = pageTitle;
        }else {
          document.title = attentionMessage;
        }
      }, 200);
    }
  };