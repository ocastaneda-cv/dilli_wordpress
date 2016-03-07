<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'naked' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu, 
		// just change the 'primary' to another name
	)
);

/*-----------------------------------------------------------------------------------*/
/* Adding custom anchor class to main navigation
/*-----------------------------------------------------------------------------------*/

function add_anchorclass( $anchorclass ) {
        return preg_replace( '/<a /', '<a class="click"', $anchorclass );
    }

add_filter( 'wp_nav_menu', 'add_anchorclass' );



/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );




/*-----------------------------------------------------------------------------------*/
/* bootstrap slider
/*-----------------------------------------------------------------------------------*/

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'bootstrap-js' );
	
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

// Create Slider Post Type
require( get_template_directory() . '/inc/slider/slider_post_type.php' );
// Create Slider
require( get_template_directory() . '/inc/slider/slider.php' );


if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
}

// Enqueue Scripts/Styles for our Lightbox
function cvboot_add_lightbox() {
    //wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/inc/lightbox/js/jquery.fancybox.pack.js', array( 'jquery' ), false, true );
    //wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/inc/lightbox/js/lightbox.js', array( 'fancybox' ), false, true );
    //wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/inc/lightbox/css/jquery.fancybox.css' );
}
add_action( 'wp_enqueue_scripts', 'cvboot_add_lightbox' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );



/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 

	
    // get the theme directory style.css and link to it in the header
	wp_enqueue_style( 'mystyle', get_template_directory_uri() . '/assets/css/styles.css', '10000', 'all' );
    
    
    //these get loaded in footer
    
    
    // add theme scripts
	wp_enqueue_script( 'oc-boot', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), NAKED_VERSION, true );

    // add theme scripts
	wp_enqueue_script( 'oc-scripts', get_template_directory_uri() . '/assets/js/vendor/videojs/video.js', array('jquery'), NAKED_VERSION, true );

    // add theme scripts
	//wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/assets/js/jquery.scrollTo.js', array('jquery'), NAKED_VERSION, true );

    // add theme scripts
	wp_enqueue_script( 'oc-custom_scripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), NAKED_VERSION, true );
    
    // add theme scripts
	wp_enqueue_script( 'oc-main_scripts', get_template_directory_uri() . '/assets/js/main_01.js', array('jquery'), NAKED_VERSION, true );
  

  
}

add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header
