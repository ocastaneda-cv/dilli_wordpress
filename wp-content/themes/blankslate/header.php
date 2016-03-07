<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#navbar" onload="javascript:load();">
<div id="checkdiv" class="container-fluid">   
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
              <!--<a id="nav-expander">
              <button type="button" class="navbar-toggle collapsed"> -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <!--</a> -->
            
          
    <?php if ( get_header_image() ) : ?></a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand scroll-top click"><img src="<?php header_image(); ?>" class="img-responsive" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
          </div>
          
          <div id="navbar" class="navbar-right navbar-collapse collapse">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu nav navbar-nav' ) ); ?>
          </div><!--/.nav-collapse -->
        </div>
    </nav>
</div><!--/.main-top -->