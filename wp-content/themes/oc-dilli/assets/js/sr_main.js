var $nav = $('.navbar').find('.nav');
var scrollingCurrently = false;

$nav.find('a').on('click', function(e) {
    var target;

    if( !$(e.target).hasClass('more-info') ) {
        target = this.hash;
        if(scrollingCurrently === target){
            return false;
        }
        scrollingCurrently = target;

        e.preventDefault();
        $.scrollTo(target, {
            duration : 1000,
            axis     : 'y',
            offset   : -140
        });
    }

    setTimeout(function(){
        scrollingCurrently = false;
    }, 1000);

    //$('.navbar').find('li').removeClass('highlight');
    //$(this).parent().addClass('highlight');
});


$(window).scroll(function() {
  // Your code here...

  // Example:
  if( $.inViewport('#s4') == 1 ) {
    $('.nav').find('li').removeClass('highlight');
    $('.scroll-s4').parent().addClass('highlight');
  }

  if( $.inViewport('#s3') > 0.2 ) {
    $('.nav').find('li').removeClass('highlight');
    $('.scroll-s3').parent().addClass('highlight');
  }

  if( $.inViewport('#s2') > 0.2 ) {
    $('.nav').find('li').removeClass('highlight');
    $('.scroll-s2').parent().addClass('highlight');
  }

  if( $.inViewport('#s6') == 1 ) {
    $('.nav').find('li').removeClass('highlight');
    $('.scroll-s6').parent().addClass('highlight');
  }

  if( $.inViewport('#s5') > 0.5 ) {
    $('.nav').find('li').removeClass('highlight');
    $('.scroll-s5').parent().addClass('highlight');
  }

  if( $.inViewport('#4') > 0.5 ) {
    $('.nav').find('li').removeClass('highlight');
    $('.scroll-s4').parent().addClass('highlight');
  }

});


$('#Splash .arrow').bind('click', function(e) {
    e.preventDefault();

    $nav.find('.scroll-about').click();
    //$.scrollTo('.nav-affix', 1000, {axis: 'y'});
});

$('.scroll-top').bind('click', function(e) {
    e.preventDefault();

    $.scrollTo('body', 1000, {axis: 'y'});
});

/*$('.scroll-collection').bind('click', function(e) {
    e.preventDefault();

    $.scrollTo('#collection', {
        duration: 1000,
        offset: {
            top: -61
        }
    });
});

$('.scroll-contact').bind('click', function(e) {
    e.preventDefault();

    $.scrollTo('#contact', {
        duration: 1000,
        offset: {
            top: -200
        }
    });
});*/

/***********************
 * For Video resize
 ***********************/
var windowHeight,
    videoWrapperHeight,
    videoWrapperWidthStatic,
    videoWrapperWidthPlaying,
    topNavHeight = $(".nav-affix").height(),
    videoWrapper = $("#video"),
    heightMargin = 10;

function resizeVideo(){
    windowHeight = $(window).height();
    videoWrapperHeight = windowHeight - topNavHeight - heightMargin;
    videoWrapperWidthStatic  = videoWrapperHeight / 0.5681;
    videoWrapperWidthPlaying = videoWrapperHeight / 0.5625;

    videoWrapper.height(videoWrapperHeight);
    videoWrapper.width(videoWrapperWidthStatic);
}

resizeVideo();
$(window).resize(function(){
    resizeVideo();
});



var aspirePlayer = videojs('aspire_video').ready(function(){
    var vid = this;
    vid.on("ended", function(){
        vid.posterImage.show();
        vid.currentTime(0);
    });
});

videoWrapper.find(".play-pause").on("click", function(e){
    e.preventDefault();

    videoWrapper.width(videoWrapperWidthPlaying);
    var that = $(this);
    if(that.hasClass("fa-play")){
        that.removeClass("fa-play");
        that.addClass("fa-pause");
        aspirePlayer.play();
    }else{
        that.removeClass("fa-pause");
        that.addClass("fa-play");
        aspirePlayer.pause();
    }
});


$('.social-icons li').mouseenter(function(){
    $(this).removeClass('opaque');
    $(this).siblings().addClass('opaque');
});


$('.social-icons li').mouseleave(function(){
    $(this).removeClass('opaque');
    $(this).siblings().removeClass('opaque');
});

/*$('#Select-Country').find('li').click(function(e){
    e.preventDefault();
    
    var value = $(this).attr('value');
    
    $('#Country-Selected').val(value)
    console.log('user has chosen:', value );
});*/



if( $('html').hasClass('lt-ie7') || !Modernizr.testAllProps('pointerEvents') ) {
    // If IE6 OR pointer events not supported, remove map shadow
    $('.map-container').find('.depth-shadow').remove();
    console.log('IE6 or Pointer Events not supported. Removing map shadow.');
} else if( Modernizr.testAllProps('pointerEvents') && !$('html').hasClass('boxshadow') ) {   
    // If browser supports pointer events but does not support box-shadow, add fallback shadow png image
    $('.map-container').find('.depth-shadow').addClass('depth-shadow-fallback');
}