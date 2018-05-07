<?php
/**
 * Display featured content on the homepage.
 *
 * @package GreenTech Lite
 */

$featured_posts = greentech_lite_get_featured_posts();
if ( empty( $featured_posts ) ) {
	get_template_part( 'template-parts/home/hero' );
	return;
}

$speed = get_theme_mod( 'slider_speed', 5000 );
?>

<div class="clearfix featured-posts">
	<div class="featured-post__content slider" data-speed="<?php echo esc_attr( $speed ); ?>">
		<?php foreach ( $featured_posts as $index => $post ) : setup_postdata( $post ); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				$url_image = get_the_post_thumbnail_url( $post, 'full' );
				echo '<img data-lazy="' . esc_url( $url_image ) . '" alt="' . the_title_attribute( 'echo=0' ) . '"/>';
				?>
				<div class="featured-content">
					<div class="container">
						<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
						<?php the_content(); ?>
					</div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
	<?php get_template_part( 'template-parts/featured-blocks' ); ?>
</div>
<?php
wp_reset_postdata();
