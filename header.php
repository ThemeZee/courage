<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php /* Embeds HTML5shiv to support HTML5 elements in older IE versions plus CSS Backgrounds */ ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php // Get Theme Options from Database
	$theme_options = courage_theme_options();
?>

<div id="wrapper" class="hfeed">
	
	<div id="header-wrap">
	
		<header id="header" class="clearfix" role="banner">

			<div id="logo" class="clearfix">
			
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<?php // Display Logo Image or Site Title
				if ( isset($theme_options['header_logo']) and $theme_options['header_logo'] <> '' ) : ?>
					<img class="logo-image" src="<?php echo esc_url($theme_options['header_logo']); ?>" alt="Logo" /></a>
			<?php else: ?>
					<h1 class="site-title"><?php bloginfo('name'); ?></h1>
			<?php endif; ?>
				</a>
				
			<?php // Display Tagline on header if activated
			if ( isset($theme_options['header_tagline']) and $theme_options['header_tagline'] == true ) : ?>			
				<h2 class="site-description"><?php echo bloginfo('description'); ?></h2>
			<?php endif; ?>
			
			</div>
			
			<div id="header-content" class="clearfix">
				<?php get_template_part('inc/header-content'); ?>
			</div>

		</header>
	
	</div>
	
	<nav id="mainnav" class="clearfix" role="navigation">
		<div id="mainnav-mobile-menu"><h4 id="mainnav-icon"><?php _e('Menu', 'courage'); ?></h4></div>
		<?php 
			// Get Navigation out of Theme Options
			wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_id' => 'mainnav-menu', 'echo' => true, 'fallback_cb' => 'courage_default_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
		?>
	</nav>
	
	<?php // Display Custom Header Image
		courage_display_custom_header(); ?>
		