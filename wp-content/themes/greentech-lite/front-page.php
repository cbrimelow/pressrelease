<?php
/**
 * Template Name: Home page
 *
 * @package GreenTech Lite
 */

if ( 'posts' === get_option( 'show_on_front' ) ) {
	get_template_part( 'index' );
	return;
}

get_header();

	get_template_part( 'template-parts/home/features' );
	get_template_part( 'template-parts/home/services' );
	get_template_part( 'template-parts/home/statistics' );
	get_template_part( 'template-parts/home/blog' );
	get_template_part( 'template-parts/home/cta' );
	get_template_part( 'template-parts/home/partners' );

get_footer();
