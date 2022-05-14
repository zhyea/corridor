<?php
/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 *
 * @return int
 */
function corridor_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	// Get excerpt length from database.
	$excerpt_length = get_corridor_option( 'excerpt_length' );

	// Return excerpt text.
	if ( $excerpt_length >= 0 ) :
		return absint( $excerpt_length );
	else :
		return 35; // Number of words.
	endif;
}

add_filter( 'excerpt_length', 'corridor_excerpt_length' );