<?php
/**
 * The template part for displaying cta section on front page
 *
 * @package GreenTech Lite
 */

$cta_text        = get_theme_mod( 'cta_text', __( 'Join us now to access the new tech', 'greentech-lite' ) );
$cta_button_url  = get_theme_mod( 'cta_button_url', 'https://gretathemes.com/' );
$cta_button_text = get_theme_mod( 'cta_button_text', __( 'Get In Touch', 'greentech-lite' ) );
$cta_bg          = get_theme_mod( 'cta_background', get_template_directory_uri() . '/images/cta-bg.jpg' );
?>

<section class="section--cta" style="background-image: url( <?php echo esc_url( $cta_bg ); ?> )">
	<div class="container">
		<div class="section-cta__text">
			<?php echo esc_html( $cta_text ); ?>
		</div>
		<div class="section-cta__link">
			<a href="<?php echo esc_url( $cta_button_url ); ?>" alt="<?php echo esc_html( $cta_button_text ); ?>"  class="btn btn-primary">
				<?php echo esc_html( $cta_button_text ); ?>
			</a>
		</div>
	</div>
</section>
