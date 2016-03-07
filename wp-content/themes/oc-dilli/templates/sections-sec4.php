 <?php $query = new WP_Query( 'page_id=72' );
	 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		 <?php 
            $section = get_field('section_id');
            $video_poster = get_field('video_poster');
            $video_mp4 = get_field('video_mp4');
            $video_webm = get_field('video_webm');
            $video_ogg = get_field('video_ogg');
		 ?>

<div class="container-fluid" id="video-cont">
  <div class="container video-bg">
  <img id="drivein" src="<?php bloginfo('template_directory'); ?>/assets/img/drive-in-01.jpg" class="img-responsive">
    <section id="s4" class="video">
          <div class="row">
        <div class="col-sm-1 hidden-xs"></div>
          <div class="col-sm-10">
           <div id="video" class="video-container">
            <video id="dilli_video" class="video-js vjs-default-skin" controls="true" preload="auto" poster="<?php echo $video_poster['url'];?>" width="640" height="264"  >
                        <source src="<?php echo $video_mp4['url'];?>" type="video/mp4" />
                        <source src="<?php echo $video_webm['url'];?>" type="video/webm" />
                        <source src="<?php echo $video_ogg['url'];?>" type="video/ogg" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>. If on a PC and viewing in Safari also download <a href="https://www.apple.com/quicktime/download/">QuickTime</a>.
                        </p>
                    </video>
                    <a href="" id="btn-play-video" class="play-pause fa fa-play click"></a>
                </div>
                  
          </div><!-- /col-10 -->
        <div class="col-sm-1 hidden-xs"></div>
      </div><!-- /row -->
    </section> <!-- /section -->
    </div>
</div><!-- /container -->





		
		<!-- Stop The Loop (but note the "else:" - see next line). -->
		<?php endwhile; else : ?>
		
		<!-- The very first "if" tested to see if there were any Posts to  -->
		<!--  This "else" part tells what do if there weren't any. -->
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<!-- REALLY stop The Loop. -->
	<?php endif; ?>