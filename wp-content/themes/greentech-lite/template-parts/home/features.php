<?php
/**
 * The template part for displaying features section on front page
 *
 * @package GreenTech Lite
 */

$features_page = get_theme_mod( 'features_section' );
if ( ! $features_page ) {
	return;
}

$post = get_post( $features_page );
setup_postdata( $post );

?>

<section class="section--features container">
	<h2 class="section-title"><?php the_title(); ?></h2>
	<div class="features-content">
		<?php the_content(); ?>
	</div>
</section>
