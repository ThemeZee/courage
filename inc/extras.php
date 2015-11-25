<?php
/**
 * Custom functions that are not template related
 *
 * @package Courage
 */


// Add Default Menu Fallback Function
function courage_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Get Featured Posts
function courage_get_featured_content() {
	return apply_filters( 'courage_get_featured_content', false );
}


/**
 * Adds custom theme design and sidebar layout classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function courage_body_classes( $classes ) {
	
	// Get Theme Options from Database
	$theme_options = courage_theme_options();
		
	// Switch Sidebar Layout to left
	if ( isset($theme_options['layout']) and $theme_options['layout'] == 'left-sidebar' ) :
		$classes[] = 'sidebar-left';
	endif;
	
	// Add Theme Design class
	if ( isset($theme_options['design']) and $theme_options['design'] == 'boxed' ) :
		$classes[] = 'boxed-design';
	endif;

	return $classes;
}
add_filter( 'body_class', 'courage_body_classes' );


// Change Excerpt Length
add_filter('excerpt_length', 'courage_excerpt_length');
function courage_excerpt_length($length) {
    return 60;
}


// Slideshow Excerpt Length
function courage_slideshow_excerpt_length($length) {
    return 32;
}

// Frontpage Category Excerpt Length
function courage_frontpage_category_excerpt_length($length) {
    return 20;
}


// Change Excerpt More
add_filter('excerpt_more', 'courage_excerpt_more');
function courage_excerpt_more($more) {
    
	// Get Theme Options from Database
	$theme_options = courage_theme_options();

	// Return Excerpt Text
	if ( isset($theme_options['excerpt_text']) and $theme_options['excerpt_text'] == true ) :
		return ' [...]';
	else :
		return '';
	endif;
}