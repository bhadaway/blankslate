<?php
add_action( 'after_setup_theme', 'barebones_mdl_setup' );
function barebones_mdl_setup()
{
	load_theme_textdomain( 'barebones-mdl', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'barebones-mdl' ) )
	);
}

add_action( 'wp_enqueue_scripts', 'barebones_mdl_load_scripts' );
function barebones_mdl_load_scripts()
{
	wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'barebones_mdl_enqueue_comment_reply_script' );
function barebones_mdl_enqueue_comment_reply_script()
{
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'barebones_mdl_title' );
function barebones_mdl_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

add_filter( 'wp_title', 'barebones_mdl_filter_wp_title' );
function barebones_mdl_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'barebones_mdl_widgets_init' );
function barebones_mdl_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'barebones-mdl' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

function barebones_mdl_custom_pings( $comment )
{
	$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}

add_filter( 'get_comments_number', 'barebones_mdl_comments_number' );
function barebones_mdl_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

class MDL_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$output .= '<a class="mdl-navigation__link" href="' . $item->url . '">' . $item->title . '</a>';
	}
}

class MDL_Comment_Walker extends Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	// constructor – wrapper for the comments list
	function __construct() { ?>
		<section class="comments-list mdl-color-text--primary-contrast mdl-card__supporting-text comments">
	<?php }

	// start_lvl – wrapper for child comments list
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		<section class="child-comments comments-list comment__answers">
	<?php }

	// end_lvl – closing wrapper for child comments list
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		</section>
	<?php }

	// start_el – HTML for comment template
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? 'comment__answers' : 'parent' ); 

		if ( 'article' == $args['style'] ) {
			$tag = 'article';
			$add_below = 'comment';
		} else {
			$tag = 'article';
			$add_below = 'comment';
		} ?>

		<article class="comment mdl-color-text--grey-700" id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
			<header class="comment__header <?php if ( $depth > 1 ) : ?> comment__answers<?php endif; ?>">
				<img src="<?php echo get_avatar_url( $comment, 65, '[default gravatar URL]', 'Author’s gravatar'); ?>" class="comment__avatar">
				<div class="comment__author">
					<strong><a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a></strong>
					<span><?php comment_date('jS F Y') ?></span>
				</div>
			</header>
			<div class="comment__text">
				<?php comment_text() ?>
			</div>
	<?php }

	// end_el – closing HTML for comment template
	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
		</article>
	<?php }

	// destructor – closing wrapper for the comments list
	function __destruct() { ?>
		</section>
	<?php }
}