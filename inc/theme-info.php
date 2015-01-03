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
	
	add_theme_page( 
		__('Welcome to Courage', 'courage'), 
		__('Theme Info', 'courage'), 
		'edit_theme_options', 
		'courage', 
		'courage_display_theme_info_page'
	);
	
}


// Display Theme Info page
function courage_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme_data = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( __( 'Welcome to %1s %2s', 'courage' ), $theme_data->Name, $theme_data->Version ); ?></h1>

		<div class="theme-description"><?php echo $theme_data->Description; ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php _e('Important Links:', 'courage'); ?></strong>
				<a href="http://themezee.com/themes/courage/" target="_blank"><?php _e('Theme Info Page', 'courage'); ?></a>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php _e('Changelog', 'courage'); ?></a>
				<a href="http://preview.themezee.com/courage/" target="_blank"><?php _e('Theme Demo', 'courage'); ?></a>
				<a href="http://themezee.com/docs/courage-documentation/" target="_blank"><?php _e('Theme Documentation', 'courage'); ?></a>
				
				<span class="social-icons">
					<a href="http://themezee.com/newsletter/" target="_blank"><span class="genericon-mail"></span></a>
					<a href="https://www.facebook.com/ThemeZee" target="_blank"><span class="genericon-facebook"></span></a>
					<a href="https://twitter.com/ThemeZee" target="_blank"><span class="genericon-twitter"></a>
				</span>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
				
					<h3><?php printf( __( 'Getting Started with %s', 'courage' ), $theme_data->Name ); ?></h3>
						
					<div class="section">
						<h4><?php _e( 'Theme Documentation', 'courage' ); ?></h4>
						
						<p class="about"><?php _e( 'Need any help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'courage' ); ?></p>
						<p>
							<a href="http://themezee.com/docs/courage-documentation/" target="_blank" class="button button-secondary"><?php _e('Visit Courage Documentation', 'courage'); ?></a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php _e( 'Theme Options', 'courage' ); ?></h4>
						
						<p class="about"><?php _e( 'Courage supports the awesome Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.', 'courage' ); ?></p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary"><?php _e('Customize Theme', 'courage'); ?></a>
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
			
			<p><?php printf( __( 'Courage is proudly brought to you by %1s.', 'courage' ), 
				'<a target="_blank" href="http://themezee.com" title="ThemeZee">ThemeZee</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'courage_theme_info_page_css');
function courage_theme_info_page_css($hook) { 

	// Load styles and scripts only on theme info page
	if ( 'appearance_page_courage' != $hook ) {
		return;
	}
	
	// Embed theme info css style
	wp_enqueue_style('courage-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');
	
	// Register Genericons
	wp_enqueue_style('courage-genericons', get_template_directory_uri() . '/css/genericons.css');

}


?>