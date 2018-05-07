<?php 

/**
 * Template Name: Front Page
 **/

 get_header();

?>

</div><!-- #page -->
</div><!-- .container -->
</div>

<div class="business_home_main_wrap">

<?php if(get_theme_mod("business_booster_banner_on_off") != '' && get_theme_mod("business_booster_banner_on_off") == 'on'): ?>
	<div class="container-fluid business_banner_sec business_section_margin"  style="background-image: url('<?php echo esc_url(get_theme_mod("business_booster_banner_img")); ?>') ;">
			
		<div class="image_bg_overlay"></div>
		
		<div class="business_banner_content">
			<h4 class="small_head"><?php echo esc_html(get_theme_mod("business_booster_banner_small_head")); ?></h4>
			<h1 class="main_head"><?php echo esc_html(get_theme_mod("business_booster_banner_main_head")); ?></h1>
			<p class="description"><?php echo esc_html(get_theme_mod("business_booster_banner_desc")); ?></p>
			<a class="btn banner_btn" href="<?php echo esc_url(get_theme_mod("business_booster_banner_btn_link"));?>"><?php echo esc_html(get_theme_mod("business_booster_banner_btn_text")); ?></a>
		</div>
			
	</div> <!-- business_banner_sec -->
<?php endif; ?>

<?php if(get_theme_mod("business_booster_services_on_off") != ''): ?>
<div class="container business_services_sec_main business_section_margin">
	<div class="row">
		
		<div class="business_sec_head_text business_section_margin">
			<?php if(get_theme_mod("business_booster_services_small_head") != ''): ?>
				<h4 class="sec_small_head"><?php echo esc_html(get_theme_mod("business_booster_services_small_head")); ?></h4>
			<?php endif;?>
			
			<?php if(get_theme_mod("business_booster_services_main_head") != ''): ?>
				<h1 class="sec_main_head"><?php echo esc_html(get_theme_mod("business_booster_services_main_head")); ?></h1>
			<?php endif;?>
			
			<?php if(get_theme_mod("business_booster_services_desc_txt") != ''): ?>
				<p class="sec_desc_txt"><?php echo esc_html(get_theme_mod("business_booster_services_desc_txt")); ?></p>
			<?php endif;?>
		</div>
		
		<div class="business_services_sec">
		
			<div class="col-sm-4 services_content">
				<?php  $business_booster_service1_pages = absint(get_theme_mod("business_booster_service1_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_service1_pages) ):
									$business_booster_service1_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_service1_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_service1_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_service1_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_service1_pages ) ); ?>"><h1 class="service_heading"><?php echo get_the_title( $business_booster_service1_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="service_heading"><?php echo get_the_title( $business_booster_service1_pages ); ?> </h1>
					<?php endif;?>
					<p class="service_text"><?php echo esc_html(wp_trim_words(apply_filters( 'the_content', get_post( $business_booster_service1_pages)->post_content ),10)); ?></p>
			</div>
			
			<div class="col-sm-4 services_content">
				<?php  $business_booster_service2_pages = absint(get_theme_mod("business_booster_service2_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_service2_pages) ):
									$business_booster_service1_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_service2_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_service1_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_service2_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_service2_pages ) ); ?>"><h1 class="service_heading"><?php echo get_the_title( $business_booster_service2_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="service_heading"><?php echo get_the_title( $business_booster_service2_pages ); ?> </h1>
					<?php endif;?>
					<p class="service_text"><?php echo esc_html(wp_trim_words(apply_filters( 'the_content', get_post( $business_booster_service2_pages)->post_content ),10)); ?></p>
			</div>
			<div class="col-sm-4 services_content">
				<?php  $business_booster_service3_pages = absint(get_theme_mod("business_booster_service3_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_service3_pages) ):
									$business_booster_service1_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_service3_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_service1_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_service3_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_service3_pages ) ); ?>"><h1 class="service_heading"><?php echo get_the_title( $business_booster_service3_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="service_heading"><?php echo get_the_title( $business_booster_service3_pages ); ?> </h1>
					<?php endif;?>
					<p class="service_text"><?php echo esc_html(wp_trim_words(apply_filters( 'the_content', get_post( $business_booster_service3_pages)->post_content ),10)); ?></p>
			</div>
			<div class="col-sm-4 services_content">
				<?php  $business_booster_service4_pages = absint(get_theme_mod("business_booster_service4_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_service4_pages) ):
									$business_booster_service1_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_service4_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_service1_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_service4_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_service4_pages ) ); ?>"><h1 class="service_heading"><?php echo get_the_title( $business_booster_service4_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="service_heading"><?php echo get_the_title( $business_booster_service4_pages ); ?> </h1>
					<?php endif;?>
					<p class="service_text"><?php echo esc_html(wp_trim_words(apply_filters( 'the_content', get_post( $business_booster_service4_pages)->post_content ),10)); ?></p>
			</div>
			<div class="col-sm-4 services_content">
				<?php  $business_booster_service5_pages = absint(get_theme_mod("business_booster_service5_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_service5_pages) ):
									$business_booster_service1_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_service5_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_service1_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_service5_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_service5_pages ) ); ?>"><h1 class="service_heading"><?php echo get_the_title( $business_booster_service5_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="service_heading"><?php echo get_the_title( $business_booster_service5_pages ); ?> </h1>
					<?php endif;?>
					<p class="service_text"><?php echo esc_html(wp_trim_words(apply_filters( 'the_content', get_post( $business_booster_service5_pages)->post_content ),10)); ?></p>
			</div>
			<div class="col-sm-4 services_content">
				<?php  $business_booster_service6_pages = absint(get_theme_mod("business_booster_service6_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_service6_pages) ):
									$business_booster_service1_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_service6_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_service1_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_service6_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_service6_pages ) ); ?>"><h1 class="service_heading"><?php echo get_the_title( $business_booster_service6_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="service_heading"><?php echo get_the_title( $business_booster_service6_pages ); ?> </h1>
					<?php endif;?>
					<p class="service_text"><?php echo esc_html(wp_trim_words(apply_filters( 'the_content', get_post( $business_booster_service6_pages)->post_content ),10)); ?></p>
			</div>
			
			<?php if(get_theme_mod("business_booster_services_btn_text") != ''): ?>
				<div class="srvices_btn_link">
					<a class="btn" href="<?php echo esc_url(get_theme_mod("business_booster_services_btn_link"));?>"><?php echo esc_html(get_theme_mod("business_booster_services_btn_text")); ?></a>
				</div>
			<?php endif;?>	
			
		</div> <!-- business_services_sec -->
		
	</div>
</div> <!-- business_services_sec_main -->
<?php endif;?>		


<?php if(get_theme_mod("business_counters_sec_on_off") != ''): ?>
<div class="container-fluid business_counters_sec_main business_section_margin" style="background-image: url('<?php echo esc_url(get_theme_mod("business_counters_bg_image")); ?>') ;" >
	
	<div class="business_counters_overlay_bg"></div>
	
	<div class="container">
		<div class="row">
			
			<div class="col-sm-8 counters_text_sec">
				<?php if(get_theme_mod("business_booster_counter_small_head") != ''): ?>
					<h4 class="counter_small_head"><?php echo esc_html(get_theme_mod("business_booster_counter_small_head")); ?></h4>
				<?php endif;?>
				
				<?php if(get_theme_mod("business_booster_counter_main_head") != ''): ?>
					<h1 class="counter_main_head"><?php echo esc_html(get_theme_mod("business_booster_counter_main_head")); ?></h1>
				<?php endif;?>
				
				<?php if(get_theme_mod("business_booster_counter_desc_txt") != ''): ?>	
					<p class="counter_desc_txt"><?php echo esc_html(get_theme_mod("business_booster_counter_desc_txt")); ?></p>
				<?php endif;?>
				
				<?php if(get_theme_mod("business_booster_counter_btn_txt") != ''): ?>	
					<a class="btn" href="<?php echo esc_url(get_theme_mod("business_booster_counter_btn_link"));?>"><?php echo esc_html(get_theme_mod("business_booster_counter_btn_txt")); ?></a>
				<?php endif;?>	
			</div> <!-- counters_text_sec -->
			
			<div class="col-sm-4 counters_number_sec">
				<div class="number_content">
					<?php if(get_theme_mod("business_booster_counter1_number") != ''): ?>
						<h1 class="number_head"><?php echo esc_html(get_theme_mod("business_booster_counter1_number")); ?></h1>
					<?php endif;?>
					
					<?php if(get_theme_mod("business_booster_counter1_number_text") != ''): ?>
						<p class="number_text"><?php echo esc_html(get_theme_mod("business_booster_counter1_number_text")); ?></p>
					<?php endif;?>
				</div>
				
				<div class="number_content">
					<?php if(get_theme_mod("business_booster_counter2_number") != ''): ?>
						<h1 class="number_head"><?php echo esc_html(get_theme_mod("business_booster_counter2_number")); ?></h1>
					<?php endif;?>
					
					<?php if(get_theme_mod("business_booster_counter2_number_text") != ''): ?>
						<p class="number_text"><?php echo esc_html(get_theme_mod("business_booster_counter2_number_text")); ?></p>
					<?php endif;?>
				</div>
				
				<div class="number_content">
					<?php if(get_theme_mod("business_booster_counter3_number") != ''): ?>
						<h1 class="number_head"><?php echo esc_html(get_theme_mod("business_booster_counter3_number")); ?></h1>
					<?php endif;?>
					
					<?php if(get_theme_mod("business_booster_counter3_number_text") != ''): ?>
						<p class="number_text"><?php echo esc_html(get_theme_mod("business_booster_counter3_number_text")); ?></p>
					<?php endif;?>
				</div>
			</div><!-- counters_number_sec -->
			
		</div>
	</div>

</div> <!-- business_counters_sec_main -->
<?php endif;?>		


<?php if(get_theme_mod("business_booster_team_section_on_off") != ''): ?>
<div class="container business_team_sec_main business_section_margin">
	<div class="row">
		
		<div class="business_sec_head_text business_section_margin">
			<?php if(get_theme_mod("business_booster_team_small_head") != ''): ?>
				<h4 class="sec_small_head"><?php echo esc_html(get_theme_mod("business_booster_team_small_head")); ?></h4>
			<?php endif;?>
			
			<?php if(get_theme_mod("business_booster_team_main_head") != ''): ?>
				<h1 class="sec_main_head"><?php echo esc_html(get_theme_mod("business_booster_team_main_head")); ?></h1>
			<?php endif;?>
			
			<?php if(get_theme_mod("business_booster_team_desc_txt") != ''): ?>
				<p class="sec_desc_txt"><?php echo esc_html(get_theme_mod("business_booster_team_desc_txt")); ?></p>
			<?php endif;?>
		</div>
		
		<div class="business_team_sec clearfix">
			<div class="col-sm-4 business_team_content">
			
				<?php  $business_booster_team_member1_pages = absint(get_theme_mod("business_booster_team_member1_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_team_member1_pages) ):
									$business_booster_team_member_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_team_member1_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_team_member_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_team_member1_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_team_member1_pages ) ); ?>"><h1 class="member_name"><?php echo get_the_title( $business_booster_team_member1_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="member_name"><?php echo get_the_title( $business_booster_team_member1_pages ); ?> </h1>
					<?php endif;?>
			</div>
			
			<div class="col-sm-4 business_team_content">
				<?php  $business_booster_team_member2_pages = absint(get_theme_mod("business_booster_team_member2_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_team_member2_pages) ):
									$business_booster_team_member_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_team_member2_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_team_member_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_team_member2_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_team_member2_pages ) ); ?>"><h1 class="member_name"><?php echo get_the_title( $business_booster_team_member2_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="member_name"><?php echo get_the_title( $business_booster_team_member2_pages ); ?> </h1>
					<?php endif;?>
			</div>
			
			<div class="col-sm-4 business_team_content">
				<?php  $business_booster_team_member3_pages = absint(get_theme_mod("business_booster_team_member3_pages")); ?>
					<?php if (has_post_thumbnail($business_booster_team_member3_pages) ):
									$business_booster_team_member_image = wp_get_attachment_image_src( get_post_thumbnail_id($business_booster_team_member3_pages), 'single-post-thumbnail' ); ?>
									<img src="<?php echo esc_url($business_booster_team_member_image[0]); ?>" />
							   <?php endif; ?>
					<?php if(get_theme_mod("business_booster_team_member3_pages_enable")==1):?>
						<a href="<?php echo esc_url( get_permalink($business_booster_team_member3_pages ) ); ?>"><h1 class="member_name"><?php echo get_the_title( $business_booster_team_member3_pages ); ?> </h1></a>
					<?php else: ?>
						<h1 class="member_name"><?php echo get_the_title( $business_booster_team_member3_pages ); ?> </h1>
					<?php endif;?>
			</div>
		</div> <!-- business_team_sec -->
		
	</div>
</div> <!-- business_team_sec_main -->
<?php endif;?>		


<?php if(get_theme_mod("business_booster_news_section_on_off") != ''): ?>
<div class="container-fluid business_news_sec_main" style="background-image: url('<?php echo esc_url(get_theme_mod("business_booster_news_bg_image")); ?>') ;" >
	<div class="container">
	
		<div class="business_sec_head_text news_sec_txt business_section_margin">
			<?php if(get_theme_mod("business_booster_news_small_head") != ''): ?>
				<h4 class="sec_small_head"><?php echo esc_html(get_theme_mod("business_booster_news_small_head")); ?></h4>
			<?php endif;?>
			
			<?php if(get_theme_mod("business_booster_news_main_head") != ''): ?>
				<h1 class="sec_main_head"><?php echo esc_html(get_theme_mod("business_booster_news_main_head")); ?></h1>
			<?php endif;?>
			
			<?php if(get_theme_mod("business_booster_news_desc_txt") != ''): ?>
				<p class="sec_desc_txt"><?php echo esc_html(get_theme_mod("business_booster_news_desc_txt")); ?></p>
			<?php endif;?>
		</div>
		
		<div class="business_news_content_main">
			<?php if ( is_active_sidebar( !dynamic_sidebar('home-news-section'))) : ?>		
			<?php endif; ?>
		</div>

	</div>

</div> <!-- business_news_sec_main -->
<?php endif;?>	


<?php if(get_theme_mod("business_booster_stay_tuned_section_on_off") != ''): ?>
<div class="container business_stay_tuned_sec_main clearfix">
<div class="row">
	
	<div class="col-sm-9 stay_tuned_txt">
		<?php if(get_theme_mod("business_booster_stay_tuned_head") != ''): ?>
			<h1><?php echo esc_html(get_theme_mod("business_booster_stay_tuned_head")); ?></h1>
		<?php endif;?>
	</div> <!-- stay_tuned_txt -->
	
	<div class="col-sm-3 stay_tuned_btn">
		<?php if(get_theme_mod("business_booster_stay_tuned_button_txt") != ''): ?>	
			<a class="btn" href="<?php echo esc_url(get_theme_mod("business_booster_stay_tuned_button_link"));?>"><?php echo esc_html(get_theme_mod("business_booster_stay_tuned_button_txt")); ?></a>
		<?php endif;?>
	</div> <!-- stay_tuned_btn -->
	
</div>
</div> <!-- business_stay_tuned_sec_main -->
<?php endif;?>	

</div> <!-- business_home_main_wrap -->


<?php get_footer(); ?>