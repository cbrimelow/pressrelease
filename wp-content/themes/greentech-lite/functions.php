<?php
/**
 * Greentech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GreenTech Lite
 */

if ( ! function_exists( 'greentech_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function greentech_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on greentech, use a find and replace
		 * to change 'greentech-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'greentech-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/**
		 * Add Custom Logo support to theme
		 */
		add_theme_support( 'custom-logo' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'greentech-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add image size.
		add_image_size( 'greentech-lite-recent-posts', 100, 100, true );
		add_image_size( 'greentech-lite-project', 370, 235, true );
		set_post_thumbnail_size( 770, 400, true );

		// Post format.
		add_theme_support( 'post-formats',
			array(
				'image',
				'video',
				'audio',
				'quote',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'greentech_lite_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function greentech_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'greentech_lite_content_width', 770 );
}
add_action( 'after_setup_theme', 'greentech_lite_content_width', 0 );
/**
 * Enqueue scripts and styles.
 */
function greentech_lite_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', '', '4.7.0' );
	wp_enqueue_style( 'greentech-fonts', greentech_lite_fonts_url() );
	wp_enqueue_style( 'greentech-style', get_stylesheet_uri() );

	wp_enqueue_script( 'greentech-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'greentech-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_front_page() && ! is_home() ) {
		wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.6.0', true );
	}
	wp_enqueue_script( 'greentech-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'greentech_lite_scripts' );

/**
 * Get Google fonts URL for the theme.
 *
 * @return string Google fonts URL for the theme.
 */
function greentech_lite_fonts_url() {
	$fonts   = array();
	$subsets = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'greentech-lite' ) ) {
		$fonts[] = 'Roboto Slab:400,700';
	}
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'greentech-lite' ) ) {
		$fonts[] = 'Open Sans:400,600,700';
	}

	$fonts_url = add_query_arg( array(
		'family' => rawurlencode( implode( '|', $fonts ) ),
		'subset' => rawurlencode( $subsets ),
	), 'https://fonts.googleapis.com/css' );

	return $fonts_url;
}

/**
 * Register widget area.
 */
function greentech_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'greentech-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'greentech-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Topbar left', 'greentech-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'greentech-lite' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Topbar right', 'greentech-lite' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'greentech-lite' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'greentech-lite' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'greentech-lite' ),
		'before_widget' => '<section id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	require_once get_template_directory() . '/inc/widgets/class-greentech-lite-recent-posts-widget.php';
	register_widget( 'Greentech_Lite_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'greentech_lite_widgets_init' );

/**
 * Add editor style.
 */
function greentech_lite_add_editor_styles() {
	add_editor_style( array(
		'css/editor-style.css',
		greentech_lite_fonts_url(),
		get_template_directory_uri() . '/css/font-awesome.css',
	) );
}
add_action( 'init', 'greentech_lite_add_editor_styles' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Breadcrumb
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load dashboard
 */
require get_template_directory() . '/inc/dashboard/class-greentech-lite-dashboard.php';
$dashboard = new Greentech_Lite_Dashboard();
