<?php
/**
 * plus classes.
 *
 * @package Plus
 */

/**
 * Returns classes to be used for the primary container.
 *
 * @return Array The classes.
 */
function plus_primary_classes() {
	$classes = is_active_sidebar( 'sidebar' )
		? 'col-md-8'
		: 'col-md-12'
	;

	$classes = apply_filters( 'plus_primary_classes', $classes );
	return $classes;
}

add_filter( 'body_class', function( $classes ) {
	if ( is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'has-sidebar';
		$classes[] = 'has-sidebar-sidebar';
	}
	return array_unique( $classes );
} );
