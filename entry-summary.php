<section class="entry-summary">
    <?php
    the_excerpt();
    if(is_search()) {
        ?>
        <div class="entry-links">
            <?php
            wp_link_pages();
            ?>
        </div>
        <?php
    }
    ?>
</section>