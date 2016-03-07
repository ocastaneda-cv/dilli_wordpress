jQuery( document ).ready(function() {
     jQuery('body').css('margin-bottom', jQuery('.footer').height()+0);
});


 var bumpIt = function() {  
      jQuery('body').css('margin-bottom', jQuery('.footer').height()+20);
    },
    didResize = false;

bumpIt();

jQuery(window).resize(function() {
  didResize = true;
});
setInterval(function() {  
  if(didResize) {
    didResize = false;
    bumpIt();
  }
}, 250);


