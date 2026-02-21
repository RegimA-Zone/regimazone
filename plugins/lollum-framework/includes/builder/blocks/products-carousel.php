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
* products carousel block
******************************/

function lolfmk_print_products_carousel_admin($item = null) {
	$header_text = (lolfmk_find_xml_value($item, 'header-text')) ? lolfmk_find_xml_value($item, 'header-text') : '';
	$products_type = (lolfmk_find_xml_value($item, 'products-type')) ? lolfmk_find_xml_value($item, 'products-type') : '';
	$products_number = (lolfmk_find_xml_value($item, 'products-number')) ? lolfmk_find_xml_value($item, 'products-number') : '8';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-products-carousel item-1-1" data-type="item-products-carousel" data-item="Products-Carousel">';

	lolfmk_item_btns(__('Products-Carousel', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Products-Carousel', 'lollum'));

	/*** begin command ***/

	$ob_element_id = array(
		'name' => __('Element ID', 'lollum'),
		'data' => 'element-id',
		'value' => $element_id,
		'desc' => __('The ID of the element (optional)', 'lollum')
	);

	lolfmk_pb_text($ob_element_id);

	/*** end command ***/

	/*** begin command ***/

	$ob_header_text = array(
		'name' => __('Header Text', 'lollum'),
		'data' => 'header-text',
		'value' => $header_text,
		'desc' => __('The text of the header (optional)', 'lollum')
	);

	lolfmk_pb_text($ob_header_text);

	/*** end command ***/

	/*** begin command ***/

	$ob_products_type = array(
		'name' => __('Product Type', 'lollum'),
		'data' => 'products-type',
		'value' => $products_type,
		'options' => array('recent', 'featured', 'on-sale'),
		'desc' => __('Select the type of the products', 'lollum')
	);

	lolfmk_pb_simple_select($ob_products_type);

	/*** end command ***/

	/*** begin command ***/

	$ob_products_number = array(
		'name' => __('Number of Products', 'lollum'),
		'data' => 'products-number',
		'value' => $products_number,
		'desc' => __('Select the number of products', 'lollum')
	);

	lolfmk_pb_text($ob_products_number);

	/*** end command ***/

	echo '<input class="item-size xml" type="hidden" value="1-1" data-type="size">';

	lolfmk_item_after_inner();
}