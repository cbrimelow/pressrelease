<?php

show_admin_bar(false);

function auto_redirect_external_after_logout(){
  wp_redirect( 'http://tctpressrelease.test/' );
  exit();
}
add_action( 'wp_logout', 'auto_redirect_external_after_logout');

function auto_redirect_external_after_login(){
  wp_redirect( 'http://tctpressrelease.test/' );
  exit();
}
add_action( 'wp_login', 'auto_redirect_external_after_login');

add_shortcode( 'member', 'member_check_shortcode' );

function member_check_shortcode( $atts, $content = null ) {
	 if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		return $content;
	return '';
}
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );