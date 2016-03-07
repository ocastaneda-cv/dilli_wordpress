
$(document).ready(function () {
  
  $(window).scroll(function(){
          var window_top = $(window).scrollTop() + 12; 
         // the "12" should equal the margin-top value for nav.stickydiv
          var div_top = $('#checkdiv').offset().top;
          if (window_top >= div_top) {
                  $('nav.navbar').addClass('main-nav-scrolled');
                  $('.sections').addClass('scrolled');
              } else {
                  $('nav.navbar').removeClass('main-nav-scrolled');
                  $('.sections').removeClass('scrolled');
              }
  });  

  $(document).on("scroll", onScroll);

  $('a[href^="#"]').on('.click').click(function(e) {
        e.preventDefault();
        $(document).off("scroll");
        $('a').each(function () {
              $(this).removeClass('active');
         })
        $(this).addClass('active');
        var target = this.hash,
        menu = target;
        $target = $(target);
        $('html, body').stop().animate({
              'scrollTop': $target.offset().top+2
         }, 1600, 'swing', function () {
              window.location.hash = target;
              $(document).on("scroll", onScroll);
            });
        });
  });

  function onScroll(event){
      var scrollPos = $(document).scrollTop();
      $('#main-top #navbar a').each(function () {
         var currLink = $(this);
         var refElement = $(currLink.attr("href"));
          if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
              $('#main-top #navbar ul li a').removeClass("active");
              currLink.addClass("active");
          }
          else{
              currLink.removeClass("active");
          }
      });



$('.scroll-top').bind('click', function(e) {
    e.preventDefault();

    $.scrollTo('body', 1600, {axis: 'y'});
    $.stop().animate;
});

 //Navigation Menu Slider
          $('#nav-expander').click(function(evn){
            evn.preventDefault();
            $('body').toggleClass('nav-expanded');
          });
          $('#nav-close').bind('click',function(e){
            e.preventDefault();
            $('body').removeClass('nav-expanded');
          });
          
          
          // Initialize navgoco with default options
          $(".main-menu").navgoco({
              caret: '<span class="caret"></span>',
              accordion: false,
              openClass: 'open',
              save: true,
              cookie: {
                  name: 'navgoco',
                  expires: false,
                  path: '/'
              },
              slide: {
                  duration: 300,
                  easing: 'swing'
              }
        
  });

}
