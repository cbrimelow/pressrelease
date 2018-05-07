<?php
/**
 * Display featured blocks on the homepage.
 *
 * @package GreenTech Lite
 */

$featured_block_text_default = array(
	'HOW TO <br> SAVE THE PLANET EARTH',
	'THE IMPORTANCE <br> OF RECYCLING ENVIROMENT',
	'MANY ALTERNATIVE <br> GREEN  ENERGY SOURCES',
);

for ( $i = 1; $i <= 3; $i++ ) {
	$text_mod              = get_theme_mod( 'featured_block_text_' . $i, $featured_block_text_default[ $i - 1 ] );
	$url_mod               = get_theme_mod( 'featured_block_url' . $i );
	$icon_mod              = get_theme_mod( 'featured_block_icon_' . $i );
	$featured_block_text[] = $text_mod;
	$featured_block_url[]  = $url_mod;
	$featured_block_icon[] = $icon_mod;
}

if ( ! in_array( '', $featured_block_text, true ) ) : ?>
	<div class="featured-block">
		<div class="container">
			<div class="row">
				<?php
				$i = 0;
				while ( $i < 3 ) {
				?>
					<?php if ( $featured_block_url[ $i ] ) : // Check if url is entered. ?>
						<a href="<?php echo esc_url( $featured_block_url[ $i ] ); ?>" alt="<?php echo esc_attr( $featured_block_text[ $i ] ); ?>" class="featured-block__item item-<?php echo $i + 1; // WPCS: XSS OK. ?>">
					<?php else : ?>
						<div class="featured-block__item item-<?php echo $i + 1; // WPCS: XSS OK. ?>">
					<?php endif; ?>

						<?php if ( $featured_block_icon[ $i ] ) : // Check if icon is uploaded, else return number. ?>
							<?php
							$icon_id = function_exists( 'wpcom_vip_attachment_url_to_postid' ) ? wpcom_vip_attachment_url_to_postid( $featured_block_icon[ $i ] ) : attachment_url_to_postid( $featured_block_icon[ $i ] );
							$icon_alt = get_post_meta( $icon_id, '_wp_attachment_image_alt', true );
							?>
							<span class="featured-block__icon">
								<img src="<?php echo esc_url( $featured_block_icon[ $i ] ); ?>" alt="<?php echo esc_attr( $icon_alt ); ?>">
							</span>
						<?php else : ?>
							<span class="featured-block__number">
								<?php
								echo '0' . ( $i + 1 ); // WPCS: XSS OK.
								?>
							</span>
						<?php endif; ?>

						<span class="featured-block__text">
							<?php echo wp_kses_post( $featured_block_text[ $i ] ); ?>
						</span>

					<?php if ( $featured_block_url[ $i ] ) : ?>
						</a>
					<?php else : ?>
						</div>
					<?php endif; ?>
				<?php
				$i++;
				}// End while().
				?>
			</div>
		</div>
	</div>

<?php endif; ?>
