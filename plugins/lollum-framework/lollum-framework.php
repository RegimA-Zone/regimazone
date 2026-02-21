<?php
/*
Plugin Name: Lollum Framework
Plugin URI: http://www.lollum.com
Description: Extra functionality for Lollum themes.
Version: 1.26
Author: Lollum
Author URI: http://www.lollum.com
License: The PHP code and integrated HTML are licensed under the General Public
License (GPL). All other parts, but not limited to the CSS code, images, and design belong to their respective owners.
*/

/******************************
* localize plugin
******************************/

function lolfmk_load_textdomain() {
	load_plugin_textdomain('lollum', false, dirname(plugin_basename( __FILE__ )).'/includes/languages/');
}
add_action('init', 'lolfmk_load_textdomain');


/******************************
* global variables
******************************/

$lolfmk_version = '1.26';
$lolfmk_pre = 'lolfmkbox_';
$lolfmk_theme_name = str_replace(' ', '_', strtolower(wp_get_theme()));
$lolfmk_theme_features = get_option('lolfmk_supported_features');
$lolfmk_support_page_builder = get_option('lolfmk_support_page_builder');
$lolfmk_supported_post_types = get_option('lolfmk_supported_post_types');
$lolfmk_margin_full = get_option('lolfmk_margin_full');
$lolfmk_link_slider = get_option('lolfmk_link_slider');
$lolfmk_template_portfolio = get_option('lolfmk_template_portfolio');
$lolfmk_template_portfolio_full = get_option('lolfmk_template_portfolio_full');
$lolfmk_template_portfolio_masonry = get_option('lolfmk_template_portfolio_masonry');
$lolfmk_top_footer = get_option('lolfmk_top_footer');
$lolfmk_portfolio_video_lightbox = get_option('lolfmk_portfolio_video_lightbox');
$lolfmk_transparent_header = get_option('lolfmk_transparent_header');
$lolfmk_custom_woo_shortcodes = get_option('lolfmk_custom_woo_shortcodes');


/******************************
* includes
******************************/

require_once('includes/scripts.php');
require_once('includes/functions-support.php');
if ( isset( $lolfmk_support_page_builder ) && ( $lolfmk_support_page_builder == 'yes' ) ) {
	require_once('includes/builder/data-builder.php');
}
require_once('includes/post-types/register-post-types.php');
require_once('includes/post-types/register-taxonomy.php');
require_once('includes/functions-metaboxes.php');
require_once('includes/shortcodes/shortcodes.php');
if ( isset( $lolfmk_custom_woo_shortcodes ) && ( $lolfmk_custom_woo_shortcodes == 'yes' ) ) {
	require_once('includes/shortcodes/woocommerce-shortcodes.php');
}
require_once('includes/love/functions-love.php');
require_once('includes/lib/mailchimp/MailChimp.php');
require_once('includes/lib/mailchimp/functions-mailchimp.php');
