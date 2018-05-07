<?php
/**
 * business booster functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package business_booster
 */

if ( ! function_exists( 'business_booster_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function business_booster_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org.
	 * If you're building a theme based on Business Booster, use a find and replace
	 * to change 'Business Booster' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'business-booster');
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	// for custom logo		
		add_theme_support( 'custom-logo', array(		
			'height'      => 248,		
			'width'       => 248,		
			'flex-height' => true,		
		) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	
	// Thumbnail sizes		
		add_image_size( 'business_booster-featured', 600, 600, true );		
				
		add_image_size( 'business_booster-featured-single', 980, 600, true );		
		
		add_editor_style('editor-style.css');
		
		set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'business-booster' ),
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
	
	// custom logo 		
		if ( ! function_exists( 'business_booster_custom_logo' ) ) :		
		/**		
	 	* Displays the optional custom logo.		
	 	*		
	 	*	 Does nothing if the custom logo is not available.		
	 	*		
	 	* @since Twenty Fifteen 1.5		
	 	*/		
		function business_booster_custom_logo() {		
		if ( function_exists( 'the_custom_logo' ) ) {		
			the_custom_logo();		
		}		
	}		
		endif;
	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'business_booster_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;

add_action( 'after_setup_theme', 'business_booster_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_booster_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_booster_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_booster_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_booster_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'business-booster' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'business-booster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage News Section', 'business-booster' ),
		'id'            => 'home-news-section',
		'description'   => esc_html__( 'Add widgets here.', 'business-booster' ),
		'before_widget' => '<section id="%1$s" class="home-recent-news widget %2$s">',
		'after_widget'  => '</section>',
	) );
	
	register_sidebar(array(
		'id' => 'business-footer1',
		'name' => esc_html__( 'Footer 1', 'business-booster' ),
		'description'   => esc_html__( 'Add widgets here.', 'business-booster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id' => 'business-footer2',
		'name' => esc_html__( 'Footer 2', 'business-booster' ),
		'description'   => esc_html__( 'Add widgets here.', 'business-booster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id' => 'business-footer3',
		'name' => esc_html__( 'Footer 3', 'business-booster' ),
		'description'   => esc_html__( 'Add widgets here.', 'business-booster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id' => 'business-footer4',
		'name' => esc_html__( 'Footer 4', 'business-booster' ),
		'description'   => esc_html__( 'Add widgets here.', 'business-booster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id' => 'business-footer5',
		'name' => esc_html__( 'Footer 5', 'business-booster' ),
		'description'   => esc_html__( 'Add widgets here.', 'business-booster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id' => 'business-footer6',
		'name' => esc_html__( 'Footer 6', 'business-booster' ),
		'description'   => esc_html__( 'Add widgets here.', 'business-booster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	


}
add_action( 'widgets_init', 'business_booster_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function business_booster_scripts() {
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css',array(),'3.3.4' );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome-4.7.0/css/font-awesome.min.css',array(),'4.0.3' );
	
	wp_enqueue_style( 'business-booster-style', get_stylesheet_uri() );

	wp_enqueue_style( 'business-booster-montserrat-font','https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', array(), '1.0', 'all' );
	
	wp_enqueue_style( 'business-booster-lato-font','https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i', array(), '1.0', 'all' );
	
	wp_enqueue_script( 'business-booster-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );

	wp_enqueue_script( 'business-booster-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'business-booster-custom-js', get_template_directory_uri() . '/js/business-booster-custom-js.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_booster_scripts' );


/*Add theme menu page*/
 
add_action('admin_menu', 'business_booster_menu');

function business_booster_menu() {
	
	$business_booster_page_title = __("Business Booster",'business-booster');
	
	$business_booster_menu_title = __("Business Booster",'business-booster');
	
	add_theme_page($business_booster_page_title, $business_booster_menu_title, 'edit_theme_options', 'business-booster-pro', 'business_booster_menu_pro_page');
	
}

/*
**
** Premium Theme Feature Page
**
*/

function business_booster_menu_pro_page(){
	
	if ( is_admin() ) {
		
		$importer_new = isset($_GET['active_class'])?sanitize_text_field($_GET['active_class']):'';
		
		?>
		
		<div id="profile-page" class="wrap">
		
			<h2><?php _e( 'Business Booster', 'business-booster' ) ?></h2>
			
			<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
			
			<a class="nav-tab<?php  if($importer_new==3){ echo esc_attr( " active" ); }?>" href=<?php echo esc_url("?page=business-booster-pro&amp;importer=phoen-data-importer&amp;active_class=3");?>><?php _e('One Click Demo Import','business-booster'); ?></a>
			
			</h2>
					
		</div>
	</br>
			<?php
		
		$importer=isset($_GET['importer'])?sanitize_text_field($_GET['importer']):'';
		 
		if ($importer =='' || $importer == 'phoen-data-importer' ){ ?>
			<div class="demo-import-tab-content info-tab-content">
					<?php if ( has_action( 'business-booster_phoen_importer_tab_main' ) ) {
					do_action( 'business-booster_phoen_importer_tab_main' );
				} else { ?>
					<div id="plugin-filter" class="demo-import-boxed">
						<?php
					   $plugin_name = esc_html('theme-data-importor-by-phoeniixx');
						$status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_name );
						$button_class = esc_html('install-now button');
						$button_txt = esc_html__( 'Install Now', 'business-booster' );
						if ( ! $status ) {
							$install_url = wp_nonce_url(
								add_query_arg(
									array(
										'action' => 'install-plugin',
										'plugin' => $plugin_name
									),
									network_admin_url( 'update.php' )
								),
								'install-plugin_'.$plugin_name
							);

						} else {
							$install_url = add_query_arg(array(
								'action' => 'activate',
								'plugin' => rawurlencode( $plugin_name . '/main.php' ),
								'plugin_status' => 'all',
								'paged' => '1',
								'_wpnonce' => wp_create_nonce('activate-plugin_' . $plugin_name . '/main.php'),
							), network_admin_url('plugins.php'));
							$button_class = 'activate-now button-primary';
							$button_txt = esc_html__( 'Active Now', 'business-booster' );
						}

						$detail_link = add_query_arg(
							array(
								'importer' => 'plugin-information',
								'plugin' => $plugin_name,
								'TB_iframe' => 'true',
								'width' => '772',
								'height' => '349',

							),
							network_admin_url( 'plugin-install.php' )
						);

						echo '<p>';
						printf( esc_html__(
							'%1$s you will need to install and activate the %2$s plugin first.', 'business-booster' ),
							'<b>'.esc_html__( 'Hey.', 'business-booster' ).'</b>',
							'<a class="thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'One Click Demo Importer By Phoeniixx', 'business-booster' ).'</a>'
						);
						echo '</p>';

						echo '<p class="plugin-card-'.esc_attr( $plugin_name ).'"><a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_name ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a></p>';

						?>
					</div>
				<?php } ?>
			</div>
			<?php 
		} 
		
	} 
	
}


/* slider js for frontend */

add_action('wp_head','business_booster_frontend_script');

function business_booster_frontend_script()
{
	wp_enqueue_script( 'jquery-slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '20151215', true );

}


// Display an optional post thumbnail.
if ( ! function_exists( 'business_booster_post_thumbnail')) :		
		
			
	function business_booster_post_thumbnail() {		
			
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {		
			
			return;		
			
		}		
		
		if ( is_singular() ) :		
			
		?>		
			
			
		<div class="entry-summary">		
			
			<?php the_post_thumbnail(); ?>		
			
		</div><!-- .post-thumbnail -->		
			
			
		<?php else : ?>		
			
			
		<div class="post-thumbnail">		
			<a href="<?php the_permalink(); ?>">		
			
				<?php		
			
					the_post_thumbnail('post-thumbnail', array( 'alt' => esc_attr(get_the_title())));		
			
				?>		
			
			</a>		
		</div>		
			
			
			
		<?php endif; // End is_singular()		
			
	}		
			
	endif;

/**
 * Clean up the_excerpt()
 */
function business_booster_excerpt_length($length) {
	
	if ( is_admin() ) {
        return $length;
    }else{
		return 50;
	}
	
}		

add_filter('excerpt_length', 'business_booster_excerpt_length');

function business_booster_excerpt_more($more) {
 
	if ( is_admin() ) {
		return $more;
	}

	$more = sprintf( '<p class="link-more"><a href="%1$s" class="more-link business-booster-excerpt-btn">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'business-booster' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $more;
 
}

add_filter('excerpt_more', 'business_booster_excerpt_more');			

/*Business Booster Recent Post Widget*/

require get_template_directory() . '/inc/widgets/business_booster_recent_post.php';

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
require get_template_directory() . '/inc/extras.php';


require get_template_directory(). '/inc/phoen_dashboard.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
