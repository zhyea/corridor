<?php


if (!function_exists('corridor_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function corridor_setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Set default Post Thumbnail size.
        set_post_thumbnail_size(1360, 765, true);

        // Add support for responsive embed blocks.
        add_theme_support('responsive-embeds');
    }
endif;
add_action('after_setup_theme', 'corridor_setup');


/**
 * Enqueue scripts and styles.
 */
function corridor_scripts()
{
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . 'assets/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-script', get_template_directory_uri() . 'assets/js/bootstrap.min.js');
    wp_enqueue_script('custom-script', get_template_directory_uri() . 'assets/js/custom.js');
}

add_action('wp_enqueue_scripts', 'corridor_scripts');


/**
 * Add custom sizes for featured images
 */
function corridor_add_image_sizes()
{
    add_image_size('corridor-list-post', 300, 250, true);
}

add_action('after_setup_theme', 'corridor_add_image_sizes');


/**
 * Make custom image sizes available in Gutenberg.
 * @param $sizes array image size
 * @return array
 */
function corridor_add_image_size_names($sizes)
{
    return array_merge($sizes, array(
        'post-thumbnail' => esc_html__('Corridor Single Post', 'corridor'),
        'corridor-list-post' => esc_html__('Corridor List Post', 'corridor'),
    ));
}

add_filter('image_size_names_choose', 'corridor_add_image_size_names');