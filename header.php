<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-cyan.min.css" />
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed demo-layout-waterfall mdl-layout mdl-js-layout"">
		<header id="header" role="banner" class="mdl-layout__header mdl-layout__header--waterfall">
			<section id="branding" class="mdl-layout__header-row">
				<div id="site-title" class="mdl-layout-title"><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?></div>
				<div class="mdl-layout-spacer"></div>
				<div id="search">
					<?php get_search_form(); ?>
				</div>
			</section>
			<div class="mdl-layout__header-row">
				<div class="mdl-layout-spacer"></div>
				<?php wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'walker' => new MDL_Walker(),
					'items_wrap' => '<nav id="menu" role="navigation" class="mdl-navigation">%3$s</nav>'
				 ) ); ?>
			</div>
		</header>
		<div id="container">