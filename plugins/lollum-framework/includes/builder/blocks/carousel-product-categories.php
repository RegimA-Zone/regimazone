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
* carousel product-categories block
******************************/

function lolfmk_print_carousel_product_categories_admin($item = null) {
	global $lolfmk_margin_full;
	$carousel_number = (lolfmk_find_xml_value($item, 'carousel-number')) ? lolfmk_find_xml_value($item, 'carousel-number') : '';
	$carousel_order = (lolfmk_find_xml_value($item, 'carousel-order')) ? lolfmk_find_xml_value($item, 'carousel-order') : '';
	$carousel_layout = (lolfmk_find_xml_value($item, 'carousel-layout')) ? lolfmk_find_xml_value($item, 'carousel-layout') : '';
	$margin = (lolfmk_find_xml_value($item, 'margin-bottom')) ? lolfmk_find_xml_value($item, 'margin-bottom') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-carousel-product-categories item-1-1" data-type="item-carousel-product-categories" data-item="Carousel-Product-Categories">';

	lolfmk_item_btns(__('Carousel-Product-Categories', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Carousel-Product-Categories', 'lollum'));

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

	$ob_carousel_number = array(
		'name' => __('Number of Categories', 'lollum'),
		'data' => 'carousel-number',
		'value' => $carousel_number,
		'desc' => __('Select the number of categories (-1 unlimited)', 'lollum')
	);

	lolfmk_pb_text($ob_carousel_number);

	/*** end command ***/

	/*** begin command ***/

	$ob_carousel_order = array(
		'name' => __('Carousel Order', 'lollum'),
		'data' => 'carousel-order',
		'value' => $carousel_order,
		'options' => array('name', 'count'),
		'desc' => __('Select the order of the items', 'lollum')
	);

	lolfmk_pb_simple_select($ob_carousel_order);

	/*** end command ***/

	/*** begin command ***/

	$ob_carousel_layout = array(
		'name' => __('Carousel Layout', 'lollum'),
		'data' => 'carousel-layout',
		'value' => $carousel_layout,
		'options' => array('layout1', 'layout2'),
		'desc' => __('Select the layout of the carousel', 'lollum')
	);

	lolfmk_pb_simple_select($ob_carousel_layout);

	/*** end command ***/

	if ($lolfmk_margin_full != '' && $lolfmk_margin_full == 'yes') {

	/*** begin command ***/

	$ob_margin = array(
		'name' => __('Margin Bottom', 'lollum'),
		'data' => 'margin-bottom',
		'value' => $margin,
		'options' => array('yes', 'no'),
		'desc' => __('Select "no" to remove the margin of this block', 'lollum')
	);

	lolfmk_pb_simple_select($ob_margin);

	/*** end command ***/

	}

	echo '<input class="item-size xml" type="hidden" value="1-1" data-type="size">';

	lolfmk_item_after_inner();
}