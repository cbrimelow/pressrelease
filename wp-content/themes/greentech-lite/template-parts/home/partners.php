<?php
/**
 * Template part for displaying partners.
 *
 * @package GreenTech Lite
 */

$gallery     = get_post_gallery( get_the_ID(), false );
$attachments = explode( ',', $gallery['ids'] );

if ( count( $attachments ) > 0 ) : ?>
	<section class="section--partners">
		<div class="container">
			<div class="partners">
				<?php foreach ( $attachments as $attachment ) : ?>
					<div class="partner">
						<img src="<?php echo esc_url( wp_get_attachment_url( $attachment ) ); ?>" alt="<?php echo esc_attr( get_post_meta( $attachment, '_wp_attachment_image_alt', true ) ); ?>">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
