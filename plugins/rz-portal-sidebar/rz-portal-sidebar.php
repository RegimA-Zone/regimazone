<?php
/**
 * Plugin Name: RZ Portal Sidebar
 * Description: Loads the retractable portal sidebar JavaScript for RegimA Zone portal pages.
 * Version: 1.0.0
 * Author: RegimA Zone
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function rz_portal_sidebar_enqueue_scripts() {
    // Only load on portal pages
    if ( is_page( array( 2540, 2541, 2542, 2543 ) ) ) {
        wp_enqueue_script(
            'rz-portal-sidebar',
            plugin_dir_url( __FILE__ ) . 'sidebar.js',
            array(),
            '1.0.0',
            true // load in footer
        );
    }
}
add_action( 'wp_enqueue_scripts', 'rz_portal_sidebar_enqueue_scripts' );
