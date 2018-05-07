<?php
/**
 * Support section.
 *
 * @package GreenTech Lite
 */

?>
<div id="support" class="gt-tab-pane">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Contact Support', 'greentech-lite' ); ?></h3>
			<p><?php esc_html_e( 'Our support is only available for pro version. Upgrade to GreenTech Pro now to get access to our excellent support as well as variety of useful features.', 'greentech-lite' ); ?></p>
			<a class="button button-primary" href='<?php echo esc_url( "https://gretathemes.com/wordpress-themes/greentech/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>'><?php esc_html_e( 'Upgrade Now', 'greentech-lite' ); ?></a>
		</div>
		<div class="col">
			<h3><?php esc_html_e( 'More Themes From Us', 'greentech-lite' ); ?></h3>
			<p>
				<?php
					// Translators: theme name.
					echo esc_html( sprintf( __( 'If you like %s, you might want to see another beautiful themes from ', 'greentech-lite' ), $this->theme->name ) );
				?>
				<a href="<?php echo esc_url( "https://gretathemes.com/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>"><?php esc_html_e( 'GretaThemes.', 'greentech-lite' ); ?></a>
				<?php echo esc_html__( ' We build high quality WordPress Themes that are well designed and simple to set up. Check them out here!', 'greentech-lite' ); ?>
			</p>
			<a class="button button-primary" href='<?php echo esc_url( "https://gretathemes.com/wordpress-themes/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>'><?php esc_html_e( 'Visit GretaThemes', 'greentech-lite' ); ?></a>
		</div>
	</div>
	<h2><?php esc_html_e( 'You Might Also Like', 'greentech-lite' ); ?></h2>
	<div class="feature-section products three-col">
		<div class="col product">
			<a href="<?php echo esc_url( "https://gretathemes.com/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>" title="<?php esc_attr_e( 'GretaThemes', 'greentech-lite' ); ?>">
				<img class="product__image" src="<?php echo esc_url( get_template_directory_uri() . '/inc/dashboard/images/gretathemes.png' ); ?>" alt="gretathemes" width="96" height="96">
			</a>
			<div class="product__body">
				<h3 class="product__title">
					<a href="<?php echo esc_url( "https://gretathemes.com/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>" title="<?php esc_attr_e( 'GretaThemes', 'greentech-lite' ); ?>"><?php esc_html_e( 'GretaThemes', 'greentech-lite' ); ?></a>
				</h3>
				<p class="product__description">
				<?php
					/* translators: placeholder for HTML */
					printf( esc_html__( 'Modern, clean, responsive %s for all your needs. Fast loading, easy to use and optimized for SEO.', 'greentech-lite' ), '<strong>premium WordPress themes</strong>' )
				?>
			</div>
		</div>
		<div class="col product">
			<a href="<?php echo esc_url( "https://metabox.io/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>" title="<?php esc_attr_e( 'Meta Box', 'greentech-lite' ); ?>">
				<img class="product__image" src="<?php echo esc_url( get_template_directory_uri() . '/inc/dashboard/images/meta-box.png' ); ?>" alt="metabox" width="96" height="96">
			</a>
			<div class="product__body">
				<h3 class="product__title"><a href="<?php echo esc_url( "https://metabox.io/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>" title="<?php esc_attr_e( 'Meta Box', 'greentech-lite' ); ?>"><?php esc_html_e( 'Meta Box', 'greentech-lite' ); ?></a></h3>
				<p class="product__description">
				<?php
					/* translators: placeholder for HTML */
					printf( esc_html__( 'The lightweight %1$s feature-rich WordPress plugin that helps developers to save time building %2$s.', 'greentech-lite' ), '&amp;', '<strong>custom meta boxes and custom fields</strong>' )
				?>
			</div>
		</div>
		<div class="col product">
			<a href="<?php echo esc_url( "https://prowcplugins.com/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>" title="<?php esc_attr_e( 'Professional WooCommerce Plugins', 'greentech-lite' ); ?>">
				<img class="product__image" src="<?php echo esc_url( get_template_directory_uri() . '/inc/dashboard/images/prowcplugins.png' ); ?>" alt="prowcplugins" width="96" height="96">
			</a>
			<div class="product__body">
				<h3 class="product__title">
					<a href="<?php echo esc_url( "https://prowcplugins.com/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>" title="<?php esc_attr_e( 'Professional WooCommerce Plugins', 'greentech-lite' ); ?>"><?php esc_html_e( 'ProWCPlugins', 'greentech-lite' ); ?></a>
				</h3>
				<p class="product__description">
				<?php
					/* translators: placeholder for HTML */
					printf( esc_html__( 'Professional %s that help you empower your e-commerce sites and grow your business.', 'greentech-lite' ), '<strong>WordPress plugins for WooCommerce</strong>' )
				?>
			</div>
		</div>
	</div>
</div>
