<?php 
add_action( 'load-themes.php',  'business_booster_activation_admin_notice_main' );

function business_booster_admin_import_notice(){
	$template_slug = get_option('template');
    ?>
    <div class="updated notice notice-success notice-alt is-dismissible">
        <p><?php printf( esc_html__( 'Save time by import our demo data, your website will be set up and ready to customize in minutes. %s', 'business-booster' ), '<a class="button button-secondary" href="'.esc_url( add_query_arg( array( 'page' => "$template_slug-pro&importer=phoen-data-importer&amp;active_class=3" ), admin_url( 'themes.php' ) ) ).'">'.esc_html__( 'Import Demo Data', 'business-booster' ).'</a>'  ); ?></p>
    </div>
    <?php
}

function business_booster_activation_admin_notice_main(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
        add_action( 'admin_notices', 'business_booster_admin_import_notice' );
    }
}