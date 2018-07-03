<article id="post-<?php the_ID(); ?>" class="<?php join( ' ', get_post_class() ); ?>mdl-card mdl-shadow--2dp">
<div class="mdl-card__title mdl-card--expand" style="color: #fff; background: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><h2 class="mdl-card__title-text"><?php the_title(); ?></h2></a>
</div>
<div class="mdl-card__supporting-text">
<?php if (is_singular()) {
	echo the_content();
} else {
	echo the_excerpt();
}?>
</div>
</article>