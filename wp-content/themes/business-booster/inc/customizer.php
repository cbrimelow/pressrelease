<?php
/**
 * business booster Theme Customizer.
 *
 * @package business_booster
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_booster_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
				
		// header section panel
		$wp_customize->add_panel( 'business_booster_header_panel', array(
			  'title' => __( "Header Section" , "business-booster"),
			  'priority' => 29, // Mixed with top-level-section hierarchy.
		) );		
				
		$pages  =  get_pages();
		$option_pages = array();
		$option_pages[0] = esc_html__( 'Select page', 'business-booster' );
		foreach( $pages as $p ){
			$option_pages[ $p->ID ] = $p->post_title;
		}
				
				// header call us section
				$wp_customize->add_section("business_booster_header_call_us", array(
					"title" => __("Call Us Section", "business-booster"),
					"priority" => 29,
					"panel" => "business_booster_header_panel",
				));
						
						// for call us section on/off
						$wp_customize->add_setting("call_us_sec_on_off", array(
							"default" => 'off',
							"transport" => "refresh",
							'sanitize_callback' => 'business_booster_radio_sanitize_row',
						));
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"call_us_sec_on_off",
							array(
							'type' => 'radio',
							'label' => __("Call us Section On/Off", "business-booster"),
							'section' => 'business_booster_header_call_us',
							'choices' => array(
								'on' =>__("On", "business-booster"),
								'off' => __("Off", "business-booster")
							),
						)
						));
						
						// for call us label
						$wp_customize->add_setting("business_booster_call_label", array(
							"default" => '',
							"transport" => "refresh",
							'sanitize_callback' => 'business_booster_text_sanitize_row'
						));
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"business_booster_call_label",
							array(
								"label" => __("Call Us Label", "business-booster"),
								"section" => "business_booster_header_call_us",
								"settings" => "business_booster_call_label",
								
							)
						));
							
							// for call us number
							$wp_customize->add_setting("business_booster_call_num", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_call_num",
								array(
									"label" => __("Call Us Number", "business-booster"),
									"section" => "business_booster_header_call_us",
									"settings" => "business_booster_call_num",
									
								)
							));
							
							
					// header Email section
					$wp_customize->add_section("business_booster_header_email", array(
						"title" => __("Email Section", "business-booster"),
						"priority" => 29,
						"panel" => "business_booster_header_panel",
					));		
							
							// for email id section on/off
							$wp_customize->add_setting("email_sec_on_off", array(
								"default" => 'off',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_radio_sanitize_row',
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"email_sec_on_off",
								array(
								'type' => 'radio',
								'label' => __("Email Section On/Off", "business-booster"),
								'section' => 'business_booster_header_email',
								'choices' => array(
									'on' =>__("On", "business-booster"),
									'off' => __("Off", "business-booster")
								),
							)
							));
							
							// for email label
							$wp_customize->add_setting("business_booster_email_label", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_email_label",
								array(
									"label" => __("Email Label", "business-booster"),
									"section" => "business_booster_header_email",
									"settings" => "business_booster_email_label",
									
								)
							));
							
							// for email id
							$wp_customize->add_setting("business_booster_email_id", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'sanitize_email'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_email_id",
								array(
									"label" => __("Email Id:", "business-booster"),
									"section" => "business_booster_header_email",
									"settings" => "business_booster_email_id",
									
								)
							));
				
				
						
				// header follow us section
				$wp_customize->add_section("business_booster_header_follow_us", array(
					"title" => __("Follow Us Section", "business-booster"),
					"priority" => 29,
					"panel" => "business_booster_header_panel",
				));		
						
						// for Follow us text
						$wp_customize->add_setting("business_booster_follow_us_text", array(
							"default" => '',
							"transport" => "refresh",
							'sanitize_callback' => 'business_booster_text_sanitize_row'
						));
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"business_booster_follow_us_text",
							array(
								"label" => __("Follow Us Text", "business-booster"),
								"section" => "business_booster_header_follow_us",
								"settings" => "business_booster_follow_us_text",
								
							)
						));
				
						// for facebook icons on off option
						$wp_customize->add_setting("social_fb_sec_on_off", array(
							"default" => 'off',
							"transport" => "refresh",
							'sanitize_callback' => 'business_booster_radio_sanitize_row',
						));
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"social_fb_sec_on_off",
							array(
							'type' => 'radio',
							'label' => __("Facebook Icon On/Off", "business-booster"),
							'section' => 'business_booster_header_follow_us',
							'choices' => array(
								'on' =>__("On", "business-booster"),
								'off' => __("Off", "business-booster")
							),
						)
						));
						
						// for facebook link
						$wp_customize->add_setting("social_fb_btn_lnk", array(
							"default" => '',
							"transport" => "refresh",
							'sanitize_callback' => 'esc_url_raw',
						));
						$wp_customize->add_control(new WP_Customize_Control(
						$wp_customize,
						"social_fb_btn_lnk",
						array(
								"label" => __("Facebook Button Link", "business-booster"),
								"section" => "business_booster_header_follow_us",
								"settings" => "social_fb_btn_lnk",
								"type" => "url",
							)
						));
						
						// for twitter icons on off option
						$wp_customize->add_setting("social_twitter_sec_on_off", array(
							"default" => 'off',
							"transport" => "refresh",
							'sanitize_callback' => 'business_booster_radio_sanitize_row',
						));
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"social_twitter_sec_on_off",
							array(
							'type' => 'radio',
							'label' => __("Twitter Icon On/Off", "business-booster"),
							'section' => 'business_booster_header_follow_us',
							'choices' => array(
								'on' =>__("On", "business-booster"),
								'off' => __("Off", "business-booster")
							),
						)
						));
					
						// for twitter link
						$wp_customize->add_setting("social_twitter_btn_lnk", array(
							"default" => '',
							"transport" => "refresh",
							'sanitize_callback' => 'esc_url_raw',
						));
						$wp_customize->add_control(new WP_Customize_Control(
						$wp_customize,
						"social_twitter_btn_lnk",
						array(
								"label" => __("Twitter Button Link", "business-booster"),
								"section" => "business_booster_header_follow_us",
								"settings" => "social_twitter_btn_lnk",
								"type" => "url",
								)
						));
						
						// for linkedin icons on off option
						$wp_customize->add_setting("social_linkedin_sec_on_off", array(
							"default" => 'off',
							"transport" => "refresh",
							'sanitize_callback' => 'business_booster_radio_sanitize_row',
						));
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"social_linkedin_sec_on_off",
							array(
							'type' => 'radio',
							'label' => __("Linkedin Icon On/Off", "business-booster"),
							'section' => 'business_booster_header_follow_us',
							'choices' => array(
								'on' =>__("On", "business-booster"),
								'off' => __("Off", "business-booster")
							),
						)
						));
						
						// for linkedin link
						$wp_customize->add_setting("social_linkedin_btn_lnk", array(
							"default" => '',
							"transport" => "refresh",
							'sanitize_callback' => 'esc_url_raw',
						));
						$wp_customize->add_control(new WP_Customize_Control(
						$wp_customize,
						"social_linkedin_btn_lnk",
						array(
								"label" => __("Linkedin Button Link", "business-booster"),
								"section" => "business_booster_header_follow_us",
								"settings" => "social_linkedin_btn_lnk",
								"type" => "url",
								)
						));
						
						// for google icons on off option
						$wp_customize->add_setting("social_google_sec_on_off", array(
							"default" => 'off',
							"transport" => "refresh",
							'sanitize_callback' => 'business_booster_radio_sanitize_row',
						));
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"social_google_sec_on_off",
							array(
							'type' => 'radio',
							'label' => __("Google Plus Icon On/Off", "business-booster"),
							'section' => 'business_booster_header_follow_us',
							'choices' => array(
								'on' =>__("On", "business-booster"),
								'off' => __("Off", "business-booster")
							),
						)
						));
						
						// for google link
						$wp_customize->add_setting("social_google_btn_lnk", array(
							"default" => '',
							"transport" => "refresh",
							'sanitize_callback' => 'esc_url_raw',
						));
						$wp_customize->add_control(new WP_Customize_Control(
						$wp_customize,
						"social_google_btn_lnk",
						array(
								"label" => __("Google Plus Button Link", "business-booster"),
								"section" => "business_booster_header_follow_us",
								"settings" => "social_google_btn_lnk",
								"type" => "url",
								)
						));
						
						// for rss icons on off option
						$wp_customize->add_setting("social_rss_sec_on_off", array(
							"default" => 'off',
							"transport" => "refresh",
							'sanitize_callback' => 'business_booster_radio_sanitize_row',
						));
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"social_rss_sec_on_off",
							array(
							'type' => 'radio',
							'label' => __("RSS Icon On/Off", "business-booster"),
							'section' => 'business_booster_header_follow_us',
							'choices' => array(
								'on' =>__("On", "business-booster"),
								'off' => __("Off", "business-booster")
							),
						)
						));
						
						// for rss feed link
						$wp_customize->add_setting("social_rssfeed_btn_lnk", array(
							"default" => '',
							"transport" => "refresh",
							'sanitize_callback' => 'esc_url_raw',
						));
						$wp_customize->add_control(new WP_Customize_Control(
						$wp_customize,
						"social_rssfeed_btn_lnk",
						array(
								"label" => __("RSS Feed Button Link", "business-booster"),
								"section" => "business_booster_header_follow_us",
								"settings" => "social_rssfeed_btn_lnk",
								"type" => "url",
								)
						));
			
		
		// Banner section
		$wp_customize->add_section("business_booster_banner_section", array(
			"title" => __("Banner Section", "business-booster"),
			"priority" => 34,
		));
		
				// Banner section on off option
				$wp_customize->add_setting("business_booster_banner_on_off", array(
					"default" => 'off',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_radio_sanitize_row',
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_banner_on_off",
					array(
					'type' => 'radio',
					'label' => __("Banner Section On/Off", "business-booster"),
					'section' => 'business_booster_banner_section',
					'choices' => array(
						'on' =>__("On", "business-booster"),
						'off' => __("Off", "business-booster")
					),
				)
				));
				
				// for banner image
				$wp_customize->add_setting("business_booster_banner_img", array(
					"default" => "",
					"transport" => "refresh",
					'sanitize_callback' => 'esc_url_raw'
				));
				$wp_customize->add_control(new WP_Customize_Image_Control(
					$wp_customize,
					"business_booster_banner_img",
					array(
						"label" => __("Banner Image", "business-booster"),
						"section" => "business_booster_banner_section",
						"settings" => "business_booster_banner_img",
						
					)
				));
				
				// for banner small heading
				$wp_customize->add_setting("business_booster_banner_small_head", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_banner_small_head",
					array(
						"label" => __("Small Heading", "business-booster"),
						"section" => "business_booster_banner_section",
						"settings" => "business_booster_banner_small_head",
						
					)
				));
				
				// for banner main heading
				$wp_customize->add_setting("business_booster_banner_main_head", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_banner_main_head",
					array(
						"label" => __("Main Heading", "business-booster"),
						"section" => "business_booster_banner_section",
						"settings" => "business_booster_banner_main_head",
						
					)
				));
				
				// for banner description
				$wp_customize->add_setting("business_booster_banner_desc", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_banner_desc",
					array(
						"label" => __("Description", "business-booster"),
						"section" => "business_booster_banner_section",
						"settings" => "business_booster_banner_desc",
						
					)
				));
				
				// for banner button text
				$wp_customize->add_setting("business_booster_banner_btn_text", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_banner_btn_text",
					array(
						"label" => __("Button Text", "business-booster"),
						"section" => "business_booster_banner_section",
						"settings" => "business_booster_banner_btn_text",
						
					)
				));
				
				// for banner button link
				$wp_customize->add_setting("business_booster_banner_btn_link", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'esc_url_raw',
				));
				$wp_customize->add_control(new WP_Customize_Control(
				$wp_customize,
				"business_booster_banner_btn_link",
				array(
						"label" => __("Button Link", "business-booster"),
						"section" => "business_booster_banner_section",
						"settings" => "business_booster_banner_btn_link",
						"type" => "url",
						)
				));
				
		
		// services section panel
		$wp_customize->add_panel( 'business_booster_services_panel', array(
			  'title' => __( "Services Section" , "business-booster"),
			  'priority' => 35, // Mixed with top-level-section hierarchy.
		) );		
				
					// services section on off
					$wp_customize->add_section("business_booster_services_section_on_off", array(
						"title" => __("Services Section On/Off", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));		
				
							// services section on off option
							$wp_customize->add_setting("business_booster_services_on_off", array(
								"default" => 'off',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_radio_sanitize_row',
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_services_on_off",
								array(
								'type' => 'radio',
								'label' => __("Services Section On/Off", "business-booster"),
								'section' => 'business_booster_services_section_on_off',
								'choices' => array(
									'on' =>__("On", "business-booster"),
									'off' => __("Off", "business-booster")
								),
							)
							));
							
					// services section heading
					$wp_customize->add_section("business_booster_services_section_heading", array(
						"title" => __("Services Section Heading", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));			
							
							// for services small heading
							$wp_customize->add_setting("business_booster_services_small_head", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_services_small_head",
								array(
									"label" => __("Small Heading", "business-booster"),
									"section" => "business_booster_services_section_heading",
									"settings" => "business_booster_services_small_head",
									
								)
							));
							
							// for services main heading
							$wp_customize->add_setting("business_booster_services_main_head", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_services_main_head",
								array(
									"label" => __("Main Heading", "business-booster"),
									"section" => "business_booster_services_section_heading",
									"settings" => "business_booster_services_main_head",
									
								)
							));
							
							// for services description text
							$wp_customize->add_setting("business_booster_services_desc_txt", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_services_desc_txt",
								array(
									"label" => __("Description Text", "business-booster"),
									"section" => "business_booster_services_section_heading",
									"settings" => "business_booster_services_desc_txt",
									
								)
							));
							
					// services section 1
					$wp_customize->add_section("business_booster_service_one_section", array(
						"title" => __("Service 1 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));	
					
							// for srevice 1 content 
							// for service 1 page selection
							$wp_customize->add_setting("business_booster_service1_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service1_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Service 1 Page", "business-booster"),
									"section" => "business_booster_service_one_section",
									"settings" => "business_booster_service1_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for service 1 page link on/off
							$wp_customize->add_setting("business_booster_service1_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service1_pages_enable",
								array(
									'label'      => __( 'Enable Service 1 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_service_one_section',
									'settings'   => 'business_booster_service1_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
														
					// services section 2
					$wp_customize->add_section("business_booster_service_two_section", array(
						"title" => __("Service 2 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));			
							
							// for srevice 2 content 
							// for service 2 page selection
							$wp_customize->add_setting("business_booster_service2_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service2_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Service 2 Page", "business-booster"),
									"section" => "business_booster_service_two_section",
									"settings" => "business_booster_service2_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for service 2 page link on/off
							$wp_customize->add_setting("business_booster_service2_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service2_pages_enable",
								array(
									'label'      => __( 'Enable Service 2 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_service_two_section',
									'settings'   => 'business_booster_service2_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
							
							
					// services section 3
					$wp_customize->add_section("business_booster_service_three_section", array(
						"title" => __("Service 3 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));			
							
							// for srevice 3 content 
							// for service 3 page selection
							$wp_customize->add_setting("business_booster_service3_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service3_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Service 3 Page", "business-booster"),
									"section" => "business_booster_service_three_section",
									"settings" => "business_booster_service3_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for service 3 page link on/off
							$wp_customize->add_setting("business_booster_service3_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service3_pages_enable",
								array(
									'label'      => __( 'Enable Service 3 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_service_three_section',
									'settings'   => 'business_booster_service3_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
							
							
					// services section 4
					$wp_customize->add_section("business_booster_service_four_section", array(
						"title" => __("Service 4 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));			
							
							// for srevice 4 content 
							// for service 4 page selection
							$wp_customize->add_setting("business_booster_service4_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service4_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Service 4 Page", "business-booster"),
									"section" => "business_booster_service_four_section",
									"settings" => "business_booster_service4_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for service 4 page link on/off
							$wp_customize->add_setting("business_booster_service4_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service4_pages_enable",
								array(
									'label'      => __( 'Enable Service 4 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_service_four_section',
									'settings'   => 'business_booster_service4_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
							
							
					// services section 5
					$wp_customize->add_section("business_booster_service_five_section", array(
						"title" => __("Service 5 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));			
							
							// for srevice 5 content 
							// for service 5 page selection
							$wp_customize->add_setting("business_booster_service5_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service5_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Service 5 Page", "business-booster"),
									"section" => "business_booster_service_five_section",
									"settings" => "business_booster_service5_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for service 5 page link on/off
							$wp_customize->add_setting("business_booster_service5_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service5_pages_enable",
								array(
									'label'      => __( 'Enable Service 5 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_service_five_section',
									'settings'   => 'business_booster_service5_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
							
							
					// services section 6
					$wp_customize->add_section("business_booster_service_six_section", array(
						"title" => __("Service 6 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));		
							
							// for srevice 6 content 
							// for service 6 page selection
							$wp_customize->add_setting("business_booster_service6_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service6_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Service 6 Page", "business-booster"),
									"section" => "business_booster_service_six_section",
									"settings" => "business_booster_service6_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for service 6 page link on/off
							$wp_customize->add_setting("business_booster_service6_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_service6_pages_enable",
								array(
									'label'      => __( 'Enable Service 6 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_service_six_section',
									'settings'   => 'business_booster_service6_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
							
							
					// services section button
					$wp_customize->add_section("business_booster_service_section_button", array(
						"title" => __("Service Section Button", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_services_panel',
					));		
							
							// for service button text
							$wp_customize->add_setting("business_booster_services_btn_text", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_services_btn_text",
								array(
									"label" => __("Services Button Text", "business-booster"),
									"section" => "business_booster_service_section_button",
									"settings" => "business_booster_services_btn_text",
									
								)
							));
							
							// for service button link
							$wp_customize->add_setting("business_booster_services_btn_link", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'esc_url_raw',
							));
							$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize,
							"business_booster_services_btn_link",
							array(
									"label" => __("Services Button Link", "business-booster"),
									"section" => "business_booster_service_section_button",
									"settings" => "business_booster_services_btn_link",
									"type" => "url",
									)
							));
			
			
					
			// counters section panel
			$wp_customize->add_panel( 'business_booster_counters_panel', array(
				  'title' => __( "Counters Section", "business-booster"),
				  'priority' => 35, // Mixed with top-level-section hierarchy.
			) );		
					
					// counters section main
					$wp_customize->add_section("business_booster_counters_section_main", array(
						"title" => __("Counters Section Main", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_counters_panel',
					));
					
							// for counter section on/off
							$wp_customize->add_setting("business_counters_sec_on_off", array(
								"default" => 'off',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_radio_sanitize_row',
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_counters_sec_on_off",
								array(
								'type' => 'radio',
								'label' => __("Counters Section On/Off", "business-booster"),
								'section' => 'business_booster_counters_section_main',
								'choices' => array(
									'on' =>__("On", "business-booster"),
									'off' => __("Off", "business-booster")
								),
							)
							));
							
							// for counters section background image
							$wp_customize->add_setting("business_counters_bg_image", array(
								"default" => "",
								"transport" => "refresh",
								'sanitize_callback' => 'esc_url_raw'
							));
							$wp_customize->add_control(new WP_Customize_Image_Control(
								$wp_customize,
								"business_counters_bg_image",
								array(
									"label" => __("Counters Section Background Image", "business-booster"),
									"section" => "business_booster_counters_section_main",
									"settings" => "business_counters_bg_image",
									
								)
							));	
							
							
					// counters section left
					$wp_customize->add_section("business_booster_counters_section_left", array(
						"title" => __("Counters Section Left", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_counters_panel',
					));		
							
							// for counters small head text
							$wp_customize->add_setting("business_booster_counter_small_head", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_counter_small_head",
								array(
									"label" => __("Small Heading Text", "business-booster"),
									"section" => "business_booster_counters_section_left",
									"settings" => "business_booster_counter_small_head",
									
								)
							));
							
							// for counters main head text
							$wp_customize->add_setting("business_booster_counter_main_head", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_counter_main_head",
								array(
									"label" => __("Main Heading Text", "business-booster"),
									"section" => "business_booster_counters_section_left",
									"settings" => "business_booster_counter_main_head",
									
								)
							));
							
							// for counters description text
							$wp_customize->add_setting("business_booster_counter_desc_txt", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_counter_desc_txt",
								array(
									"label" => __("Description Text", "business-booster"),
									"section" => "business_booster_counters_section_left",
									"settings" => "business_booster_counter_desc_txt",
									
								)
							));
							
							// for counters button text
							$wp_customize->add_setting("business_booster_counter_btn_txt", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_counter_btn_txt",
								array(
									"label" => __("Button Text", "business-booster"),
									"section" => "business_booster_counters_section_left",
									"settings" => "business_booster_counter_btn_txt",
									
								)
							));
							
							// for counters button link
								$wp_customize->add_setting("business_booster_counter_btn_link", array(
									"default" => '',
									"transport" => "refresh",
									'sanitize_callback' => 'esc_url_raw',
								));
								$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_counter_btn_link",
								array(
										"label" => __("Button Link", "business-booster"),
										"section" => "business_booster_counters_section_left",
										"settings" => "business_booster_counter_btn_link",
										"type" => "url",
										)
								));
								
							
						// counters section right
						$wp_customize->add_section("business_booster_counters_section_right", array(
							"title" => __("Counters Section Right", "business-booster"),
							"priority" => 35,
							'panel' => 'business_booster_counters_panel',
						));
							
								// for counter1 number and text
								// for counter1 number
								$wp_customize->add_setting("business_booster_counter1_number", array(
									"default" => '',
									"transport" => "refresh",
									'sanitize_callback' => 'business_booster_text_sanitize_row'
								));
								$wp_customize->add_control(new WP_Customize_Control(
									$wp_customize,
									"business_booster_counter1_number",
									array(
										"label" => __("Counter 1 Number", "business-booster"),
										"section" => "business_booster_counters_section_right",
										"settings" => "business_booster_counter1_number",
										
									)
								));
								
								// for counter1 text
								$wp_customize->add_setting("business_booster_counter1_number_text", array(
									"default" => '',
									"transport" => "refresh",
									'sanitize_callback' => 'business_booster_text_sanitize_row'
								));
								$wp_customize->add_control(new WP_Customize_Control(
									$wp_customize,
									"business_booster_counter1_number_text",
									array(
										"label" => __("Counter 1 Text", "business-booster"),
										"section" => "business_booster_counters_section_right",
										"settings" => "business_booster_counter1_number_text",
										
									)
								));
								
								// for counter2 number and text
								// for counter2 number
								$wp_customize->add_setting("business_booster_counter2_number", array(
									"default" => '',
									"transport" => "refresh",
									'sanitize_callback' => 'business_booster_text_sanitize_row'
								));
								$wp_customize->add_control(new WP_Customize_Control(
									$wp_customize,
									"business_booster_counter2_number",
									array(
										"label" => __("Counter 2 Number", "business-booster"),
										"section" => "business_booster_counters_section_right",
										"settings" => "business_booster_counter2_number",
										
									)
								));
								
								// for counter2 text
								$wp_customize->add_setting("business_booster_counter2_number_text", array(
									"default" => '',
									"transport" => "refresh",
									'sanitize_callback' => 'business_booster_text_sanitize_row'
								));
								$wp_customize->add_control(new WP_Customize_Control(
									$wp_customize,
									"business_booster_counter2_number_text",
									array(
										"label" => __("Counter 2 Text", "business-booster"),
										"section" => "business_booster_counters_section_right",
										"settings" => "business_booster_counter2_number_text",
										
									)
								));
								
								// for counter3 number and text
								// for counter3 number
								$wp_customize->add_setting("business_booster_counter3_number", array(
									"default" => '',
									"transport" => "refresh",
									'sanitize_callback' => 'business_booster_text_sanitize_row'
								));
								$wp_customize->add_control(new WP_Customize_Control(
									$wp_customize,
									"business_booster_counter3_number",
									array(
										"label" => __("Counter 3 Number", "business-booster"),
										"section" => "business_booster_counters_section_right",
										"settings" => "business_booster_counter3_number",
										
									)
								));
								
								// for counter3 text
								$wp_customize->add_setting("business_booster_counter3_number_text", array(
									"default" => '',
									"transport" => "refresh",
									'sanitize_callback' => 'business_booster_text_sanitize_row'
								));
								$wp_customize->add_control(new WP_Customize_Control(
									$wp_customize,
									"business_booster_counter3_number_text",
									array(
										"label" => __("Counter 3 Text", "business-booster"),
										"section" => "business_booster_counters_section_right",
										"settings" => "business_booster_counter3_number_text",
										
									)
								));
					
					
			// team members section panel
			$wp_customize->add_panel( 'business_booster_team_members_panel', array(
				  'title' => __( "Team Members Section", "business-booster" ),
				  'priority' => 35, // Mixed with top-level-section hierarchy.
			) );		
					
					// team member section on/off
					$wp_customize->add_section("business_booster_team_section_on_off_sec", array(
						"title" => __("Team Member Section On/Off", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_team_members_panel',
					));		

							// for team member section on/off
							$wp_customize->add_setting("business_booster_team_section_on_off", array(
								"default" => 'off',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_radio_sanitize_row',
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_section_on_off",
								array(
								'type' => 'radio',
								'label' => __("Team Members Section On/Off", "business-booster"),
								'section' => 'business_booster_team_section_on_off_sec',
								'choices' => array(
									'on' =>__("On", "business-booster"),
									'off' => __("Off", "business-booster")
								),
							)
							));
							
							
					// team member section heading
					$wp_customize->add_section("business_booster_team_section_heading", array(
						"title" => __("Team Member Section Heading", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_team_members_panel',
					));		
							
							// for team small heading
							$wp_customize->add_setting("business_booster_team_small_head", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_small_head",
								array(
									"label" => __("Team Member Small Heading", "business-booster"),
									"section" => "business_booster_team_section_heading",
									"settings" => "business_booster_team_small_head",
									
								)
							));
							
							// for team main heading
							$wp_customize->add_setting("business_booster_team_main_head", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_main_head",
								array(
									"label" => __("Team Member Main Heading", "business-booster"),
									"section" => "business_booster_team_section_heading",
									"settings" => "business_booster_team_main_head",
									
								)
							));
							
							// for team description text
							$wp_customize->add_setting("business_booster_team_desc_txt", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_text_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_desc_txt",
								array(
									"label" => __("Team Member Description Text", "business-booster"),
									"section" => "business_booster_team_section_heading",
									"settings" => "business_booster_team_desc_txt",
									
								)
							));
							
							
					// team member 1 section
					$wp_customize->add_section("business_booster_team_one_section", array(
						"title" => __("Team Member 1 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_team_members_panel',
					));		
							
							// for team member 1 image and position
							// for team member 1 page
							$wp_customize->add_setting("business_booster_team_member1_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_member1_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Team Member 1 Page", "business-booster"),
									"section" => "business_booster_team_one_section",
									"settings" => "business_booster_team_member1_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for team member 1 page link on/off
							$wp_customize->add_setting("business_booster_team_member1_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_member1_pages_enable",
								array(
									'label'      => __( 'Enable Team Member 1 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_team_one_section',
									'settings'   => 'business_booster_team_member1_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
							
													
						
				// team member 2 section
					$wp_customize->add_section("business_booster_team_two_section", array(
						"title" => __("Team Member 2 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_team_members_panel',
					));		

						// for team member 2 image and position
							// for team member 2 page
							$wp_customize->add_setting("business_booster_team_member2_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_member2_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Team Member 2 Page", "business-booster"),
									"section" => "business_booster_team_two_section",
									"settings" => "business_booster_team_member2_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for team member 2 page link on/off
							$wp_customize->add_setting("business_booster_team_member2_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_member2_pages_enable",
								array(
									'label'      => __( 'Enable Team Member 2 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_team_two_section',
									'settings'   => 'business_booster_team_member2_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
							
							
					// team member 3 section
					$wp_customize->add_section("business_booster_team_three_section", array(
						"title" => __("Team Member 3 Section", "business-booster"),
						"priority" => 35,
						'panel' => 'business_booster_team_members_panel',
					));		
							
							// for team member 3 image and position
							// for team member 3 page
							$wp_customize->add_setting("business_booster_team_member3_pages", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_page_id_sanitize_row'
							));
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_member3_pages",
								array(
									'type'          => 'select',
									"label" => __("Select Team Member 3 Page", "business-booster"),
									"section" => "business_booster_team_three_section",
									"settings" => "business_booster_team_member3_pages",
									'choices'       => $option_pages,
									'default'=>'0'
								)
							));
							
							// for team member 3 page link on/off
							$wp_customize->add_setting("business_booster_team_member3_pages_enable", array(
								"default" => '',
								"transport" => "refresh",
								'sanitize_callback' => 'business_booster_sanitize_checkbox'
							));
							
							$wp_customize->add_control(new WP_Customize_Control(
								$wp_customize,
								"business_booster_team_member3_pages_enable",
								array(
									'label'      => __( 'Enable Team Member 3 Page Link ', 'business-booster' ),
									'section'    => 'business_booster_team_three_section',
									'settings'   => 'business_booster_team_member3_pages_enable',
									'type'       => 'checkbox',
									'std'        => '1'
								)
							));
				
		// news section
		$wp_customize->add_section("business_booster_news_section", array(
			"title" => __("News Section", "business-booster"),
			"priority" => 35,
		));

				// for team member section on/off
				$wp_customize->add_setting("business_booster_news_section_on_off", array(
					"default" => 'off',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_radio_sanitize_row',
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_news_section_on_off",
					array(
					'type' => 'radio',
					'label' => __("News Section On/Off", "business-booster"),
					'section' => 'business_booster_news_section',
					'choices' => array(
						'on' =>__("On", "business-booster"),
						'off' => __("Off", "business-booster")
					),
				)
				));
				
				// for news section background image
				$wp_customize->add_setting("business_booster_news_bg_image", array(
					"default" => "",
					"transport" => "refresh",
					'sanitize_callback' => 'esc_url_raw'
				));
				$wp_customize->add_control(new WP_Customize_Image_Control(
					$wp_customize,
					"business_booster_news_bg_image",
					array(
						"label" => __("News Section Background Image", "business-booster"),
						"section" => "business_booster_news_section",
						"settings" => "business_booster_news_bg_image",
						
					)
				));		
				
				// for news small heading text
				$wp_customize->add_setting("business_booster_news_small_head", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_news_small_head",
					array(
						"label" => __("Small Heading", "business-booster"),
						"section" => "business_booster_news_section",
						"settings" => "business_booster_news_small_head",
						
					)
				));	
				
				// for news main heading text
				$wp_customize->add_setting("business_booster_news_main_head", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_news_main_head",
					array(
						"label" => __("Main Heading", "business-booster"),
						"section" => "business_booster_news_section",
						"settings" => "business_booster_news_main_head",
						
					)
				));	
				
				// for news main heading text
				$wp_customize->add_setting("business_booster_news_desc_txt", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_news_desc_txt",
					array(
						"label" => __("Description Text", "business-booster"),
						"section" => "business_booster_news_section",
						"settings" => "business_booster_news_desc_txt",
						
					)
				));	
				
		// stay tuned section
		$wp_customize->add_section("business_booster_stay_tuned_section", array(
			"title" => __("Stay Tuned Section", "business-booster"),
			"priority" => 35,
		));		
		
				// for stay tuned section on/off
				$wp_customize->add_setting("business_booster_stay_tuned_section_on_off", array(
					"default" => 'off',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_radio_sanitize_row',
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_stay_tuned_section_on_off",
					array(
					'type' => 'radio',
					'label' => __("Stay Tuned Section On/Off", "business-booster"),
					'section' => 'business_booster_stay_tuned_section',
					'choices' => array(
						'on' =>__("On", "business-booster"),
						'off' => __("Off", "business-booster")
					),
				)
				));
				
				// stay tuned main heading text
				$wp_customize->add_setting("business_booster_stay_tuned_head", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_stay_tuned_head",
					array(
						"label" => __("Heading Text", "business-booster"),
						"section" => "business_booster_stay_tuned_section",
						"settings" => "business_booster_stay_tuned_head",
						
					)
				));	
				
				// stay tuned  button text
				$wp_customize->add_setting("business_booster_stay_tuned_button_txt", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_stay_tuned_button_txt",
					array(
						"label" => __("Button Text", "business-booster"),
						"section" => "business_booster_stay_tuned_section",
						"settings" => "business_booster_stay_tuned_button_txt",
						
					)
				));	
				
				// stay tuned  button link
				$wp_customize->add_setting("business_booster_stay_tuned_button_link", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'esc_url_raw',
				));
				$wp_customize->add_control(new WP_Customize_Control(
				$wp_customize,
				"business_booster_stay_tuned_button_link",
				array(
						"label" => __("Button Link", "business-booster"),
						"section" => "business_booster_stay_tuned_section",
						"settings" => "business_booster_stay_tuned_button_link",
						"type" => "url",
						)
				));
				
		
		//Footer text 
		$wp_customize->add_section("footer_sec", array(
			"title" => __("Footer Text", "business-booster"),
			"priority" => 35,
		));
				
				// for copyright text
				$wp_customize->add_setting("business_booster_copyright_text", array(
					"default" => '',
					"transport" => "refresh",
					'sanitize_callback' => 'business_booster_text_sanitize_row'
				));
				$wp_customize->add_control(new WP_Customize_Control(
					$wp_customize,
					"business_booster_copyright_text",
					array(
						"label" => __("Footer Text", "business-booster"),
						"section" => "footer_sec",
						"settings" => "business_booster_copyright_text",
						
					)
				));
				
		
}
add_action( 'customize_register', 'business_booster_customize_register' );

// sanitize_callback function
function business_booster_text_sanitize_row( $input ) {
	return sanitize_text_field(  $input );
}


function business_booster_page_id_sanitize_row( $input ) {
	return absint(  $input );
}

function business_booster_radio_sanitize_row($input) {
  $valid_keys = array(
		'on' =>__("On", "business-booster"),
		'off' => __("Off", "business-booster")
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
	 return $input;
  } else {
	 return '';
  }
}

function business_booster_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
		return 1;
    } else {
		return 0;
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_booster_customize_preview_js() {
	wp_enqueue_script( 'business_booster_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_booster_customize_preview_js' );