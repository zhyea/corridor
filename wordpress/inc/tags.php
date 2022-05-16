<?php
/**
 * Displays the site logo in the header area
 */
function corridor_site_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}


/**
 * Displays the site title in the header area
 */
function corridor_site_title() {
	?>
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<?php
}


/**
 * Displays the site description in the header area
 */
function corridor_site_description() {
	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) :
		?>
		<p class="site-description"><?php echo $description; ?></p>
	<?php
	endif;
}

/**
 * Displays gallery keywords
 */
function corridor_gallery_keywords() {
	// Get tags.
	$tag_list = get_the_tag_list( '', ', ' );
	// Display tags.
	if ( $tag_list ) :
		?>
		<?php echo corridor_svg( 'tags' ) ?>
		<?php echo $tag_list; ?>
	<?php
	endif;
}

/**
 * pagination
 */
function corridor_pagination() {
	the_posts_pagination( array(
		'mid_size' => 3,
	) );
}


/**
 * Displays social buttons
 */
function corridor_social_buttons() {
	?>
	<a href="javascript:window.open('https://twitter.com/share?url=<?php echo urlencode( get_permalink() ) ?>&text=<?php echo urlencode( get_the_title() ) ?>', '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');"><?php echo corridor_social_svg( 'twitter' ) ?></a>
	<a href="javascript:window.open('https://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ) ?>&t=<?php echo urlencode( get_the_title() ) ?>', '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');"><?php echo corridor_social_svg( 'facebook' ) ?></a>
	<?php
}
