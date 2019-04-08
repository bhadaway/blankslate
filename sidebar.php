<aside id="sidebar">
    <?php if(is_active_sidebar('widgets')) { ?>
        <div id="primary" class="widget-area">
            <ul class="xoxo">
                <?php dynamic_sidebar('widgets'); ?>
            </ul>
        </div>
    <?php } ?>
</aside>