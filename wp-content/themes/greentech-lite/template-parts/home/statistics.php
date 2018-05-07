<?php
/**
 * The template part for displaying statistics section on front page
 *
 * @package GreenTech Lite
 */

$statistics_bg            = get_theme_mod( 'statistics_bg' );
$statistics_section_title = get_theme_mod( 'statistics_section_title' );
$statistics_textarea      = get_theme_mod( 'statistics_textarea' );

for ( $i = 0; $i <= 4; $i++ ) {
	$number_mod               = get_theme_mod( 'statistics_item_number_' . $i );
	$text_mod                 = get_theme_mod( 'statistics_item_text_' . $i );
	$icon_mod                 = get_theme_mod( 'statistics_item_icon_' . $i );
	$statistics_item_number[] = $number_mod;
	$statistics_item_text[]   = $text_mod;
	$statistics_item_icon[]   = $icon_mod;
}

?>

<section class="section--statistics">

	<?php if ( ! empty( $statistics_textarea ) ) : ?>
	<div class="statistics-textarea container">
		<?php echo wp_kses_post( wpautop( $statistics_textarea ) ); ?>
	</div>
	<?php endif; ?>


	<?php if ( ! empty( $statistics_section_title ) && count( $statistics_item_number ) > 0 && count( $statistics_item_text ) > 0 && count( $statistics_item_icon ) > 0 ) : ?>
	<div class="statistic-four-column" style="background-image: url('<?php echo esc_url( $statistics_bg ); ?>')">
		<div class="container">
			<h2 class="section-title"><?php echo esc_html( $statistics_section_title ); ?></h2>
			<div class="statistics-content">
				<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
					<div class="statistics-item item-<?php echo esc_attr( $i ); ?>">
						<?php if ( ! empty( $statistics_item_icon[ $i ] ) ) : ?>
							<div class="statistics-icon">
							<?php
								$icon_id = function_exists( 'wpcom_vip_attachment_url_to_postid' ) ? wpcom_vip_attachment_url_to_postid( $featured_block_icon[ $i ] ) : attachment_url_to_postid( $statistics_item_icon[ $i ] );
								$icon_alt = get_post_meta( $icon_id, '_wp_attachment_image_alt', true );
							?>
							<img src="<?php echo esc_url( $statistics_item_icon[ $i ] ); ?>" alt="<?php echo esc_attr( $icon_alt ); ?>">
							</div>
						<?php endif; ?>
						<div class="statistics-number"><?php echo esc_html( $statistics_item_number[ $i ] ); ?></div>
						<div class="statistics-text"><?php echo esc_html( $statistics_item_text[ $i ] ); ?></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

</section>
