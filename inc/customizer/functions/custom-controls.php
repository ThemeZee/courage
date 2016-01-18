<?php
/**
 * Theme Customizer Functions
 *
 */

/*========================== CUSTOMIZER CONTROLS FUNCTIONS ==========================*/

if ( class_exists( 'WP_Customize_Control' ) ) :

	// Title Control
    class Courage_Customize_Header_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<label>
				<span class="customize-control-title"><?php echo wp_kses_post( $this->label ); ?></span>
			</label>
			
			<?php
        }
    }
	
	// Description Control
	class Courage_Customize_Description_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<span class="description"><?php echo wp_kses_post( $this->label ); ?></span>
			
			<?php
        }
    }
	
	// Upgrade Control
	class Courage_Customize_Upgrade_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<div class="upgrade-pro-version">
			
				<span class="customize-control-title"><?php esc_html_e( 'Pro Version', 'courage' ); ?></span>
				
				<span class="textfield">
					<?php printf( esc_html__( 'Purchase the Pro Version of %s to get additional features and advanced customization options.', 'courage' ), 'Courage'); ?>
				</span>
				
				<p>
					<a href="https://themezee.com/themes/courage/?utm_source=customizer&utm_medium=button&utm_campaign=courage&utm_content=pro-version" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'Learn more about %s Pro', 'courage' ), 'Courage'); ?>
					</a>
				</p>
				
			</div>
			
			<div class="upgrade-toolkit">
			
				<span class="customize-control-title"><?php esc_html_e( 'ThemeZee Toolkit', 'courage' ); ?></span>
				
				<span class="textfield">
					<?php esc_html_e( 'The ThemeZee Toolkit add-on is a collection of useful small modules and features, neatly bundled into a single plugin.', 'courage' ); ?>
				</span>
				
				<p>
					<a href="https://themezee.com/plugins/toolkit/?utm_source=customizer&utm_medium=button&utm_campaign=courage&utm_content=toolkit" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'View Details', 'courage' ), 'Courage'); ?>
					</a>
					<a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ); ?>" class="button button-primary">
						<?php esc_html_e( 'Install now', 'courage' ); ?>
					</a>
				</p>
			
			</div>
			
			<div class="upgrade-addons">
			
				<span class="customize-control-title"><?php esc_html_e( 'Add-on plugins', 'courage' ); ?></span>
				
				<span class="textfield">
					<?php esc_html_e( 'Extend the functionality of your WordPress website with our customized add-ons.', 'courage' ); ?>
				</span>

				<p>
					<a href="https://themezee.com/plugins/?utm_source=customizer&utm_medium=button&utm_campaign=courage&utm_content=addons" target="_blank" class="button button-secondary">
						<?php esc_html_e( 'Browse our add-ons', 'courage' ); ?>
					</a>
				</p>
				
			</div>
			
			<?php
        }
    }

endif;


// Add a callback function to retrieve wether slider is activated or not
function courage_slider_activated_callback( $control ) {
	
	// Check if Slider is turned on
	if ( $control->manager->get_setting('courage_theme_options[slider_active_magazine]')->value() == 1 ) :
		return true;
	elseif ( $control->manager->get_setting('courage_theme_options[slider_active_blog]')->value() == 1 ) :
		return true;
	else :
		return false;
	endif;
	
}