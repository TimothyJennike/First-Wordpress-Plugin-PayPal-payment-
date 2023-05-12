<?php
    /*
 * Plugin Name:       My Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       My first attempt at making a Wordpress plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Timothy Jennike
 */

 function donate_shortcode( $atts, $content = null) {
    global $post;extract(shortcode_atts(array(
    'account' => 'your-paypal-email-address',
    'for' => $post->post_title,
    'onHover' => '',
    ), $atts));
    if(empty($content)) $content='Make A Donation';
    return '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation for '.$for.'" title="'.$onHover.'">'.$content.'</a>';
    }
    add_shortcode('donate', 'donate_shortcode');

    // [donate]My Text Here[/donate]

    add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'My-Plugin',
        'My-Plugin Options',
        'manage_options',
        'wporg',
        'wporg_options_page_html',
        'dashicons-admin-plugins',
        20
    );
}


