<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="topheader-wrap">
		<?php get_template_part( 'inc/top-header' ); ?>
	</div>

	<div id="wrapper" class="hfeed">

		<div id="header-wrap">

			<header id="header" class="clearfix" role="banner">

				<div id="logo" class="clearfix">

					<?php courage_site_logo(); ?>
					<?php courage_site_title(); ?>
					<?php courage_site_description(); ?>

				</div>

				<div id="header-content" class="clearfix">
					<?php get_template_part( 'inc/header-content' ); ?>
				</div>

			</header>

		</div>

		<div id="navi-wrap">
			<nav id="mainnav" class="clearfix" role="navigation">
				<?php
				// Display Main Navigation
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container' => false,
					'menu_id' => 'mainnav-menu',
					'menu_class' => 'main-navigation-menu',
					'echo' => true,
					'fallback_cb' => 'courage_default_menu',
				) );
			?>
			</nav>
		</div>

		<?php // Display Custom Header Image
			courage_display_custom_header(); ?>
