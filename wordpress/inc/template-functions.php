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


/**
 * get post thumbnail
 *
 * @param $size string|int[] size of  thumbnail
 */
function corridor_post_thumbnail( $size ) {
	$post = get_post();

	if ( ! $post ) {
		return;
	}

	$post_thumbnail_id = get_post_thumbnail_id( $post );
	if ( empty( $post_thumbnail_id ) ) {
		?>
		<img width="300" height="250"
		     src="<?php echo get_parent_theme_file_uri( '/assets/img/default-cover.png' ) ?>"
		     class="attachment-corridor-post-gallery size-corridor-post-gallery wp-post-image" alt=""/>
		<?php
	} else {
		the_post_thumbnail( $size );
	}

}