<?php
/**
 * Display hero section on the homepage instead of featured slider.
 *
 * @package GreenTech Lite
 */

if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();
		$url_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		if ( empty( $url_image ) ) {
			return;
		}
		?>

		<div class="featured-posts">
			<section class="featured-post__content">
				<?php
					echo '<img src="' . esc_url( $url_image ) . '" alt="' . get_the_title() . '"/>';
				?>
				<div class="featured-content">
					<div class="container">
					<?php
					$content = strip_shortcodes( get_the_content() );
					$content = apply_filters( 'the_content', $content );
					echo wp_kses_post( $content );
					?>
					</div>
				</div>
			</section>
			<?php get_template_part( 'template-parts/featured-blocks' ); ?>
		</div>

	<?php
	endwhile;

endif;
