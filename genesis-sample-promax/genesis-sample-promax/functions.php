<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), CHILD_THEME_VERSION, true );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support align full gutenberg blocks
add_theme_support( 'align-wide' );

//* Add support for widget shortcode working
add_filter( 'widget_text', 'do_shortcode' );

// Remove Footer
remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);

// Add Theme support to add logo from customizer
add_theme_support(
    'genesis-custom-logo',
    [
        'height'      => 120,
        'width'       => 700,
        'flex-height' => true,
        'flex-width'  => true,
    ]
);
remove_action( 'after_setup_theme', 'genesis_output_custom_logo', 11 );
add_action( 'after_setup_theme', 'theme_prefix_output_custom_logo', 11 );
/**
 * Adds the WordPress custom logo inside a custom area.
 */
function theme_prefix_output_custom_logo() {

	if ( current_theme_supports( 'genesis-custom-logo' ) ) {
		add_action( 'genesis_site_title', 'the_custom_logo', 0 );
	}

}

//Remove H1 as site title
add_filter( 'genesis_pre_get_option_home_h1_on', '__return_true' );


