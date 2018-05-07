<?php
/**
 * Add theme dashboard page
 *
 * @package GreenTech Lite
 */

/**
 * Dashboard class.
 */
class Greentech_Lite_Dashboard {
	/**
	 * Store the theme data.
	 *
	 * @var WP_Theme Theme data.
	 */
	private $theme;

	/**
	 * Theme slug.
	 *
	 * @var string Theme slug.
	 */
	private $slug;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->theme = wp_get_theme();
		$this->slug  = $this->theme->template;

		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Add theme dashboard page.
	 */
	public function add_menu() {
		add_theme_page(
			$this->theme->name,
			$this->theme->name,
			'edit_theme_options',
			$this->slug,
			array( $this, 'render' )
		);
	}

	/**
	 * Show dashboard page.
	 */
	public function render() {
		?>
		<div class="wrap about-wrap">
			<?php include get_template_directory() . '/inc/dashboard/sections/welcome.php'; ?>
			<?php include get_template_directory() . '/inc/dashboard/sections/tabs.php'; ?>
			<?php include get_template_directory() . '/inc/dashboard/sections/getting-started.php'; ?>
			<?php include get_template_directory() . '/inc/dashboard/sections/pro.php'; ?>
			<?php include get_template_directory() . '/inc/dashboard/sections/support.php'; ?>
		</div>
		<?php
	}

	/**
	 * Enqueue scripts for dashboard page.
	 *
	 * @param string $hook Page hook.
	 */
	public function enqueue_scripts( $hook ) {
		if ( "appearance_page_{$this->slug}" !== $hook ) {
			return;
		}
		wp_enqueue_style( "{$this->slug}-dashboard-style", get_template_directory_uri() . '/inc/dashboard/css/dashboard-style.css' );
		wp_enqueue_script( "{$this->slug}-dashboard-script", get_template_directory_uri() . '/inc/dashboard/js/script.js', array( 'jquery' ), '', true );
	}
}
