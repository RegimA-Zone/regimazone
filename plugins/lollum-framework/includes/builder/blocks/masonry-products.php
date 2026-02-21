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
* masonry products block
******************************/

function lolfmk_print_masonry_products_admin($item = null) {
	global $lolfmk_margin_full;
	$products_type = (lolfmk_find_xml_value($item, 'products-type')) ? lolfmk_find_xml_value($item, 'products-type') : '';
	$products_category = (lolfmk_find_xml_value($item, 'products-category')) ? lolfmk_find_xml_value($item, 'products-category') : '';
	$products_number = (lolfmk_find_xml_value($item, 'products-number')) ? lolfmk_find_xml_value($item, 'products-number') : '8';
	$products_layout = (lolfmk_find_xml_value($item, 'products-layout')) ? lolfmk_find_xml_value($item, 'products-layout') : '';
	$products_columns = (lolfmk_find_xml_value($item, 'products-columns')) ? lolfmk_find_xml_value($item, 'products-columns') : '';
	$margin = (lolfmk_find_xml_value($item, 'margin-bottom')) ? lolfmk_find_xml_value($item, 'margin-bottom') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-masonry-products item-1-1" data-type="item-masonry-products" data-item="Masonry-Products">';

	lolfmk_item_btns(__('Masonry-Products', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Masonry-Products', 'lollum'));

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

	$ob_products_type = array(
		'name' => __('Product Type', 'lollum'),
		'data' => 'products-type',
		'value' => $products_type,
		'options' => array('recent', 'featured', 'on-sale', 'category'),
		'desc' => __('Select the type of the products', 'lollum')
	);

	lolfmk_pb_simple_select($ob_products_type);

	/*** end command ***/

	/*** begin command ***/

	$ob_products_category = array(
		'name' => __('Product category', 'lollum'),
		'data' => 'products-category',
		'value' => $products_category,
		'desc' => __('Type the slug of the category (you need to select "category" in "Product Type")', 'lollum')
	);

	lolfmk_pb_text($ob_products_category);

	/*** end command ***/

	/*** begin command ***/

	$ob_products_number = array(
		'name' => __('Number of products', 'lollum'),
		'data' => 'products-number',
		'value' => $products_number,
		'desc' => __('Select the number of products (-1 unlimited)', 'lollum')
	);

	lolfmk_pb_text($ob_products_number);

	/*** end command ***/

	/*** begin command ***/

	$ob_products_layout = array(
		'name' => __('Products Layout', 'lollum'),
		'data' => 'products-layout',
		'value' => $products_layout,
		'options' => array('grid', 'full'),
		'desc' => __('Select the layout of the block', 'lollum')
	);

	lolfmk_pb_simple_select($ob_products_layout);

	/*** end command ***/

	/*** begin command ***/

	$ob_products_columns = array(
		'name' => __('Columns', 'lollum'),
		'data' => 'products-columns',
		'value' => $products_columns,
		'options' => array('3', '4', '5'),
		'desc' => __('Select the number of the columns', 'lollum')
	);

	lolfmk_pb_simple_select($ob_products_columns);

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