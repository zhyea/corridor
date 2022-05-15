<?php
/**
 * The archive for corridor.
 *
 * @package Corridor
 */
get_header();
?>

    <div class="body" id="content-body">

        <div class="alert alert-secondary alert-msg" role="alert">
            <?php the_archive_title(); ?> <?php the_archive_description(); ?>
        </div>

        <div class="post-gallery">
            <!-- start post -->
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content');
                endwhile;
            endif; ?>
            <!-- end post -->
            <div class="clear"></div>
        </div>
    </div>

<?php
get_footer();