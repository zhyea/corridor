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
		'excerpt_length' => 36,
	);

	return $default_options;
}
