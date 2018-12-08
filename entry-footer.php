<footer class="entry-footer">
    <span class="cat-links">
        <?php
        _e('Categories: ', 'blankslate');
        the_category(', ');
        ?>
    </span>
    <span class="tag-links">
        <?php
        the_tags();
        ?>
    </span>
    <?php
    if(comments_open()) {
        ?>
        <span class="meta-sep">|</span>
        <span class="comments-link">
            <a href="<?php
                echo get_comments_link();
            ?>">
                <?php
                echo sprintf(__('Comments', 'blankslate'));
                ?>
            </a>
        </span>
        <?php
    }
    ?>
</footer> 