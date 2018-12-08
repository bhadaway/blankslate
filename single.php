<?php
get_header();
?>
<section id="content" role="main">
    <?php
    if(have_posts()) {
        while(have_posts()) {
            the_post();
            get_template_part('entry');
            if(!post_password_required()) {
                comments_template('', true);
            }
        }
    }
    ?>
    <footer class="footer">
        <?php
        get_template_part('nav', 'below-single');
        ?>
    </footer>
</section>
<?php
get_sidebar();
get_footer();