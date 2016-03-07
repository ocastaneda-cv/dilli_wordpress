<?php

/**
 * Template Name: section 1
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

 <section id="s1" class="">
 		<div class="row">
          <div class="hidden-xs hidden-ms col-sm-2 cloud-1"></div>
          <div class="col-sm-8 "> 
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>



		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
 
    </div><!-- /col --> 
	<div class="hidden-xs hidden-ms col-sm-2  cloud-2"></div>
      </div><!-- /row -->
      <div class="row second-banner">
        <div class="col-ms-6 no-padding mrg-top-20"><img src="assets/img/kids_banner1.jpg"></div>
        <div class="col-ms-6 no-padding mrg-top-20"><img src="assets/img/kids_banner2.jpg"></div>
      </div>
    </section> <!-- /section -->