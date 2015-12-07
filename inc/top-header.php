<?php
/***
 * Top Header Content
 *
 * This template displays the content in the right-hand header area based on theme options.
 *
 */
 
	// Get Theme Options from Database
	$theme_options = courage_theme_options();

?>

	<div id="topheader" class="clearfix">
		
		<?php // Display Text Line
		if ( isset($theme_options['header_text']) and $theme_options['header_text'] <> '' ) : ?>

			<div id="topheader-text" class="header-text clearfix">
				<p><?php echo wp_kses_post($theme_options['header_text']); ?></p>
			</div>

		<?php
		endif;

		// Display Top Navigation Menu
		if ( has_nav_menu( 'secondary' ) ) : ?>		
		
		<nav id="topnav" class="clearfix" role="navigation">
			<?php // Display Top Navigation
				wp_nav_menu( array(
					'theme_location' => 'secondary', 
					'container' => false, 
					'menu_id' => 'topnav-menu', 
					'echo' => true, 
					'fallback_cb' => 'courage_default_menu')
				);
			?>
		</nav>
		
		<?php endif; ?>
		
	</div>