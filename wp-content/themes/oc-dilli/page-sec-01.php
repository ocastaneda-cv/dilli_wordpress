<?php 
/**
 * 	Template Name: Section 1 
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>


<div class="container-fluid">
  <div class="container">
    <section id="s1" class=""> 
      <div class="row">
          <div class="hidden-xs hidden-ms col-sm-2 cloud-1"></div>
          <div class="col-sm-8 ">

			<?php if ( have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="post">


						<div class="the-content">
							<?php the_content(); 
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in paragraph tags
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>


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






<?php get_footer(); // This fxn gets the footer.php file and renders it ?>