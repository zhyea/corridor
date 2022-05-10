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
	if ( is_home() ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	<?php
	endif;
}


/**
 * Displays the site description in the header area
 */
function corridor_site_description() {
	$description = get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */
	if ( $description || is_customize_preview() ) :
		?>
        <p class="site-description"><?php echo $description; ?></p>

	<?php
	endif;
}