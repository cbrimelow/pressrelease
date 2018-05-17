<?php

if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}

function auto_redirect_external_after_logout(){
    if ( false !== strpos( $_SERVER['HTTP_REFERER'], 'wp-admin' ) ){
        wp_redirect( '/admin' );
    } else {
        wp_redirect( '/' );
    }
    exit;
}
add_action( 'wp_logout', 'auto_redirect_external_after_logout');

function auto_redirect_external_after_login(){
    if ( false !== strpos( $_SERVER['HTTP_REFERER'], 'wp-login' ) ){
        wp_redirect( '/admin' );
    } else {
        wp_redirect( '/' );
    }
  	exit();
}
add_action( 'wp_login', 'auto_redirect_external_after_login');

add_shortcode( 'member', 'member_check_shortcode' );

function member_check_shortcode( $atts, $content = null ) {
	 if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		return $content;
	return '';
}
// Disable wpautop filter that adds empty <p> for line breaks
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * Function for redirecting users on login based on user role

function my_login_redirect( $url, $request, $user ){
    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if( $user->has_cap( 'administrator' ) ) {
            $url = admin_url();
        } else {
            $url = home_url('/members-only/');
        }
    }
    return $url;
}
 */