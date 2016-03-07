<?php
	/*
		Template Name: Single Page Theme Page
	*/


get_header(); // This fxn gets the header.php file and renders it ?>

<div class="container-fluid">
  <div class="container">

			<?php
				$args = array("post_type" => "page", "order" => "ASC", "orderby" => "menu_order");
				$the_query = new WP_Query($args);
			?>
			<?php if(have_posts()):while($the_query->have_posts()):$the_query->the_post(); ?>
			<?php get_template_part("content", "page"); ?>
			<?php endwhile; endif; ?>


  </div><!-- /container -->
</div><!-- /container fluid -->

<!--<?php get_sidebar(); ?> -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>

