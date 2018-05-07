jQuery( function ( $ ) {

	var $window = $( window ),
		$body = $( 'body' ),
		isRTL = $body.hasClass( 'rtl' ),
		$mobileMenu = $( '.mobile-navigation' );

	/**
	 * Collapse
	 */
	function toggleCollapse() {
		$( '[data-toggle="collapse"]' ).on( 'click', function ( e ) {
			e.preventDefault();
			$( '#site-search' ).slideToggle( 300 ).find( 'input' ).focus();
		} );
		$( '.menu-toggle' ).on( 'click', function () {
			$mobileMenu.slideToggle();
		} );
	}

	// esc key close search field
	$( document ).on( "keyup", function ( e ) {
		if ( e.keyCode === 27 ) { // escape key maps to keycode `27`
			$( ".site-search input" ).blur();
			$( '#site-search' ).slideUp();
		}
	} );

	/**
	 * Site nav
	 */
	function menuClick() {
		//Add arrow icon to the li.
		var $dropdownToggle = $( '<span class="dropToggle fa fa-angle-down"></span>' );
		$( '.mobile-menu' ).find( 'li' ).has( 'ul' )
										.children( 'a' )
										.after( $dropdownToggle );

		$( '.dropToggle' ).on( 'click', function( e ) {
			$( this ).toggleClass( 'is-toggled' )
					 .next( '.sub-menu' )
						.slideToggle();
			e.stopPropagation();
		} );
	}

	function menuHover() {
		$( '.main-navigation' ).find( 'li' ).has( 'ul' ).hover(
			function () {
				$( this ).children( 'ul' ).stop( true, true ).slideDown( 300 );
			},
			function () {
				$( this ).children( 'ul' ).stop( true, true ).slideUp( 300 );
			}
		);
	}

	function hideMobileMenuOnDesktops() {
		$window.on( 'resize', function () {
			if ( $window.width() > 992 ) {
				$mobileMenu.hide();
			}
		} )
	}

	/**
	 * Homepage featured content slider.
	 */
	function initFeaturedContentSlider() {
		var $slider = $( '.featured-post__content.slider' );
		var $sliderSpeed = $slider.data( 'speed' );
		$slider.slick( {
			slidesToShow: 1,
			slidesToScroll: 1,
			speed: 1000,
			lazyLoad: 'ondemand',
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>',
			autoplay: true,
			autoplaySpeed: $sliderSpeed,
			arrows: true,
			fade: true,
			dots: false,
			pauseOnHover: false,
			cssEase: 'linear',
			adaptiveHeight: true,
			rtl: isRTL
		} );
		if ( $sliderSpeed == 0 ) {
			$slider.slick( 'pause' );
			$slider.find( $( '.slick-arrow' ) ).hide();
		}
	}

	/**
	 * Lazy load image slider.
	 */
	function lazyLoadFeaturedImg() {
		$( '.featured-post__content img' ).each( function() {
			var $this = $( this );
			$this.attr( 'src', $this.data( 'lazy' ) );
			$this.on( 'load', function() {
				$this.removeAttr( 'data-lazy' );
			} )
		} );
	}

	/**
	 * Homepage partner slider.
	 */
	function initPartnerSlider() {
		$( '.partners' ).slick( {
			autoplay: true,
			autoplaySpeed: 500,
			prevArrow: '',
			nextArrow: '',
			slidesToShow: 5,
			slidesToScroll: 1,
			infinite: true,
			rtl: isRTL,
			responsive: [
				{
					breakpoint: 1199,
					settings: {
						slidesToShow: 5
					}
				}, {
					breakpoint: 991,
					settings: {
						slidesToShow: 4
					}
				}, {
					breakpoint: 767,
					settings: {
						slidesToShow: 3
					}
				}, {
					breakpoint: 575,
					settings: {
						slidesToShow: 2,
					}
				}
			]
		} );
	}

	/**
	 * Scroll to top
	 */
	function scrollToTop() {
		var $window = $( window ),
			$button = $( '.scroll-to-top' );
		$window.on( 'scroll', function () {
			$button[$window.scrollTop() > 100 ? 'removeClass' : 'addClass']( 'hidden' );
		} );
		$button.on( 'click', function ( e ) {
			e.preventDefault();
			$( 'body, html' ).animate( {
				scrollTop: 0
			}, 500 );
		} );
	}

	/**
	 * Sticky header
	 */
	function stickyHeader() {
		var $topBar = $( '.topbar' ),
			topBarHeight = $topBar.height(),
			adminBarHeight = $( '#wpadminbar' ).height(),
			headerContainerHeight = $( '.header-content' ).children( '.container' ).outerHeight(),
			$header = $( '.site-header' );
		if ( $header.hasClass( 'is-sticky' ) ) {
			topBarHeight = 0;
		}
		var containerOffset = $window.width() > 601 ? topBarHeight : topBarHeight + adminBarHeight, // When window width < 600, admin-bar is not sticky so we have to add them.
			headerContentOffset = $window.width() > 601 ? adminBarHeight : 0;
		$window.on( 'scroll', function () {
			if ( $window.scrollTop() > containerOffset ) {
				$header.addClass( 'is-sticky' ).css( {
					'height': headerContainerHeight,
					'margin-top': topBarHeight
				} );
				if ( $body.hasClass( 'admin-bar' ) ) {
					$( '.header-content' ).css( 'top', headerContentOffset );
				}
			} else {
				$header.removeClass( 'is-sticky' ).css( {
					'height': 'auto',
					'margin-top': 0
				} );
			}
		} );
	}

	/**
	 * Resize videos to fit the container
	 */
	function responsiveVideo() {
		$( window ).on( 'resize', function () {
			$( '.hentry iframe, .hentry object, .hentry video, .widget-content iframe, .widget-content object, .widget-content iframe' ).each( function () {
				var $video = $( this ),
					$container = $video.parent(),
					containerWidth = $container.width(),
					$post = $video.closest( 'article' );

				if ( ! $video.data( 'origwidth' ) ) {
					$video.data( 'origwidth', $video.attr( 'width' ) );
					$video.data( 'origheight', $video.attr( 'height' ) );
				}
				var ratio = containerWidth / $video.data( 'origwidth' );
				$video.css( 'width', containerWidth + 'px' );

				// Only resize height for non-audio post format.
				if ( ! $post.hasClass( 'format-audio' ) ) {
					$video.css( 'height', $video.data( 'origheight' ) * ratio + 'px' );
				}
			} );
		} );
	}

	/**
	 * removeWhiteSpaceEntryFooter
	 */
	function removeWhiteSpaceEntry() {

		$('.section--statistics').each(function() {
			if ($.trim($(this).text()).length == 0) {
				if ($(this).children().length == 0) {
					$(this).text('');
					// $(this).remove(); // remove empty paragraphs
				}
			}
		});
	}

	toggleCollapse();
	menuClick();

	if ( $().slick ) {
		initFeaturedContentSlider();
		lazyLoadFeaturedImg();
		initPartnerSlider();
	}

	hideMobileMenuOnDesktops();
	scrollToTop();
	stickyHeader();
	menuHover();
	responsiveVideo();
	removeWhiteSpaceEntry();
} );
