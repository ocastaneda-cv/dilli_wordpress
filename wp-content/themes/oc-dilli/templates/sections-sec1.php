 <!-- Start the Loop. -->
 <?php $query = new WP_Query( 'page_id=2' );
	 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		 <?php 
		 $section = get_field('section_id');
		 
		 ?>

			<div class="container-fluid">
			  <div class="container">
			    <section id="<?php echo $section; ?>" class=""> 
			      <div class="row">
			          <div class="hidden-xs hidden-ms col-sm-2 cloud-1"></div>
			          <div class="col-sm-8 ">

										<?php the_content(); 
										// This call the main content of the page, the stuff in the main text box while composing.
										// This will wrap everything in paragraph tags
										?>



			          </div><!-- /col -->
			          <div class="hidden-xs hidden-ms col-sm-2  cloud-2"></div>
			      </div><!-- /row -->
			      <div class="row second-banner">
						<?php 

						// get an image field
						$image1 = get_field('section_1_left_image');
						$image2 = get_field('section_1_right_image');

						// render
						?>

					<div class="col-ms-6 no-padding mrg-top-20"><img src="<?php echo $image1['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
					<div class="col-ms-6 no-padding mrg-top-20"><img src="<?php echo $image2['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			      	</div>
			      </div>

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