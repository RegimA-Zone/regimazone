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
* masonry images block
******************************/

function lolfmk_print_masonry_images_admin($item = null) {
	global $lolfmk_margin_full;
	$gallery = (lolfmk_find_xml_value($item, 'gallery')) ? lolfmk_find_xml_value($item, 'gallery') : '';
	$masonry_layout = (lolfmk_find_xml_value($item, 'masonry-layout')) ? lolfmk_find_xml_value($item, 'masonry-layout') : '';
	$masonry_columns = (lolfmk_find_xml_value($item, 'masonry-columns')) ? lolfmk_find_xml_value($item, 'masonry-columns') : '';
	$margin = (lolfmk_find_xml_value($item, 'margin-bottom')) ? lolfmk_find_xml_value($item, 'margin-bottom') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-masonry-images item-1-1" data-type="item-masonry-images" data-item="Masonry-Images">';

	lolfmk_item_btns(__('Masonry-Images', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Masonry-Images', 'lollum'));

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

	$ob_gallery = array(
		'name' => __('Gallery Shortcode', 'lollum'),
		'data' => 'gallery',
		'value' => $gallery,
		'desc' => __('Insert the gallery shortcode.', 'lollum')
	);

	lolfmk_pb_upload_gallery($ob_gallery);

	/*** end command ***/

	/*** begin command ***/

	$ob_masonry_layout = array(
		'name' => __('Masonry Layout', 'lollum'),
		'data' => 'masonry-layout',
		'value' => $masonry_layout,
		'options' => array('grid', 'full'),
		'desc' => __('Select the layout of the block', 'lollum')
	);

	lolfmk_pb_simple_select($ob_masonry_layout);

	/*** end command ***/

	/*** begin command ***/

	$ob_masonry_columns = array(
		'name' => __('Columns', 'lollum'),
		'data' => 'masonry-columns',
		'value' => $masonry_columns,
		'options' => array('3', '4', '5'),
		'desc' => __('Select the number of the columns', 'lollum')
	);

	lolfmk_pb_simple_select($ob_masonry_columns);

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