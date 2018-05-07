<?php
/**
 * Display breadcrumbs for posts, pages, archive page with the microdata that search engines understand
 *
 * @package GreenTech Lite
 */

/**
 * Breadcrumb at the header
 *
 * @param array|string $args argument for HTML output.
 */
function greentech_lite_breadcrumbs( $args = '' ) {
	if ( is_front_page() ) {
		return;
	}

	$args = wp_parse_args( $args, array(
		'separator'         => '',
		'home_label'        => esc_html__( 'Home', 'greentech-lite' ),
		'home_class'        => 'home',
		'before'            => '<ul class="breadcrumbs">',
		'after'             => '</ul>',
		'before_item'       => '<li class="breadcrumbs-item">',
		'after_item'        => '</li>',
		'taxonomy'          => 'category',
		'display_last_item' => true,
	) );

	$args = apply_filters( 'greentech_lite_breadcrumbs_args', $args );

	$items = array();

	$title = '';

	// HTML template for each item.
	$item_tpl_link      = $args['before_item'] . '
		<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href="%s" itemprop="url"><span itemprop="title">%s</span></a>
		</span>
	' . $args['after_item'];
	$item_text_tpl = $args['before_item'] . '
		<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<span itemprop="title">%s</span>
		</span>
	' . $args['after_item'];

	// Home.
	if ( ! $args['home_class'] ) {
		$items[] = sprintf( $item_tpl_link, esc_url( home_url( '/' ) ), $args['home_label'] );
	} else {
		$items[] = $args['before_item'] . sprintf(
			'<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="%s" href="%s" itemprop="url"><span itemprop="title">%s</span></a>
			</span>' . $args['after_item'],
			esc_attr( $args['home_class'] ),
			esc_url( home_url() ),
			$args['home_label']
		);
	}

	if ( is_home() && ! is_front_page() ) {
		$page = get_option( 'page_for_posts' );
		if ( $args['display_last_item'] ) {
			$title = get_the_title( $page );
		}
	} elseif ( is_post_type_archive() ) {

		// If post is a custom post type.
		$post_type = get_post_type();
		if ( 'post' !== $post_type ) {
			$post_type_object       = get_post_type_object( $post_type );
			$post_type_archive_link = get_post_type_archive_link( $post_type );
			$title = $post_type_object->labels->menu_name;
		}
	} elseif ( is_single() ) {

		// If post is a custom post type.
		$post_type = get_post_type();
		if ( 'post' !== $post_type ) {
			$post_type_object       = get_post_type_object( $post_type );
			$post_type_archive_link = get_post_type_archive_link( $post_type );
			$items[]                = sprintf( $item_tpl_link, $post_type_archive_link, $post_type_object->labels->menu_name );
		}
		// Terms.
		$terms   = get_the_terms( get_the_ID(), $args['taxonomy'] );
		if ( $terms && ! is_wp_error( $terms ) ) {
			$term    = current( $terms );
			$terms   = greentech_lite_get_term_parents( $term->term_id, $args['taxonomy'] );
			$terms[] = $term->term_id;
			foreach ( $terms as $term_id ) {
				$term    = get_term( $term_id, $args['taxonomy'] );
				$items[] = sprintf( $item_tpl_link, get_term_link( $term, $args['taxonomy'] ), $term->name );
			}
		}

		if ( $args['display_last_item'] ) {
			$title   = get_the_title();

		}
	} elseif ( is_page() ) {
		$pages = greentech_lite_get_post_parents( get_queried_object_id() );
		foreach ( $pages as $page ) {
			$items[] = sprintf( $item_tpl_link, get_permalink( $page ), get_the_title( $page ) );
		}
		if ( $args['display_last_item'] ) {
			$title   = get_the_title();

		}
	} elseif ( is_tax() || is_category() || is_tag() ) {
		$current_term = get_queried_object();
		$terms        = greentech_lite_get_term_parents( get_queried_object_id(), $current_term->taxonomy );
		foreach ( $terms as $term_id ) {
			$term    = get_term( $term_id, $current_term->taxonomy );
			$items[] = sprintf( $item_tpl_link, get_category_link( $term_id ), $term->name );
		}
		if ( $args['display_last_item'] ) {
			$title   = $current_term->name;

		}
	} elseif ( is_search() ) {
		/* translators: search query */
		$title = sprintf( esc_html__( 'Search results for &quot;%s&quot;', 'greentech-lite' ), get_search_query() );
	} elseif ( is_404() ) {
		$title = esc_html__( 'Not Found', 'greentech-lite' );
	} elseif ( is_author() ) {
		// Queue the first post, that way we know what author we're dealing with (if that is the case).
		the_post();
		$title = sprintf(
			'%s',
			'<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>'
		);
		rewind_posts();
	} elseif ( is_day() ) {
		$title = sprintf( esc_html( '%s', 'greentech-lite' ), get_the_date() );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html( '%s', 'greentech-lite' ), get_the_date( 'F Y' ) );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html( '%s', 'greentech-lite' ), get_the_date( 'Y' ) );
	} else {
		$title = esc_html__( 'Archives', 'greentech-lite' );
	} // End if().
	$items[] = sprintf( $item_text_tpl, $title );

	$title = '<h1 class="page-title">' . esc_html( $title ) . '</h1>';

	echo $args['before'] . implode( $args['separator'], $items ) . $args['after'] . $title; // WPCS: XSS OK.
}

/**
 * Searches for term parents' IDs of hierarchical taxonomies, including current term.
 * This function is similar to the WordPress function get_category_parents() but handles any type of taxonomy.
 * Modified from Hybrid Framework
 *
 * @param int|string    $term_id  The term ID.
 * @param object|string $taxonomy The taxonomy of the term whose parents we want.
 *
 * @return array Array of parent terms' IDs.
 */
function greentech_lite_get_term_parents( $term_id = '', $taxonomy = 'category' ) {
	// Set up some default arrays.
	$list = array();

	// If no term ID or taxonomy is given, return an empty array.
	if ( empty( $term_id ) || empty( $taxonomy ) ) {
		return $list;
	}

	do {
		$list[] = $term_id;

		// Get next parent term.
		$term    = get_term( $term_id, $taxonomy );
		$term_id = $term->parent;
	} while ( $term_id );

	// Reverse the array to put them in the proper order for the trail.
	$list = array_reverse( $list );
	array_pop( $list );

	return $list;
}

/**
 * Gets parent posts' IDs of any post type, include current post
 * Modified from Hybrid Framework
 *
 * @param int|string $post_id ID of the post whose parents we want.
 *
 * @return array Array of parent posts' IDs.
 */
function greentech_lite_get_post_parents( $post_id = '' ) {
	// Set up some default array.
	$list = array();

	// If no post ID is given, return an empty array.
	if ( empty( $post_id ) ) {
		return $list;
	}

	do {
		$list[] = $post_id;

		// Get next parent post.
		$post    = get_post( $post_id );
		$post_id = $post->post_parent;
	} while ( $post_id );

	// Reverse the array to put them in the proper order for the trail.
	$list = array_reverse( $list );
	array_pop( $list );

	return $list;
}
