<?php
/**
 * 	Template Name: main section
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/

get_header(); // This fxn gets the header.php file and renders it ?>



<div class="container">
  <section id="home" class="clearfix">

			

	<?php
	$query = new WP_Query( array( 'post_type' => 'mainimage') );
 
	if ( $query->have_posts() ) : ?>
	
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>

		<?php 

			// get an image field
			$background = get_field('background_image');
			// render
			?>

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
			 

	<?php endwhile; wp_reset_postdata(); ?>
	<!-- show pagination here -->
	<?php else : ?>
	<!-- show 404 error here -->

	<?php endif; ?>

	</section>
	</div><!-- /container -->


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>