/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	var options = {
		'blogname': '.site-title a',
		'blogdescription': '.site-description',
		'services_section_title': '.section--services .section-title',
		'blog_section_title': '.section--blog .section-title',
		'cta_text': '.section--cta .section-cta__text',
		'cta_button_text': '.section--cta .section-cta__link a',
		'featured_block_text_1': '.item-1  span.featured-block__text',
		'featured_block_text_2': '.item-2  span.featured-block__text',
		'featured_block_text_3': '.item-3  span.featured-block__text',
		'statistics_textarea': '.statistics-textarea',
		'statistics_section_title': '.section--statistics .section-title',
		'statistics_item_number_1': '.item-1 .statistics-number',
		'statistics_item_number_2': '.item-2 .statistics-number',
		'statistics_item_number_3': '.item-3 .statistics-number',
		'statistics_item_number_4': '.item-4 .statistics-number',
		'statistics_item_text_1': '.item-1 .statistics-text',
		'statistics_item_text_2': '.item-2 .statistics-text',
		'statistics_item_text_3': '.item-3 .statistics-text',
		'statistics_item_text_4': '.item-4 .statistics-text',
	};

	// Use each to resolve closure problem.
	$.each( options, function ( setting, selector ) {
		wp.customize( setting, function( value ) {
			value.bind( function ( to ) {
				$( selector ).html( to );
			} );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				});
			} else {
				$( '.site-title, .site-description' ).css({
					clip: 'auto',
					position: 'relative'
				});
				$( '.page-header .page-title, .breadcrumbs li, .breadcrumbs a, .breadcrumbs span' ).css({
					color: to
				});
			}
		});
	});

} )( jQuery );
