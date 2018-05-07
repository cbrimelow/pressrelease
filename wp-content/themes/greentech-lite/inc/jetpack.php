<?php
/**
 * Jetpack Compatibility File
 *
 * @link    https://jetpack.com/
 *
 * @package GreenTech Lite
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function greentech_lite_jetpack_setup() {
	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support social menu.
	add_theme_support( 'jetpack-social-menu' );

	// Featured content.
	add_theme_support( 'featured-content', array(
		'filter'     => 'greentech_lite_get_featured_posts',
		'max_posts'  => 3,
		'post_types' => array( 'post', 'page' ),
	) );
}

add_action( 'after_setup_theme', 'greentech_lite_jetpack_setup' );
