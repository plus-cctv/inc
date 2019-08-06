<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Bootswatch
 */

/**
 * Add body class `has_header_image` if header image exists.
 */
add_action( 'body_class', function( $body_classes ) {
	if ( bootswatch_has( 'header_image' ) ) {
		return array_merge( $body_classes, [ 'has-header-image' ] );
	}
	return $body_classes;
} );

/**
 * Set up the WordPress core custom header feature.
 */
function bootswatch_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'bootswatch_custom_header_args', array(
		'default-image'      => get_parent_theme_file_uri( '/header.jpg' ),
		'header-text'        => false,
		'height'             => 900,
		'flex-height'        => true,
		'flex-width'         => true,
		'video'              => true,
		'width'              => 1440,
	) ) );
	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/header.jpg',
			'thumbnail_url' => '%s/header.jpg',
			'description'   => __( 'Default Header Image', 'bootswatch' ),
		),
	) );
}
add_action( 'after_setup_theme', 'bootswatch_custom_header_setup' );
