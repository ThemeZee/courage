<?php
/**
 * Register PRO Version section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'courage_customize_register_upgrade_settings' );

function courage_customize_register_upgrade_settings( $wp_customize ) {
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
	// Add Sections for Post Settings
	$wp_customize->add_section( 'courage_section_upgrade', array(
        'title'    => esc_html__( 'Pro Version', 'courage' ),
        'priority' => 70,
		'panel' => 'courage_options_panel' 
		)
	);

	// Add PRO Version Section
	$wp_customize->add_setting( 'courage_theme_options[pro_version_label]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Header_Control(
        $wp_customize, 'courage_control_pro_version_label', array(
            'label' => esc_html__( 'You need more features?', 'courage' ),
            'section' => 'courage_section_upgrade',
            'settings' => 'courage_theme_options[pro_version_label]',
            'priority' => 	1
            )
        )
    );
	$wp_customize->add_setting( 'courage_theme_options[pro_version]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Text_Control(
        $wp_customize, 'courage_control_pro_version', array(
            'label' =>  esc_html__( 'Purchase the Pro Version to get additional features and advanced customization options.', 'courage' ),
            'section' => 'courage_section_upgrade',
            'settings' => 'courage_theme_options[pro_version]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'courage_theme_options[pro_version_button]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Button_Control(
        $wp_customize, 'courage_control_pro_version_button', array(
            'label' => sprintf( esc_html__( 'Learn more about %s Pro', 'courage' ), $theme->get( 'Name' ) ),
			'section' => 'courage_section_upgrade',
            'settings' => 'courage_theme_options[pro_version_button]',
            'priority' => 	3
            )
        )
    );

}

?>