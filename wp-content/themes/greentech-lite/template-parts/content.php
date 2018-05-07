<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GreenTech Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( ! has_post_format( 'quote' ) ) {
		get_template_part( 'template-parts/content', 'media' );
	}
	?>
	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php greentech_lite_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
		$main_content = apply_filters( 'the_content', get_the_content() );
	?>

	<?php if ( strpos( $main_content, 'link-more' ) ) : ?>
		<div class="entry-content has-link-more">
	<?php else : ?>
		<div class="entry-content">
	<?php endif; ?>

		<?php
		if ( in_array( get_post_format(), array( 'audio', 'video' ), true ) ) {
			$media = get_media_embedded_in_content( $main_content, array(
				'audio',
				'video',
				'object',
				'embed',
				'iframe',
			) );
			$main_content = str_replace( $media, '', $main_content );
		}

		echo $main_content; /* WPCS: xss ok. */

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'greentech-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php greentech_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
