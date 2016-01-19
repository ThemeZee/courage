<?php
/***
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard. 
 *
 */


// Add Theme Info page to admin menu
add_action('admin_menu', 'courage_add_theme_info_page');
function courage_add_theme_info_page() {
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
	add_theme_page( 
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'courage' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), 
		esc_html__( 'Theme Info', 'courage' ), 
		'edit_theme_options', 
		'courage', 
		'courage_display_theme_info_page'
	);
	
}


// Display Theme Info page
function courage_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'courage' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->get( 'Description' ); ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'courage' ); ?>:</strong>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/courage/', 'courage' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=courage&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'courage' ); ?></a>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php esc_html_e( 'Changelog', 'courage' ); ?></a>
				<a href="<?php echo esc_url( 'http://preview.themezee.com/courage/?utm_source=theme-info&utm_medium=textlink&utm_campaign=courage&utm_content=demo' ); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'courage' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/courage-documentation/', 'courage' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=courage&utm_content=documentation' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'courage' ); ?></a>
				<a href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/courage?filter=5' ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'courage' ); ?></a>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">
		
			<h3><?php printf( esc_html__( 'Getting Started with %s', 'courage' ), $theme->get( 'Name' ) ); ?></h3>
			
			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
						
					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'courage' ); ?></h4>
						
						<p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'courage' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/docs/courage-documentation/', 'courage' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=courage&utm_content=documentation' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'courage' ), 'Courage' ); ?>
							</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'courage' ); ?></h4>
						
						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'courage' ), $theme->get( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary">
								<?php esc_html_e( 'Customize Theme', 'courage' ); ?>
							</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php esc_html_e( 'Pro Version', 'courage' ); ?></h4>
						
						<p class="about">
							<?php printf( esc_html__( 'Purchase the Pro Version of %s to get additional features and advanced customization options.', 'courage' ), 'Courage'); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/addons/courage-pro/', 'courage' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=courage&utm_content=pro-version' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'courage' ), 'Courage'); ?>
							</a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'courage' ), 
				$theme->get( 'Name' ),
				'<a target="_blank" href="' . __( 'https://themezee.com/', 'courage' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=courage" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="http://wordpress.org/support/view/theme-reviews/courage?filter=5" title="Courage Lite Review">' . esc_html__( 'rate it', 'courage' ) . '</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'courage_theme_info_page_css');
function courage_theme_info_page_css( $hook ) { 

	// Load styles and scripts only on theme info page
	if ( 'appearance_page_courage' != $hook ) {
		return;
	}
	
	// Embed theme info css style
	wp_enqueue_style('courage-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');

}