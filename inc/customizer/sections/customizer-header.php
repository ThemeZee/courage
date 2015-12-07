<?php
/**
 * Register Header Content section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'courage_customize_register_header_settings' );

function courage_customize_register_header_settings( $wp_customize ) {

	// Add Sections for Header Content
	$wp_customize->add_section( 'courage_section_header', array(
        'title'    => esc_html__( 'Header Settings', 'courage' ),
        'priority' => 20,
		'panel' => 'courage_options_panel' 
		)
	);
	
	// Add Header Text
	$wp_customize->add_setting( 'courage_theme_options[header_text]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
		)
	);
    $wp_customize->add_control( 'courage_control_header_text', array(
        'label'    => esc_html__( 'Top Header Text Line', 'courage' ),
        'section'  => 'courage_section_header',
        'settings' => 'courage_theme_options[header_text]',
        'type'     => 'text',
		'priority' => 2
		)
	);
	
	// Add Header Content Header
	$wp_customize->add_setting( 'courage_theme_options[header_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Header_Control(
        $wp_customize, 'courage_control_header_content', array(
            'label' => esc_html__( 'Header Content', 'courage' ),
            'section' => 'courage_section_header',
            'settings' => 'courage_theme_options[header_content]',
            'priority' => 3
            )
        )
    );
	$wp_customize->add_setting( 'courage_theme_options[header_content_description]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Description_Control(
        $wp_customize, 'courage_control_header_content_description', array(
            'label' =>  esc_html__( 'The Header Content will be displayed on the right hand side of the header area.', 'courage' ),
            'section' => 'courage_section_header',
            'settings' => 'courage_theme_options[header_content_description]',
            'priority' => 4
            )
        )
    );

	// Add Settings and Controls for Header
	$wp_customize->add_setting( 'courage_theme_options[header_search]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_header_search', array(
        'label'    => esc_html__( 'Display search field on header area', 'courage' ),
        'section'  => 'courage_section_header',
        'settings' => 'courage_theme_options[header_search]',
        'type'     => 'checkbox',
		'priority' => 5
		)
	);

	$wp_customize->add_setting( 'courage_theme_options[header_icons]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_header_icons', array(
        'label'    => esc_html__( 'Display Social Icons on header area', 'courage' ),
        'section'  => 'courage_section_header',
        'settings' => 'courage_theme_options[header_icons]',
        'type'     => 'checkbox',
		'priority' => 6
		)
	);
	
}

?>