<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-blue.min.css" />
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<style>
		.layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type  {
			padding-right: 0;
		}
		body {
			background-color: #FAFAFA;
		}
		.mdl-card {
			margin: 8px;
		}
		section.mdl-grid {
			max-width: 900px;
			width: 100%;
		}
		.thumbnail-card {
			height: 300px;
			background-size: cover;
			padding: 24px;
			display: flex;
			align-items: flex-end;
		}
		.thumbnail-card a, .thumbnail-card h3 {
			text-decoration: none;
			font-weight: 500;
			color: inherit;
			font-size: 34px;
			line-height: 40px;
		}
		.flexcolumn {
			flex-direction: column;
		}
		.flexstart {
			align-items: start;
		}
		.comments {
			background-color: #eee;
			display: flex;
			align-items: stretch;
			flex-direction: column;
		}
		#comments {
			margin-top: -8px;
		}
		.comment__header {
			display: flex;
			flex-direction: row;
			align-items: center;
			margin-bottom: 16px;
		}
		.comment__author {
			flex-grow: 1;
			display: flex;
			flex-direction: column;
		}
		.comment__avatar {
			width: 48px;
			height: 48px;
			border-radius: 24px;
			margin-right: 16px;
		}
		.comment__text {
			line-height: 1.5em;
		}
		.comment__answers {
			padding-top: 32px;
			padding-left: 48px;
		}
		.comments form {
			display: flex;
			flex-direction: row;
			margin-bottom: 16px;
		}
		.comments form button {
			margin-top: 20px;
			background-color: rgba(0, 0, 0, 0.24);
			color: white;
		}
		.comment-form-comment {
			flex-grow: 1;
			margin-right: 16px;
			color: rgb(97, 97, 97);
		}
		.visuallyhidden {
			border: 0;
			clip: rect(0 0 0 0);
			height: 1px;
			margin: -1px;
			overflow: hidden;
			padding: 0;
			position: absolute;
			width: 1px;
		}
		#respond {
			padding-left: 16px;
		}
		.post-contents {
			border-top: 1px solid rgba(0,0,0,0.1);
		}
		.post-contents img {
			max-width: 100%;
			height: auto;
			margin-top: 16px;
			margin-bottom: 16px;
			display: block;
		}
		.post-meta {
			display: flex;
			flex-direction: column;
		}
		#site-title a {
			text-decoration: none;
			color: #fff;
		}
	</style>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed layout-waterfall mdl-layout mdl-js-layout"">
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
		<div class="mdl-layout__drawer">
			<span class="mdl-layout-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
			<?php wp_nav_menu( array(
				'theme_location' => 'main-menu',
				'walker' => new MDL_Walker(),
				'items_wrap' => '<nav class="mdl-navigation">%3$s</nav>'
				) ); ?>
		</div>
		<main class="mdl-layout__content">
			<div class="page-content" id="container">