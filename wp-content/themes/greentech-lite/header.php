<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GreenTech Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'greentech-lite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-content">
			<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="topbar">
					<div class="container">
						<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
							<div class="topbar-left">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
							<div class="topbar-right">
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="container">
				<div class="site-branding">
					<div class="site-logo">
						<?php
						if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
							the_custom_logo();
						}
						?>
						<div class="site-identify">
						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
						</div>
					</div>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'greentech-lite' ); ?></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
					) );
					?>
				</nav><!-- #site-navigation -->

				<nav class="mobile-navigation" role="navigation">
					<?php
					wp_nav_menu( array(
						'container_class' => 'mobile-menu container',
						'menu_class'      => 'mobile-menu clearfix',
						'theme_location'  => 'menu-1',
					) );
					?>
				</nav>

				<div class="site-search">
					<a class="site-search-toggler" data-toggle="collapse" href="#site-search"><i class="fa fa-search"></i></a>
					<div id="site-search" class="collapse"><?php get_search_form(); ?></div>
				</div>
			</div> <!-- #container -->
		</div>
	</header><!-- #masthead -->

	<?php if ( is_front_page() && ! is_home() ) : ?>
		<?php get_template_part( 'template-parts/featured-content' ); ?>
	<?php endif; ?> <!-- featured-cotent -->

	<?php if ( ! is_front_page() ) : ?>
		<div class="page-header">
			<?php greentech_lite_breadcrumbs(); ?>
			<?php if ( is_single() && 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php greentech_lite_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( ! is_home() && is_front_page() ) : ?>
		<div id="content" class="site-content">
	<?php else : ?>
		<div id="content" class="site-content container">
	<?php endif; ?>
