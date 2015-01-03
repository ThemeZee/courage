<?php
/**
 * Register Theme Colors section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'courage_customize_register_color_settings' );

function courage_customize_register_color_settings( $wp_customize ) {

	// Add Sections for Theme Colors
	$wp_customize->add_section( 'courage_section_colors', array(
        'title'    => __( 'Theme Colors', 'courage' ),
        'priority' => 60,
		'panel' => 'courage_options_panel' 
		)
	);
	
	// Add settings and controls for theme colors
	$wp_customize->add_setting( 'courage_theme_options[menu_primary_color]', array(
        'default'           => '#333333',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'menu_primary_color', array(
			'label'      => __( 'Header & Menu Color (primary)', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[menu_primary_color]',
			'priority' => 10
		) ) 
	);
	
	$wp_customize->add_setting( 'courage_theme_options[menu_secondary_color]', array(
        'default'           => '#e84747',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'menu_secondary_color', array(
			'label'      => __( 'Header & Menu Color (secondary)', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[menu_secondary_color]',
			'priority' => 20
		) ) 
	);
	
	$wp_customize->add_setting( 'courage_theme_options[post_primary_color]', array(
        'default'           => '#333333',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'post_primary_color', array(
			'label'      => __( 'Post Area Color (primary)', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[post_primary_color]',
			'priority' => 30
		) ) 
	);
	
	$wp_customize->add_setting( 'courage_theme_options[post_secondary_color]', array(
        'default'           => '#e84747',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'post_secondary_color', array(
			'label'      => __( 'Post Area Color (secondary)', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[post_secondary_color]',
			'priority' => 40
		) ) 
	);
	
	$wp_customize->add_setting( 'courage_theme_options[widget_title_color]', array(
        'default'           => '#333333',
		'type'           	=> 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'widget_title_color', array(
			'label'      => __( 'Widget Title Color', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[widget_title_color]',
			'priority' => 50
		) ) 
	);
	
	$wp_customize->add_setting( 'courage_theme_options[widget_link_color]', array(
        'default'           => '#e84747',
		'type'           	=> 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'widget_link_color', array(
			'label'      => __( 'Widget Link Color', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[widget_link_color]',
			'priority' => 60
		) ) 
	);
	
	$wp_customize->add_setting( 'courage_theme_options[slider_primary_color]', array(
        'default'           => '#333333',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'slider_primary_color', array(
			'label'      => __( 'Slider Color (primary)', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[slider_primary_color]',
			'priority' => 70
		) ) 
	);
	
	$wp_customize->add_setting( 'courage_theme_options[slider_secondary_color]', array(
        'default'           => '#e84747',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'slider_secondary_color', array(
			'label'      => __( 'Slider Color (secondary)', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[slider_secondary_color]',
			'priority' => 80
		) ) 
	);
	
	$wp_customize->add_setting( 'courage_theme_options[footer_color]', array(
        'default'           => '#333333',
		'type'           	=> 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'footer_color', array(
			'label'      => __( 'Footer Area Color', 'courage' ),
			'section'    => 'courage_section_colors',
			'settings'   => 'courage_theme_options[footer_color]',
			'priority' => 90
		) ) 
	);
	
}


?>