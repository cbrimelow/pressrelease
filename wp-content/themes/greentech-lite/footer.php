<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GreenTech Lite
 */

?>

</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div>
			</div>
		</div>
		<div class="bottombar">
			<div class="container">

				<div class="bottombar-left">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'greentech-lite' ) ); ?>">
						<?php
						/* translators: placeholder replaced with string */
						printf( esc_html__( 'Proudly powered by %s', 'greentech-lite' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
					<?php
					/* translators: placeholder replaced with string */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'greentech-lite' ), 'Greentech Lite', '<a href="' . esc_url( __( 'https://gretathemes.com/', 'greentech-lite' ) ) . '" rel="designer">' . esc_html__( 'GretaThemes', 'greentech-lite' ) . '</a>' );
					?>
				</div><!-- .site-info -->
				<div class="bottombar-right">
				<?php
				if ( function_exists( 'jetpack_social_menu' ) ) {
					jetpack_social_menu();
				}
				?>
				</div>
			</div>
		</div>
	</footer><!-- .site-footer -->
</div><!-- #page -->
<a href="#" class="scroll-to-top hidden"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>
