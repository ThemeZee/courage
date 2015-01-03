<?php
/**
 * Register General section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'courage_customize_register_general_settings' );

function courage_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'courage_section_general', array(
        'title'    => __( 'General Settings', 'courage' ),
        'priority' => 10,
		'panel' => 'courage_options_panel' 
		)
	);
	
	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'courage_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'courage_control_sidebar', array(
        'label'    => __( 'Theme Layout', 'courage' ),
        'section'  => 'courage_section_general',
        'settings' => 'courage_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'courage' ),
            'right-sidebar' => __( 'Right Sidebar', 'courage')
			)
		)
	);
	
	// Add Footer Settings
	$wp_customize->add_setting( 'courage_theme_options[footer_text]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_footer_text'
		)
	);
    $wp_customize->add_control( 'courage_control_footer_text', array(
        'label'    => __( 'Footer Text', 'courage' ),
        'section'  => 'courage_section_general',
        'settings' => 'courage_theme_options[footer_text]',
        'type'     => 'textarea',
		'priority' => 2
		)
	);
	$wp_customize->add_setting( 'courage_theme_options[credit_link]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_credit_link', array(
        'label'    => __( 'Display Credit Link to ThemeZee on footer line.', 'courage' ),
        'section'  => 'courage_section_general',
        'settings' => 'courage_theme_options[credit_link]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);
	
}

?>