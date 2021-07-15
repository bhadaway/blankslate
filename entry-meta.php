<div class="entry-meta">
<span class="author vcard"<?php if ( is_single() ) { echo ' itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">'; } else { echo '><span>'; } ?><?php the_author_posts_link(); ?></span></span>
<span class="meta-sep"> | </span>
<time class="entry-date" datetime="<?php echo esc_attr( get_the_date() ); ?>" title="<?php echo esc_attr( get_the_date() ); ?>" <?php if ( is_single() ) { echo 'itemprop="datePublished" pubdate'; } ?>><?php the_time( get_option( 'date_format' ) ); ?></time>
<?php if ( is_single() ) { echo '<meta itemprop="dateModified" content="' . esc_attr( get_the_modified_date() ) . '" />'; } ?>
</div>