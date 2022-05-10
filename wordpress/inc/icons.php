<?php
/**
 * Return SVG markup.
 *
 * @param string $icon SVG icon id.
 *
 * @return string $svg SVG markup.
 */
function corridor_svg( $icon = null ) {
	// Return early if no icon was defined.
	if ( empty( $icon ) ) {
		return '';
	}

	// Create SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $icon ) . '" aria-hidden="true" role="img">';
	$svg .= ' <use xlink:href="' . get_parent_theme_file_uri( '/assets/img/corridor.svg#' ) . esc_html( $icon ) . '"></use> ';
	$svg .= '</svg>';

	return $svg;
}


/**
 * Return SVG markup for social icons.
 *
 * @param string $icon SVG icon id.
 *
 * @return string $svg SVG markup.
 */
function corridor_social_svg( $icon = null ) {
	// Return early if no icon was defined.
	if ( empty( $icon ) ) {
		return '';
	}

	// Create SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $icon ) . '" aria-hidden="true" role="img">';
	$svg .= '<use xlink:href="' . get_parent_theme_file_uri( '/assets/img/social.svg#icon-' ) . esc_html( $icon ) . '"></use> ';
	$svg .= '</svg>';

	return $svg;
}