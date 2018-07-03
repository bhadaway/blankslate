<article id="post-<?php the_ID(); ?>" class="<?php join( ' ', get_post_class() ); ?> mdl-cell--6-col mdl-card mdl-shadow--4dp">
<div class="mdl-card__media mdl-card--expand thumbnail-card mdl-color-text--grey-50" style="color: #fff; background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><h3><?php the_title(); ?></h3></a>
</div>
<div class="mdl-card__supporting-text">
<?php if (is_singular()) {
	echo the_content();
} else {
	echo the_excerpt();
}?>
</div>
</article>