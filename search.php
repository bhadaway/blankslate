<?php get_header(); ?>
<section id="content" role="main" class="mdl-grid">
	<?php if ( have_posts() ) : ?>
		<header class="header">
			<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'barebones-mdl' ), get_search_query() ); ?></h1>
		</header>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'entry' ); ?>
		<?php endwhile; ?>
		<?php get_template_part( 'nav', 'below' ); ?>
	<?php else : ?>
		<article id="post-0" class="post no-results not-found mdl-cell--12-col mdl-card mdl-shadow--4dp">
			<header class="header mdl-card__title mdl-card--expand">
				<h2 class="entry-title"><?php _e( 'Nothing Found', 'barebones-mdl' ); ?></h2>
			</header>
			<section class="entry-content mdl-card__supporting-text">
				<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'barebones-mdl' ); ?></p>
				<?php get_search_form(); ?>
			</section>
		</article>
	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>