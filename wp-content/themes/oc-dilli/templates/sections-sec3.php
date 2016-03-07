 <!-- Start the Loop. -->
 <?php $query = new WP_Query( 'page_id=2' );
	 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		 <?php 
		 $section = get_field('section_id');
		 
		 ?>

			<div class="container-fluid">
			  <div class="container">
			    <section id="s3" class=""> 
			      
			    <div class="row">
			    	<div class="col-sm-12">
			    		<?php echo wptuts_slider_template(); ?>
                          <div class="kid-button">
                              <a href="http://www.cvoptical.com/catalog/brand/dilli-dalli.html" class="btn btn-primary kid" target="_blank">SEE FULL COLLECTION</a>
                  </div>
			    	</div><!-- /col -->
			  	</div><!-- /row -->
			  

			    </section> <!-- /section -->
			  </div><!-- /container -->
			</div><!-- /container fluid -->
		
		<!-- Stop The Loop (but note the "else:" - see next line). -->
		<?php endwhile; else : ?>
		
		<!-- The very first "if" tested to see if there were any Posts to  -->
		<!--  This "else" part tells what do if there weren't any. -->
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<!-- REALLY stop The Loop. -->
	<?php endif; ?>