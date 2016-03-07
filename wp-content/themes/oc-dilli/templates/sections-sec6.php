 <?php $query = new WP_Query( 'page_id=82' );
	 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		 <?php 
            $section = get_field('section_id');
            $left_footer_column = get_field('left_footer_column');
            $middle_footer_column = get_field('middle_footer_column');
            $right_footer_column = get_field('right_footer_column');
		 ?>

<div class="container-fluid footerbg">
  <div class="container">
    <section id="s6">
      <div class="row">
        <div class="col-sm-2 hidden-xs hidden-ms birds-bg"></div>
        <div class="col-sm-8">
          <div id="social">
            <?php the_content(); ?>
          </div>
        </div><!-- /col -->
        <div class="col-sm-2 hidden-xs"></div>
      </div><!-- /row -->
      <footer class="row">
        <div class="col-sm-4">
            <?php echo $left_footer_column ?>
        </div>
        <div class="hidden-xs hidden-ms col-sm-4">
          <?php echo $middle_footer_column ?>
        </div><!-- /col-10 -->
        <div class="hidden-xs hidden-ms col-sm-4">
          <?php echo $right_footer_column ?>
        </div>
      </footer><!-- /row -->        
    </section> <!-- /section -->
  </div><!-- /container -->
</div><!-- /container -->





		
		<!-- Stop The Loop (but note the "else:" - see next line). -->
		<?php endwhile; else : ?>
		
		<!-- The very first "if" tested to see if there were any Posts to  -->
		<!--  This "else" part tells what do if there weren't any. -->
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<!-- REALLY stop The Loop. -->
	<?php endif; ?>