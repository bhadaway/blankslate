<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments" class="mdl-color-text--primary-contrast mdl-card comments mdl-cell--12-col mdl-card mdl-shadow--4dp">
	<?php
	if ( have_comments() ) :
	global $comments_by_type;
	$comments_by_type = &separate_comments( $comments );
	if ( ! empty( $comments_by_type['comment'] ) ) :
	?>
	<section id="comments-list" class="comments">
		<?php if ( get_comment_pages_count() > 1 ) : ?>
		<nav id="comments-nav-above" class="comments-navigation" role="navigation">
			<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
		</nav>
		<?php endif; ?>
		<?php wp_list_comments(array(
			'type' => 'comment',
			'walker' => new MDL_Comment_Walker ));
		?>
		<?php if ( get_comment_pages_count() > 1 ) : ?>
		<nav id="comments-nav-below" class="comments-navigation" role="navigation">
			<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
		</nav>
		<?php endif; ?>
	</section>
	<?php
	endif;
	endif;
	if ( comments_open() ) comment_form();
	?>
</section>