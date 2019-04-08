<?php get_header(); ?>
<main id="content">
    <?php if(have_posts()) { while(have_posts()) { the_post();
        get_template_part('entry');
        if(comments_open() && ! post_password_required()) {
            comments_template('', true);
        }
    }} ?>
    <footer class="footer">
        <?php get_template_part('nav', 'below-single'); ?>
    </footer>
</main>
<?php get_sidebar();
get_footer();