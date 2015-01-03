<?php
/**
 * Theme Customizer Functions
 *
 */

/*========================== CUSTOMIZER SANITIZE FUNCTIONS ==========================*/

// Sanitize checkboxes
function courage_sanitize_checkbox( $value ) {

	if ( $value == 1) :
        return 1;
	else:
		return '';
	endif;
}


// Sanitize the layout sidebar value.
function courage_sanitize_layout( $value ) {

	if ( ! in_array( $value, array( 'left-sidebar', 'right-sidebar' ), true ) ) :
        $value = 'right-sidebar';
	endif;

    return $value;
}


// Sanitize footer content textarea
function courage_sanitize_footer_text( $value ) {

	if ( current_user_can('unfiltered_html') ) :
		return $value;
	else :
		return stripslashes( wp_filter_post_kses( addslashes($value) ) );
	endif;
}


// Sanitize the post length value.
function courage_sanitize_post_length( $value ) {

	if ( ! in_array( $value, array( 'index', 'excerpt' ), true ) ) :
        $value = 'index';
	endif;

    return $value;
}


// Sanitize the slider animation value.
function courage_sanitize_slider_animation( $value ) {

	if ( ! in_array( $value, array( 'horizontal', 'fade' ), true ) ) :
        $value = 'horizontal';
	endif;

    return $value;
}

?>