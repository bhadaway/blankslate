<?php
get_header();
?>
<section id="content" role="main">
    <header class="header">
        <h1 class="entry-title">
            <?php
            _e('Tag Archives: ', 'blankslate');
            single_tag_title();
            ?>
        </h1>
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