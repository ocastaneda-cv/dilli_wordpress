 <!-- Start the Loop. -->
 <?php $query = new WP_Query( array( 'post_type' => 'mainimage') ); 
	 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		 <?php 
		 $section = get_field('section_id');
		 $background = get_field('background_image'); 
		 ?>
			<div class="container-fluid">
				<div class="container">
					<section id="<?php echo $section; ?>" class=""> 
						<div class="row hidden-xs" style="background-image: url(<?php echo $background; ?>);">
						    <div class="col-xs-11 banner-copy">
						    		

									<h2 class="teal"><?php the_field('title_'); ?></h2>
							    	<h1 class="white"><?php the_field('copy_'); ?></h1>
							    	<h2 class="white"><?php the_field('subhead'); ?></h2>

							</div>
					    <div class="col-xs-1 spacer"></div>
					</div>
						<div class="row visible-xs">
					    	<div class="col-xs-12">
					    		<?php
									// check if the post has a Post Thumbnail assigned to it.
									$featured_img = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'single-post-thumbnail' );  ?>
								<?php if ($featured_img) { ?>
					        	<img src="<?php echo $featured_img[0]; ?>" class="img-responsive" />
					        	<?php } 					?>   
					        </div>
					    </div>			 
					</section> <!-- closes the first section box -->
				</div><!-- /container -->
			</div><!-- /container fluid -->
		
		<!-- Stop The Loop (but note the "else:" - see next line). -->
		<?php endwhile; else : ?>
		
		<!-- The very first "if" tested to see if there were any Posts to  -->
		<!--  This "else" part tells what do if there weren't any. -->
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<!-- REALLY stop The Loop. -->
	<?php endif; ?>