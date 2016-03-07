$(document).ready(function(){

$(".click").click(function(evn){
      evn.preventDefault();
     $('html,body').stop(true).scrollTo((this.hash, this.hash),1000, {axis: 'y'});
      return false;
});

$('body').scrollspy({ target: '#navbar' })
 
var
videoWrapper = $("#video");

var dilli_video = videojs('dilli_video').ready(function(){
    var vid = this;
    vid.on("ended", function(){
        vid.posterImage.show();
        vid.currentTime(0);
        vid.wmode(transparent);
    });

});

videoWrapper.find(".play-pause").on("click", function(e){
    e.preventDefault();

    var that = $(this);
    if(that.hasClass("fa-play")){
        that.removeClass("fa-play");
        that.addClass("fa-pause dim");
        dilli_video.play();
    }else{
        that.removeClass("fa-pause dim");
        that.addClass("fa-play");
        dilli_video.pause();
    }
});

videoWrapper.on("click", function(e){
    e.preventDefault();

    var that = $(".play-pause");
    if(that.hasClass("fa-play")){
        that.removeClass("fa-play");
        that.addClass("fa-pause dim");
        dilli_video.play();
    }else{
        that.removeClass("fa-pause dim");
        that.addClass("fa-play");
        dilli_video.pause();
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


$('.more').on("click", function() {
  var el = $(this);
  el.text() == el.data("text-swap") 
    ? el.text(el.data("text-original")) 
    : el.text(el.data("text-swap"));
    $(el).parent().toggleClass('show-toggle');
});


});