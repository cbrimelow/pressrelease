<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business_booster
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

<header id="masthead" class="site-header" role="banner">


	<div class="container-fluid header_top">
		<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<ul class="header_top_about">
				
					<?php if(get_theme_mod("call_us_sec_on_off") != '' && get_theme_mod("call_us_sec_on_off") == 'on'): ?>	
						<li><p><i class="fa fa-phone"></i><span><?php echo esc_html(get_theme_mod("business_booster_call_label")); ?></span> <b><?php echo esc_html(get_theme_mod("business_booster_call_num")); ?></b> </p></li>
					<?php endif; ?>
					
					<?php if(get_theme_mod("email_sec_on_off") != '' && get_theme_mod("email_sec_on_off") == 'on'): ?>	
						<li><p><i class="fa fa-envelope"></i><span><?php echo esc_html(get_theme_mod("business_booster_email_label")); ?> </span> <b><?php echo esc_html(get_theme_mod("business_booster_email_id")); ?> </b></p></li>
					<?php endif; ?>
					
				</ul>
			</div>
			<div class="col-sm-6">
				<ul class="header_top_social">
					<li><?php echo esc_html(get_theme_mod("business_booster_follow_us_text")); ?></li>
				
					<?php if(get_theme_mod("social_fb_sec_on_off") != '' && get_theme_mod("social_fb_sec_on_off") == 'on'): ?>
					<li><a href="<?php echo esc_url(get_theme_mod("social_fb_btn_lnk"));?>"><i class="fa fa-facebook" ></i></a></li>
					<?php endif; ?>
				
					<?php if(get_theme_mod("social_twitter_sec_on_off") != '' && get_theme_mod("social_twitter_sec_on_off") == 'on'): ?>
						<li><a href="<?php echo esc_url(get_theme_mod("social_twitter_btn_lnk"));?>"><span class="fa fa-twitter"></span></a></li>
					<?php endif; ?>
					
					<?php if(get_theme_mod("social_linkedin_sec_on_off") != '' && get_theme_mod("social_linkedin_sec_on_off") == 'on'): ?>
						<li><a href="<?php echo esc_url(get_theme_mod("social_linkedin_btn_lnk"));?>"><span class="fa fa-linkedin"></span></a></li>
					<?php endif; ?>
					
					<?php if(get_theme_mod("social_google_sec_on_off") != '' && get_theme_mod("social_google_sec_on_off") == 'on'): ?>
						<li><a href="<?php echo esc_url(get_theme_mod("social_google_btn_lnk"));?>"><span class="fa fa-google-plus"></span></a></li>
					<?php endif; ?>
					
					<?php if(get_theme_mod("social_rss_sec_on_off") != '' && get_theme_mod("social_rss_sec_on_off") == 'on'): ?>
						<li><a href="<?php echo esc_url(get_theme_mod("social_rssfeed_btn_lnk"));?>"><span class="fa fa-rss"></span></a></li>
					<?php endif; ?>
					
				</ul>
			</div>
		</div>	
		</div> <!-- container -->
	</div>


	<div class="container-fluid header_bot">
		<div class="container navbar_container">
		<div class="row">
		
			<div id="page" class="site">
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-booster' ); ?></a>
					<div class="col-sm-3 site-branding">
					
						<?php
						
						business_booster_custom_logo(); 
						
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div><!-- .site-branding -->
					
					<div class="col-sm-9 navbar_main">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<span class="icon-bar"></span>		
								<span class="icon-bar"></span>		
								<span class="icon-bar"></span>
							</button> 
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' , 'container_class'=> 'business-booster-nav') ); ?>
						</nav><!-- #site-navigation -->
					</div> <!-- navbar_main -->

			</div><!-- #page -->
		
		</div>
		</div><!--  container navbar_container -->	
		
		<div class="custom-header">
				<div class="custom-header-media">
					<?php the_custom_header_markup(); ?>
				</div>
			</div>
		
	</div><!-- container-fluid -->	
</header><!-- #masthead -->


	<div class="container">
	<div id="content" class="site-content">
