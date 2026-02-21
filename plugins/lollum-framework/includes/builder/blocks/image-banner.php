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
* image-banner block
******************************/

function lolfmk_print_block_image_banner_admin($item = null) {
	$banner_title = (lolfmk_find_xml_value($item, 'banner-title')) ? lolfmk_find_xml_value($item, 'banner-title') : '';
	$src = (lolfmk_find_xml_value($item, 'image-src')) ? lolfmk_find_xml_value($item, 'image-src') : '';
	$banner_link = (lolfmk_find_xml_value($item, 'banner-link')) ? lolfmk_find_xml_value($item, 'banner-link') : '';
	$bg_color = (lolfmk_find_xml_value($item, 'bg-color')) ? lolfmk_find_xml_value($item, 'bg-color') : '#ffffff';
	$text_color = (lolfmk_find_xml_value($item, 'text-color')) ? lolfmk_find_xml_value($item, 'text-color') : '';
	$size = (lolfmk_find_xml_value($item, 'size')) ? lolfmk_find_xml_value($item, 'size') : '1-4';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-block-image-banner item-'.$size.'" data-type="item-block-image-banner" data-item="Block-Image-Banner">';

	lolfmk_item_btns(__('Block-Image-Banner', 'lollum'), 'yes', 'yes');
	lolfmk_item_before_inner(__('Block-Image-Banner', 'lollum'));

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

	$ob_banner_title = array(
		'name' => __('Banner Title', 'lollum'),
		'data' => 'banner-title',
		'value' => $banner_title,
		'desc' => __('The title of the block', 'lollum')
	);

	lolfmk_pb_text($ob_banner_title);

	/*** end command ***/

	/*** begin command ***/

	$ob_image_src = array(
		'name' => __('Banner Image', 'lollum'),
		'data' => 'image-src',
		'value' => $src,
		'desc' => __('Upload an image', 'lollum')
	);

	lolfmk_pb_upload($ob_image_src);

	/*** end command ***/

	/*** begin command ***/

	$ob_bg_color = array(
		'name' => __('Background Color', 'lollum'),
		'data' => 'bg-color',
		'value' => $bg_color,
		'desc' => __('Select a background color', 'lollum')
	);

	lolfmk_pb_color($ob_bg_color);

	/*** end command ***/

	/*** begin command ***/

	$ob_banner_link = array(
		'name' => __('Banner Link', 'lollum'),
		'data' => 'banner-link',
		'value' => $banner_link,
		'desc' => __('The link of the block', 'lollum')
	);

	lolfmk_pb_text($ob_banner_link);

	/*** end command ***/

	/*** begin command ***/

	$ob_text_color = array(
		'name' => __('Text Color', 'lollum'),
		'data' => 'text-color',
		'value' => $text_color,
		'options' => array('dark', 'light'),
		'desc' => __('Select the color of the text', 'lollum')
	);

	lolfmk_pb_simple_select($ob_text_color);

	/*** end command ***/

	echo '<input class="item-size xml" type="hidden" value="'.$size.'" data-type="size">';
	
	lolfmk_item_after_inner();		
}