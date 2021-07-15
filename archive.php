<?php get_header(); ?>
<main id="content" role="main">
<header class="header">
<h1 class="entry-title" itemprop="name"><?php the_archive_title(); ?></h1>
<div class="archive-meta" itemprop="description"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_footer(); ?>