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
    $wp_customize->add_control( 'courage_control_layout', array(
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
	
	// Add Default Fonts Header
	$wp_customize->add_setting( 'courage_theme_options[default_fonts]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Header_Control(
        $wp_customize, 'courage_control_default_fonts', array(
            'label' => __( 'Default Fonts', 'courage' ),
            'section' => 'courage_section_general',
            'settings' => 'courage_theme_options[default_fonts]',
            'priority' => 2
            )
        )
    );
	
	// Add Settings and Controls for Deactivate Google Font setting
	$wp_customize->add_setting( 'courage_theme_options[deactivate_google_fonts]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_deactivate_google_fonts', array(
        'label'    => __( 'Deactivate Google Fonts in case your language is not compatible.', 'courage' ),
        'section'  => 'courage_section_general',
        'settings' => 'courage_theme_options[deactivate_google_fonts]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);
	
}