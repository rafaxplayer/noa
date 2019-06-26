<?php
/*
* Instagram widget
*
* Based on https://wordpress.org/plugins/meks-easy-instagram-widget/ Thanks meks
*
*/
 
/* Prevent Direct access */
if ( !defined( 'DB_NAME' ) ) {
	header( 'HTTP/1.0 403 Forbidden' );
	die;
}

define( 'noa_INSTAGRAM_WIDGET_URL', trailingslashit(get_stylesheet_directory_uri( )).'widgets/instagram-widget/' );
define( 'noa_INSTAGRAM_WIDGET_DIR', trailingslashit(get_stylesheet_directory( )).'/widgets/instagram-widget/');
define( 'noa_INSTAGRAM_WIDGET_VER', '1.0.5' );

/* Initialize Widget */
if ( !function_exists( 'noa_instagram_widget_init' ) ):
    function noa_instagram_widget_init() {
        require_once noa_INSTAGRAM_WIDGET_DIR.'inc/class-instagram-widget.php';
        register_widget( 'noa_Instagram_Widget' );
    }
endif;

add_action( 'widgets_init', 'noa_instagram_widget_init' );

