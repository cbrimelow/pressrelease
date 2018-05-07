<?php
/**
 * Getting started section.
 *
 * @package GreenTech Lite
 */

?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Step 1 - Install The Required Plugins', 'greentech-lite' ); ?></h3>
			<p>
				<?php
				/* translators: theme name. */
				echo esc_html( sprintf( __( '%s needs some plugins to working properly. Please install and activate our required plugins.', 'greentech-lite' ), $this->theme->name ) );
				?>
			</p>
			<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins&plugin_status=install' ) ); ?>"><?php esc_html_e( 'Install Plugins', 'greentech-lite' ); ?></a>

			<h3><?php esc_html_e( 'Step 2 - Connect Your Site To Jetpack', 'greentech-lite' ); ?></h3>
			<p>
				<?php
				/* translators: theme name. */
				echo esc_html( sprintf( __( '%s uses Jetpack to support featured content, social menu. Connect to Jetpack to use these features as well as variety of other tools.', 'greentech-lite' ), $this->theme->name ) );
				?>
			</p>
			<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=jetpack#/dashboard' ) ); ?>"><?php esc_html_e( 'Connect To Jetpack', 'greentech-lite' ); ?></a>
		</div>
		<div class="col">
			<h3><?php esc_html_e( 'Customize The Theme', 'greentech-lite' ); ?></h3>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'greentech-lite' ); ?></p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'greentech-lite' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Read Full Documentation', 'greentech-lite' ); ?></h3>
			<p class="about"><?php esc_html_e( 'Need any helps to setup and configure the theme? Please check our full documentation for detailed information on how to use it.', 'greentech-lite' ); ?></p>
			<p>
				<a href="<?php echo esc_url( "https://gretathemes.com/docs/greentech_lite/?utm_source=theme_dashboard&utm_medium=docs_link&utm_campaign={$this->slug}_dashboard" ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Read Documentation', 'greentech-lite' ); ?></a>
			</p>
		</div>
	</div>
</div>
