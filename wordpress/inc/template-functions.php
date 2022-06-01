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


/**
 * Limit excerpt to a number of characters
 *
 * @param string $excerpt
 *
 * @return string
 */
function corridor_short_excerpt( $excerpt ) {
	// Get excerpt length from database.
	$excerpt_length = get_corridor_option( 'excerpt_length' );

	// Return excerpt text.
	if ( $excerpt_length >= 0 ) :
		$excerpt_length = absint( $excerpt_length );
	else :
		$excerpt_length = 35; // Number of words.
	endif;

	return substr( $excerpt, 0, $excerpt_length );
}

add_filter( 'the_excerpt', 'corridor_short_excerpt' );