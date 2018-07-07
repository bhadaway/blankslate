<?php get_header(); ?>
<section id="content" role="main" class="mdl-grid">
	<article id="post-0" class="post not-found mdl-cell--12-col mdl-card mdl-shadow--4dp">
		<header class="header mdl-card__title mdl-card--expand">
			<h1 class="entry-title"><?php _e( 'Not Found', 'barebones-mdl' ); ?></h1>
		</header>
		<section class="entry-content mdl-card__supporting-text">
			<p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'barebones-mdl' ); ?></p>
			<?php get_search_form(); ?>
		</section>
	</article>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>