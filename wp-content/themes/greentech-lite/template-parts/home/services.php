<?php
/**
 * Template part for displaying services.
 *
 * @package GreenTech Lite
 */

?>

<?php
$service_pages = array();

for ( $i = 1; $i <= 6; $i ++ ) {
	$mod             = get_theme_mod( 'front_page_services_' . $i );
	$service_pages[] = $mod;
}

if ( ! $service_pages ) {
	return;
}

$image = get_theme_mod( 'services_section_img' );

$query = new WP_Query( array(
	'post_type'      => 'page',
	'posts_per_page' => 6,
	'post__in'       => $service_pages,
	'orderby'        => 'post__in',
) );

if ( ! $query->have_posts() ) {
	return;
}

$services_image = get_the_post_thumbnail( get_the_ID() );
?>

<section class="section--services">
	<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'services_section_title', __( 'Services', 'greentech-lite' ) ) ); ?></h2>
	<div class="container" style="background-image: url( <?php echo esc_url( $image ); ?> )">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="service">
				<a class="image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
				<div class="info">
					<h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="desc"><?php the_content(); ?></div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</section>
