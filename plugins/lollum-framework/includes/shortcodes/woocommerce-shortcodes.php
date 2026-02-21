<?php
/**
 * Lollum
 * 
 * Core functions and definitions
 *
 * @package WordPress
 * @subpackage Lollum Framework
 * @author Lollum <support@lollum.com>
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

/******************************
* modify default woo shortcodes
******************************/

function lollum_custom_woo_shortcodes() {
	remove_shortcode( 'product' );
	remove_shortcode( 'product_category' );
	remove_shortcode( 'product_categories' );
	remove_shortcode( 'products' );
	remove_shortcode( 'recent_products' );
	remove_shortcode( 'sale_products' );
	remove_shortcode( 'best_selling_products' );
	remove_shortcode( 'top_rated_products' );
	remove_shortcode( 'featured_products' );
	remove_shortcode( 'product_attribute' );
	add_shortcode( 'product', 'lollum_custom_product' );
	add_shortcode( 'product_category', 'lollum_custom_product_category' );
	add_shortcode( 'product_categories', 'lollum_custom_product_categories' );
	add_shortcode( 'products', 'lollum_custom_products' );
	add_shortcode( 'recent_products', 'lollum_custom_recent_products' );		
	add_shortcode( 'sale_products', 'lollum_custom_sale_products' );
	add_shortcode( 'best_selling_products', 'lollum_custom_best_selling_products' );
	add_shortcode( 'top_rated_products', 'lollum_custom_top_rated_products' );
	add_shortcode( 'featured_products', 'lollum_custom_featured_products' );
	add_shortcode( 'product_attribute', 'lollum_custom_product_attribute' );
}

add_action( 'init', 'lollum_custom_woo_shortcodes', 20 );