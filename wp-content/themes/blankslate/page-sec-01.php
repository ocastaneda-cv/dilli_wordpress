<?php

/**
 * Template Name: section 1
 *
 */
?>



<div class="container-fluid">
  <div class="container">
    <section id="s1" class=""> 
      <div class="row">
          <div class="hidden-xs hidden-ms col-sm-2 cloud-1"></div>
          <div class="col-sm-8 ">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
</header>
<section class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>

</section>
</article>

<?php endwhile; endif; ?>
</div><!-- /col -->
          <div class="hidden-xs hidden-ms col-sm-2  cloud-2"></div>
      </div><!-- /row -->
      <div class="row second-banner">
        <div class="col-ms-6 no-padding mrg-top-20"><img src="<?php bloginfo('template_directory'); ?>/assets/img/kids_banner1.jpg"></div>
        <div class="col-ms-6 no-padding mrg-top-20"><img src="<?php bloginfo('template_directory'); ?>/assets/img/kids_banner2.jpg"></div>
      </div>
    </section> <!-- /section -->
  </div><!-- /container -->
</div><!-- /container fluid -->
