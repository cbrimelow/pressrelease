<?php
/**
 * Template part for displaying single post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GreenTech Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		get_template_part( 'template-parts/content', 'media' );
	?>

	<div class="entry-content">
		<?php
		$main_content = apply_filters( 'the_content', get_the_content() );
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
