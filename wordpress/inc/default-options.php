<?php

/**
 * Get a single theme option
 *
 * @return mixed
 */
function get_corridor_option( $option_name = '' ) {
	// Get all Theme Options from Database.
	$theme_options = corridor_options();
	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function corridor_options() {
	// Merge theme options array from database with default options array.
	return wp_parse_args( get_option( 'corridor_options', array() ), corridor_default_options() );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function corridor_default_options() {

	$default_options = array(
		'retina_logo'         => false,
		'site_title'          => true,
		'site_description'    => true,
		'theme_layout'        => 'wide',
		'sidebar_position'    => 'right-sidebar',
		'blog_title'          => '',
		'blog_description'    => '',
		'blog_layout'         => 'grid',
		'blog_content'        => 'excerpt',
		'excerpt_length'      => 35,
		'read_more_text'      => esc_html__( 'Continue', 'corridor' ),
		'meta_date'           => true,
		'meta_author'         => true,
		'meta_category'       => true,
		'meta_tags'           => true,
		'post_navigation'     => true,
		'post_image_archives' => true,
		'post_image_single'   => true,
		'credit_link'         => true,
	);

	return $default_options;
}
