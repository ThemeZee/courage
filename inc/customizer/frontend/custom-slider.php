<?php 
/***
 * Custom Javascript Options
 *
 * Passing Variables from custom Theme Options to the javascript files
 * of theme navigation and frontpage slider. 
 *
 */

// Passing Variables to Featured Post Slider Slider ( js/slider.js)
add_action( 'wp_enqueue_scripts', 'courage_custom_slider_params' );

if ( ! function_exists( 'courage_custom_slider_params' ) ) :

function courage_custom_slider_params() { 

	// Get Theme Options from Database
	$theme_options = courage_theme_options();

	// Set Parameters array
	$params = array();

	// Define Slider Animation
	$params['animation'] = $theme_options['slider_animation'];

	// Define Slider Speed
	$params['speed'] = $theme_options['slider_speed'];

	// Passing Parameters to Javascript
	wp_localize_script( 'courage-post-slider', 'courage_slider_params', $params );

	// Passing Parameters to Javascript
	wp_localize_script( 'courage-jquery-navigation', 'courage_mainnav_title', array( 'text' => esc_html__( 'Menu', 'courage' ) ) );

}

endif;
