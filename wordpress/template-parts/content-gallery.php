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
			<?php corridor_post_thumbnail( 'corridor-post-gallery' ); ?>
        </a>
        <div class="post-remark">
			<?php the_excerpt(); ?>
        </div>
    </div>
    <div class="post-title">
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </div>
    <div class="post-meta">
        <div class="keywords">
			<?php corridor_gallery_keywords() ?>
        </div>
        <div class="category"><?php echo get_the_category_list( ', ' ) ?></div>
    </div>
</div>
