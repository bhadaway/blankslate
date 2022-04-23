<?php get_header(); ?>
<?php global $post; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
<?php get_template_part( 'entry', 'meta' ); ?>
<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php printf( esc_attr__( 'Return to %s', 'blankslate' ), esc_attr( get_the_title( $post->post_parent ), 1 ) ); ?>" rev="attachment"><?php printf( esc_attr__( '%s Return to ', 'blankslate' ), '<span class="meta-nav">&larr;</span>' ); ?><?php echo wp_kses_post( get_the_title( $post->post_parent ) ); ?></a>
<nav id="nav-above" class="navigation">
<div class="nav-previous"><?php previous_image_link( false, '&lsaquo;' ); ?></div>
<div class="nav-next"><?php next_image_link( false, '&rsaquo;' ); ?></div>
</nav>
</header>
<div class="entry-content" itemprop="mainContentOfPage">
<div class="entry-attachment">
<?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, 'full' ); ?>
<p class="attachment"><a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo esc_attr( $att_image[1] ); ?>" height="<?php echo esc_attr( $att_image[2] ); ?>" class="attachment-full" alt="<?php echo esc_attr( $post->post_excerpt ); ?>" itemprop="image" /></a></p>
<?php else : ?>
<a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $post->ID ), 1 ); ?>" rel="attachment"><?php echo esc_url( basename( $post->guid ) ); ?></a>
<?php endif; ?>
</div>
<div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) { the_excerpt(); } ?></div>
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
</div>
</article>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>