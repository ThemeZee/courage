<?php
/**
 * Theme Customizer Functions
 *
 */

/*========================== CUSTOMIZER CONTROLS FUNCTIONS ==========================*/

// Add simple heading option to the theme customizer
if ( class_exists( 'WP_Customize_Control' ) ) :

    class Courage_Customize_Header_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<label>
				<span class="customize-control-title"><?php echo wp_kses_post( $this->label ); ?></span>
			</label>
			
<?php
        }
    }
	
	class Courage_Customize_Description_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<span class="description"><?php echo wp_kses_post( $this->label ); ?></span>
			
<?php
        }
    }
	
	class Courage_Customize_Font_Control extends WP_Customize_Control {
	
		private $fonts = false;
		
		public function __construct($manager, $id, $args = array(), $options = array()) {
		
			$this->fonts = array(
				'Arial' => 'Arial',
				'Alef' => 'Alef',
				'Bitter' => 'Bitter',
				'Carme' => 'Carme',
				'Droid Sans' => 'Droid Sans',
				'Fjalla One' => 'Fjalla One',
				'Francois One' => 'Francois One',
				'Josefin Slab' => 'Josefin Slab',
				'Lato' => 'Lato',
				'Lobster' => 'Lobster',
				'Luckiest Guy' => 'Luckiest Guy',
				'Jockey One' => 'Jockey One',
				'Maven Pro' => 'Maven Pro',
				'Modern Antiqua' => 'Modern Antiqua',
				'Nobile' => 'Nobile',
				'Oswald' => 'Oswald',
				'Permanent Marker' => 'Permanent Marker',
				'Roboto' => 'Roboto',
				'Raleway' => 'Raleway',
				'Share' => 'Share',
				'Tahoma' => 'Tahoma',
				'Ubuntu' => 'Ubuntu',
				'Verdana' => 'Verdana');
				
			// Add fonts installed by User
			$theme_options = courage_theme_options();
			
			if ( isset($theme_options['installed_fonts']) and $theme_options['installed_fonts'] <> '' ) :
				
				// Get Fonts from Option Value
				$fonts = explode(';', $theme_options['installed_fonts']);
				
				// Add fonts to list
				foreach ( $fonts as $value) {
					if($value == '') continue;
					$this->fonts[trim($value)] = esc_attr(trim($value));
				}
				
				// Sort fonts alphabetically
				asort($this->fonts);
				
			endif;
	
	
			parent::__construct( $manager, $id, $args );
			
		}
		
		public function render_content() {
		
			if( !empty($this->fonts) ) :
			
            ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<div class="customize-font-select-control">
						<select <?php $this->link(); ?>>
							<?php
								foreach ( $this->fonts as $k => $v )
								{
									printf('<option value="%s" %s>%s</option>', $k, selected($this->value(), $k, false), $v);
								}
							?>
						</select>
					</div>
				</label>
                
            <?php
			endif;
		}
		
	}
	
endif;


?>