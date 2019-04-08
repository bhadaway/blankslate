<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h<?php if(is_singular()) {
            echo '1';
        } else {
            echo '2';
        } ?> class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h<?php if(is_singular()) {
            echo '1';
        } else {
            echo '2';
        } ?>>
        <?php if(!is_search()) {
            get_template_part('entry', 'meta');
        } ?>
    </header>
    <?php get_template_part('entry', (is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content'));
    if(is_singular()) {
        get_template_part('entry-footer');
    } ?>
</article>