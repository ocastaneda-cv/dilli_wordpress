jQuery(document).ready(function(){

    /* jQuery(".click").click(function(evn){
          evn.preventDefault();
         jQuery('html,body').stop(true).scrollTo((this.hash, this.hash),1000, {axis: 'y'});
          return false;
    });
  */
    jQuery('body').scrollspy({ target: '#navbar' });
    

    var
    videoWrapper = jQuery("#video");
    var
    videoCont = jQuery("#video-cont"); 

    var dilli_video = videojs('#dilli_video').ready(function(){
    var vid = this;
        vid.on("ended", function(){
            vid.posterImage.show();
            vid.currentTime(0);
            vid.wmode(transparent);
        });

    });

    videoWrapper.find('.play-pause').on("click", function(e){
        e.preventDefault();
        var that = jQuery(this);
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

 /*   
        videoCont.on("click", function(e){
        e.preventDefault();

        var that = jQuery(".play-pause");
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
    
*/    
    

    jQuery('.social-icons li').mouseenter(function(){
        jQuery(this).removeClass('opaque');
        jQuery(this).siblings().addClass('opaque');
    });


    jQuery('.social-icons li').mouseleave(function(){
        jQuery(this).removeClass('opaque');
        jQuery(this).siblings().removeClass('opaque');
    });


    jQuery('.more').on("click", function() {
      var el = jQuery(this);
      el.text() == el.data("text-swap") 
        ? el.text(el.data("text-original")) 
        : el.text(el.data("text-swap"));
        jQuery(el).parent().toggleClass('show-toggle');
    });


});