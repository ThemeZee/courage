<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );

// Load Customizer Settings
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-header.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-slider.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );

// Add Theme Options section to Customizer
add_action( 'customize_register', 'courage_customize_register_options' );

function courage_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'courage_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'courage' ),
		'description'    => '',
	) );
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = esc_html__( 'Background', 'courage' );
	
	// Add Header Tagline option
	$wp_customize->add_setting( 'courage_theme_options[header_tagline]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_header_tagline', array(
        'label'    => esc_html__( 'Display Tagline below site title.', 'courage' ),
        'section'  => 'title_tagline',
        'settings' => 'courage_theme_options[header_tagline]',
        'type'     => 'checkbox',
		'priority' => 10
		)
	);
	
	// Add Header Image Link
	$wp_customize->add_setting( 'courage_theme_options[custom_header_link]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url'
		)
	);
    $wp_customize->add_control( 'courage_control_custom_header_link', array(
        'label'    => esc_html__( 'Header Image Link', 'courage' ),
        'section'  => 'header_image',
        'settings' => 'courage_theme_options[custom_header_link]',
        'type'     => 'url',
		'priority' => 10
		)
	);
	
	// Add Custom Header Hide Checkbox
	$wp_customize->add_setting( 'courage_theme_options[custom_header_hide]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_custom_header_hide', array(
        'label'    => esc_html__( 'Hide header image on front page', 'courage' ),
        'section'  => 'header_image',
        'settings' => 'courage_theme_options[custom_header_hide]',
        'type'     => 'checkbox',
		'priority' => 15
		)
	);
	
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'courage_customize_preview_js' );

function courage_customize_preview_js() {
	wp_enqueue_script( 'courage-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151202', true );
}


// Embed JS file for Customizer Controls
add_action( 'customize_controls_enqueue_scripts', 'courage_customize_controls_js' );

function courage_customize_controls_js() {
	
	wp_enqueue_script( 'courage-customizer-controls', get_template_directory_uri() . '/js/customizer-controls.js', array(), '20151202', true );
	
	// Localize the script
	wp_localize_script( 'courage-customizer-controls', 'courage_theme_links', array(
		'title'	=> esc_html__( 'Theme Links', 'courage' ),
		'themeURL'	=> esc_url( __( 'https://themezee.com/themes/courage/', 'courage' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=courage&utm_content=theme-page' ),
		'themeLabel'	=> esc_html__( 'Theme Page', 'courage' ),
		'docuURL'	=> esc_url( __( 'https://themezee.com/docs/courage-documentation/', 'courage' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=courage&utm_content=documentation' ),
		'docuLabel'	=>  esc_html__( 'Theme Documentation', 'courage' ),
		'rateURL'	=> esc_url( 'http://wordpress.org/support/view/theme-reviews/courage?filter=5' ),
		'rateLabel'	=> esc_html__( 'Rate this theme', 'courage' ),
		)
	);

}


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'courage_customize_preview_css' );

function courage_customize_preview_css() {
	wp_enqueue_style( 'courage-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20151202' );

}