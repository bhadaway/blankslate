<?php get_header(); ?>
<main id="content">
    <article id="post-0" class="post not-found">
        <header class="header">
            <h1 class="entry-title">
                Not Found
            </h1>
        </header>
        <div class="entry-content">
            <?php wpautop('Nothing found for the requested page. Try a search instead?'); ?>
            <?php get_search_form(); ?>
        </div>
    </article>
</main>
<?php get_sidebar();
get_footer();