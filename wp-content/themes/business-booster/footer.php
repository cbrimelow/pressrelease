<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business_booster
 */

?>

	</div><!-- #content -->
	</div><!-- #page -->
	</div><!-- .container -->
	
<div class="container-fluid business-booster-footer-main">

			<footer id="colophon" class="site-footer" role="contentinfo">
				
			<div class="container">
				<div id="inner-footer" class="clearfix">				
					<div id="widget-footer" class="clearfix">		
						<div class="bb_footer_top_sec">
							<div class="col-sm-6 bb_client_logo">	
								<?php if ( is_active_sidebar( !dynamic_sidebar('business-footer1'))) : ?>		
								<?php endif; ?>									
							</div>			
							
							<div class="col-sm-6 bb_client_headline">
								<?php if ( is_active_sidebar( !dynamic_sidebar('business-footer2'))) : ?>		
								<?php endif; ?>			
							</div>			
						</div>			
						<div class="bb_footer_bot_sec">	
							<div class="col-sm-4 bb_address">
								<?php if ( is_active_sidebar( !dynamic_sidebar('business-footer3'))) : ?>		
								<?php endif; ?>			
							</div>			
							
							<div class="col-sm-4 bb_address">						
								<?php if ( is_active_sidebar( !dynamic_sidebar('business-footer4'))) : ?>		
								<?php endif; ?>			
							</div>

							<div class="col-sm-4 bb_address">						
								<?php if ( is_active_sidebar( !dynamic_sidebar('business-footer5'))) : ?>		
								<?php endif; ?>			
							</div>						
						</div>						
								
							
			
					</div> <!-- #widget-footer -->
				</div> <!-- #inner-footer -->

			</div><!-- #container -->

					
				
			</footer><!-- #colophon -->
	
</div><!-- #container-fluid -->

<div class="container-fluid bb_ss_footer">
	<div class="container">
	<div class="row">

		<div class="bb_footer_copy">
			<div class="col-sm-6">
				<?php if ( is_active_sidebar( !dynamic_sidebar('business-footer6'))) : ?>		
				<?php endif; ?>	
				
				<p class="bb_copy_text"><?php printf(esc_html(get_theme_mod("business_booster_copyright_text"))); ?> <a href="<?php echo esc_url( __( 'http://phoeniixx.com/', 'business-booster' ) ); ?>" rel="designer"><?php esc_html_e('phoeniixx','business-booster'); ?></a> </p>
				
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
	</div>
	</div>
</div>


<?php wp_footer(); ?>

</body>
</html>
