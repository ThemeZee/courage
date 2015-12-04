<?php
/**
 * Register upgrade section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'courage_customize_register_upgrade_settings' );

function courage_customize_register_upgrade_settings( $wp_customize ) {
	
	// Add Upgrade / More Features Section
	$wp_customize->add_section( 'courage_section_upgrade', array(
        'title'    => esc_html__( 'More Features', 'courage' ),
        'priority' => 70,
		'panel' => 'courage_options_panel' 
		)
	);
	
	// Add custom Upgrade Content control
	$wp_customize->add_setting( 'courage_theme_options[upgrade]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Upgrade_Control(
        $wp_customize, 'courage_control_upgrade', array(
            'section' => 'courage_section_upgrade',
            'settings' => 'courage_theme_options[upgrade]',
            'priority' => 1
            )
        )
    );

}