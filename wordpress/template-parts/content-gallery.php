<?php
/**
 * The home item for corridor.
 *
 * @package Corridor
 */
?>

<div class="post">
    <div class="post-image">
        <a class="wp-post-image-link" href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_post_thumbnail(array(300, 250)); ?>
        </a>
        <div class="post-remark">this is remark</div>
    </div>
    <div class="post-title">
        <?php the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
    </div>
    <div class="post-meta">
        <div class="keywords">
            <div class="keywords-icon"><img alt="keywords" height="15" src="static/img/tags.svg" width="15"/></div>
            <a href="#">KeyWords</a>
            <a href="#">KeyWords</a>
            <a href="#">KeyWords</a>
            <a href="#">KeyWords</a>
        </div>
        <div class="category"><?php get_the_category_list( ', ' )?></div>
    </div>
</div>
