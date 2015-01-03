
	<?php get_sidebar('footer'); ?>

	<div id="footer-wrap">
	
		<footer id="footer" class="container clearfix" role="contentinfo">
			
			<nav id="footernav" class="clearfix" role="navigation">
				<?php 
					// Get Navigation out of Theme Options
					wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'menu_id' => 'footernav-menu', 'echo' => true, 'fallback_cb' => '', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 1));
				?>
				<h4 id="footernav-icon"></h4>
			</nav>
			
			<div id="footer-text">
			
			<?php // Display Footer Text
				
				// Get Theme Options from Database
				$theme_options = courage_theme_options();

				if ( isset( $theme_options['footer_text'] ) and $theme_options['footer_text'] <> '' ) :
					
					echo do_shortcode(wp_kses_post($theme_options['footer_text']));
						
				endif; 
				
			?>
				<span class="credit-link"><?php courage_credit_link(); ?></span>
			
			</div>
			
		</footer>
		
	</div>

</div><!-- end #wrapper -->

<?php wp_footer(); ?>
</body>
</html>