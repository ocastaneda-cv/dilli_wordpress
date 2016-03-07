<?php
/**
 * 	Template Name: Section 4 
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/

get_header(); // This fxn gets the header.php file and renders it ?>


<div class="container-fluid">
  <div class="container">

			<?php if ( have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

				<?php $section = get_field( "section_id" ); ?>

					<section id="<?php echo $section; ?>" class=""> 
      					<div class="row why">
							<article class="post">
								<div class="col-sm-12"> 
									<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
										<h1 class='title'>
											<?php the_title(); // Display the page title ?>
										</h1>
									<?php endif; ?>
								</div>
							
								<div class="col-sm-12">
									<?php 
										the_content(); 
										// This call the main content of the page, the stuff in the main text box while composing.
										// This will wrap everything in p tags
									?>
								</div>		
								
							</article>
					    </div><!-- /row -->    
					</section> <!-- /section -->

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

  </div><!-- /container -->
</div><!-- /container fluid -->






<?php get_footer(); // This fxn gets the footer.php file and renders it ?>