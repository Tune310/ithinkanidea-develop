<?php
/**
 * Marketably Astra Staging Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marketably Astra Staging
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_MARKETABLY_ASTRA_STAGING_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'marketably-astra-staging-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_MARKETABLY_ASTRA_STAGING_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
/** Enque Custom Styles **/

function additional_custom_styles() {
	/*Enqueue The Styles*/
    wp_enqueue_style( 'customstylesheet', get_stylesheet_directory_uri() . '/custom.css' ); 
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );


// Marketably Additions
remove_action( 'admin_notices', 'woothemes_updater_notice' );

//update_option('siteurl','http://www.new-site-address.com');
//update_option('home','http://www.new-site-address.com');

// Custom shortcode to echo current year for copyright
function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');

//Elementor Accordian Closed Upon Load
function elementor_accordion_title() { ?>
  <script>
    jQuery(document).ready(function() {
      jQuery( '.elementor-accordion .elementor-tab-title' ).removeClass( 'elementor-active' );
      jQuery( '.elementor-accordion .elementor-tab-content' ).css( 'display', 'none' );
    });
  </script>
<?php }
add_action( 'wp_footer', 'elementor_accordion_title', 99 );