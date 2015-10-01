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