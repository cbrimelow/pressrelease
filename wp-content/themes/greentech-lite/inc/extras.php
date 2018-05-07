<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package GreenTech Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function greentech_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar if don't have sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}

add_filter( 'body_class', 'greentech_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function greentech_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

add_action( 'wp_head', 'greentech_lite_pingback_header' );

/**
 * Change the Tag Cloud's Font Sizes
 *
 * @param array $args Widget area.
 *
 * @return array.
 */
function greentech_lite_tag_cloud_fz( $args ) {
	$args['largest']  = 0.875;
	$args['smallest'] = 0.875;
	$args['unit']     = 'rem';

	return $args;
}

add_filter( 'widget_tag_cloud_args', 'greentech_lite_tag_cloud_fz' );

/**
 * Register required and recommended plugins.
 */
function greentech_lite_register_required_plugins() {
	$plugins = array(
		array(
			'name' => esc_html__( 'Jetpack', 'greentech-lite' ),
			'slug' => 'jetpack',
		),
	);
	$config  = array(
		'id' => 'greentech_lite',
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'greentech_lite_register_required_plugins' );
