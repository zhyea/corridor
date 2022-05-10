<?php
/**
 * The template for displaying all single posts
 *
 * @package Corridor
 */
get_header(); ?>

    <div class="body">
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'single');
        endwhile; // End of the loop.
        ?>
    </div>

<?php
get_footer();
