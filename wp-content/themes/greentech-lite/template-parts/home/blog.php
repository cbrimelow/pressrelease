<?php
/**
 * The template part for displaying newest posts section on front page
 *
 * @package GreenTech Lite
 */

$posts_number = get_theme_mod( 'greentech_lite_blog_number', 6 );

if ( ! $posts_number ) {
	return;
}

$query = new WP_Query( array(
	'post_type'           => 'post',
	'posts_per_page'      => $posts_number,
	'ignore_sticky_posts' => true,
) );

if ( ! $query->have_posts() ) {
	return;
}

$post_count = count( $query->posts );

$class = array( 'row' );
switch ( $post_count ) {
	case 1:
		$class[] = 'grid--center col-1';
		break;
	case 2:
	case 4:
		array_push( $class, 'grid--center', 'col-2' );
		break;
	default:
		$class[] = 'col-3';
		break;
}
?>

<section class="section--blog">
	<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'blog_section_title', __( 'Latest News', 'greentech-lite' ) ) ); ?></h2>
	<div class="container">
		<div class="<?php echo esc_attr( implode( ' ', $class ) ); ?>">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="section-blog__item">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="section-blog__thumbnails">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( 'greentech-lite-project' ); ?></a>
						</div>
						<h3 class="section-blog__title"><a href="<?php echo esc_url( the_permalink() ); ?>" alt="<?php echo esc_attr( the_title() ); ?>"><?php the_title(); ?></a></h3>
						<div class="entry-meta"><?php greentech_lite_posted_on(); ?></div>
					<?php else : ?>
						<h3 class="section-blog__title"><a href="<?php echo esc_url( the_permalink() ); ?>" alt="<?php echo esc_attr( the_title() ); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
						<div class="entry-meta"><?php greentech_lite_posted_on(); ?></div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
