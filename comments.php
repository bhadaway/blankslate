<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments" class="mdl-color-text--primary-contrast mdl-card comments mdl-cell--12-col mdl-card mdl-shadow--4dp">
  <div class="mdl-card__supporting-text comments">
	<?php
	$args = array(
		'comment_field' => '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-comment">' .
												'<textarea rows=1 class="mdl-textfield__input" id="comment" name="comment"></textarea>' .
												'<label for="comment" class="mdl-textfield__label">Join the discussion</label>' .
												'</div>',
		'comment_notes_before' => '',
		'title_reply' => '',
		'logged_in_as' => '',
		'submit_button' => '<button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" name="%1$s" id="%2$s" value="%4$s">' .
												'<i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>' .
												'</button>'
	);
	if ( comments_open() ) comment_form($args);
	?>
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
	?>
	</div>
</section>
