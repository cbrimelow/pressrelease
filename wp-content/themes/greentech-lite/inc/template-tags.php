<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package GreenTech Lite
 */

/**
 * Auto add more links.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function greentech_lite_content_more() {
	/* translators: string replaced with the html */
	$text = wp_kses_post( sprintf( __( 'Read more %s', 'greentech-lite' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' ) );
	$more = sprintf( '<p class="link-more"><a href="%s#more-%d" class="more-link btn btn-outline-primary">%s</a></p>', esc_url( get_permalink() ), get_the_ID(), $text );

	return $more;
}
add_filter( 'the_content_more_link', 'greentech_lite_content_more' );

/**
 * Change the [...] to a 'continue reading' link automatically ( when content-option jetpack is used  ).
 *
 * @return string.
 */
function greentech_lite_excerpt_more() {
	/* translators: string replaced with the html */
	$text = wp_kses_post( sprintf( __( 'Read More %s', 'greentech-lite' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' ) );
	$more = sprintf( '<p class="link-more"><a href="%s" class="more-link btn btn-outline-primary">%s</a></p>', esc_url( get_permalink() ), $text );
	return $more;
}
add_filter( 'excerpt_more', 'greentech_lite_excerpt_more' );

if ( ! function_exists( 'greentech_lite_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function greentech_lite_posted_on() {
		$date_format = get_option( 'date_format' );
		if ( empty( $date_format ) ) {
			$date_format = 'j F Y';
		}
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( $date_format ) ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date( $date_format ) )
		);

			$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

			$byline = sprintf(
				/* translators: the author name */
				esc_html_x( 'by %s', 'post author', 'greentech-lite' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			echo '<span class="byline"> ' . $byline . '</span><span class="posted-on"><i class="fa fa-calendar icon"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'greentech_lite_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function greentech_lite_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'greentech-lite' ) );
			if ( is_single() ) {
				if ( $categories_list && greentech_lite_categorized_blog() ) {
					/* translators: the single category item */
					printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'greentech-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
				}
			}
			if ( is_single() ) {
				$tags_list = get_the_tag_list();
				if ( $tags_list ) {
					/* translators: used between list items, there is a space after the comma */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'greentech-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"><i class="fa fa-commenting icon"></i>';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'No Comment<span class="screen-reader-text"> on %s</span>', 'greentech-lite' ), array(
				'span' => array(
					'class' => array(),
				),
			) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'greentech-lite' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function greentech_lite_categorized_blog() {
	$all_the_cool_cats = get_transient( 'greentech_lite_categories' );
	if ( false === $all_the_cool_cats ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'greentech_lite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so greentech_lite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so greentech_lite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in greentech_lite_categorized_blog.
 */
function greentech_lite_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'greentech_lite_categories' );
}
add_action( 'edit_category', 'greentech_lite_category_transient_flusher' );
add_action( 'save_post', 'greentech_lite_category_transient_flusher' );


/**
 * Getter function for Featured Content.
 *
 * @return array An array of WP_Post objects.
 */
function greentech_lite_get_featured_posts() {
	return apply_filters( 'greentech_lite_get_featured_posts', array() );
}
