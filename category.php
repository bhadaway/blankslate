<?php
get_header();
?>
<section id="content" role="main">
    <header class="header">
        <h1 class="entry-title">
            <?php
            _e('Category Archives: ', 'blankslate');
            single_cat_title();
            ?>
        </h1>
        <?php
        if('' != category_description()) {
            echo apply_filters(
                'archive_meta',
                '<div class="archive-meta">'.
                    category_description().
                '</div>'
            );
        }
        ?>
    </header>
    <?php
    if(have_posts()) {
        while(have_posts()) {
            the_post();
            get_template_part('entry');
        }
    }
    get_template_part('nav', 'below');
    ?>
</section>
<?php
get_sidebar();
get_footer();