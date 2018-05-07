<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link    https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package GreenTech Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses greentech_header_style()
 */
function greentech_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'greentech_lite_custom_header_args', array(
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-width'         => true,
		'flex-height'        => true,
		'default-image'      => get_template_directory_uri() . '/images/bg_breadcrumb.jpg',
		'wp-head-callback'   => 'greentech_lite_header_style',
	) ) );
	register_default_headers( array(
		'sky' => array(
			'url'           => '%s/images/bg_breadcrumb.jpg',
			'thumbnail_url' => '%s/images/bg_breadcrumb.jpg',
			'description'   => esc_html__( 'Sky', 'greentech-lite' ),
		),
	) );
}

add_action( 'after_setup_theme', 'greentech_lite_custom_header_setup' );

if ( ! function_exists( 'greentech_lite_header_style' ) ) :
	/**
	 * Show the header image and optionally hide the site title, site description.
	 */
	function greentech_lite_header_style() {
		?>
		<style id="greentech-lite-header-css">
			<?php if ( has_header_image() ) : ?>
				.page-header {
					background: url(<?php echo esc_url( get_header_image() ); ?>) top center no-repeat;
					background-attachment: fixed;
				}
			<?php endif; ?>
			<?php if ( ! display_header_text() ) : ?>
				.site-title,
				.site-description {
					clip: rect(1px, 1px, 1px, 1px);
					position: absolute;
				}
			<?php else : ?>
				.page-header .page-title,
				.breadcrumbs li,
				.breadcrumbs a,
				.breadcrumbs span {
					color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
				}
			<?php endif; ?>
		</style>
		<?php
	}
endif;
