<?php get_header(); ?>
<main id="content">
    <?php if(have_posts()) { while(have_posts()) { the_post();
        get_template_part('entry');
        comments_template();
    }}
    get_template_part('nav', 'below'); ?>
</main>
<?php get_sidebar();
get_footer();