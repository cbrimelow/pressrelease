<?php
/**
 * Custom heading for customizer.
 *
 * @package GreenTech Lite
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Add custom heading for each part in section.
	 */
	class Greentech_Lite_Custom_Heading extends WP_Customize_Control {
		/**
		 * Control's type.
		 *
		 * @var string
		 */
		public $type = 'info';

		/**
		 * Label for the control.
		 *
		 * @var string
		 */
		public $label = '';

		/**
		 * Render the control's content.
		 */
		public function render_content() {
		?>
		<h3 style="margin-top:30px; border-bottom:1px solid; padding:5px; color:#61a83e; text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
		<?php
		}
	}
}
