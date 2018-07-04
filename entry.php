<?php if (is_singular()) {
	$contents = get_the_content();
	$grid_width = 12;
} else {
	$contents = get_the_excerpt();
	$grid_width = 6;
}?>
<article id="post-<?php the_ID(); ?>"
         class="<?php join( ' ', get_post_class() ); ?> mdl-cell--<?php echo $grid_width; ?>-col mdl-card mdl-shadow--4dp">
<div class="mdl-card__media mdl-card--expand thumbnail-card mdl-color-text--grey-50" style="color: #fff; background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><h3><?php the_title(); ?></h3></a>
</div>
<div class="mdl-card__supporting-text post-meta">
	<span><?php the_time( get_option( 'date_format' ) ); ?></span>
	<span><?php
		$categories = get_the_category();
		$category_links = array();
		if ( ! empty( $categories ) ) {
			foreach( $categories as $category ) {
					array_push($category_links, '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>');
			}
			echo 'Categories: ' . join(', ', $category_links);
	}
	?></span>
</div>
<div class="mdl-card__supporting-text post-contents">
<?php echo $contents; ?>
</div>
</article>