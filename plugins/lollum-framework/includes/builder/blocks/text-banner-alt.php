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
* text-banner-alt block
******************************/

function lolfmk_print_block_text_banner_alt_admin($item = null) {
	$banner_title = (lolfmk_find_xml_value($item, 'banner-title')) ? lolfmk_find_xml_value($item, 'banner-title') : '';
	$banner_subtitle = (lolfmk_find_xml_value($item, 'banner-subtitle')) ? lolfmk_find_xml_value($item, 'banner-subtitle') : '';
	$btn_text = (lolfmk_find_xml_value($item, 'btn-text')) ? lolfmk_find_xml_value($item, 'btn-text') : '';
	$btn_url = (lolfmk_find_xml_value($item, 'btn-url')) ? lolfmk_find_xml_value($item, 'btn-url') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-block-text-banner-alt item-1-1" data-type="item-block-text-banner-alt" data-item="Block-Text-Banner-Alt">';

	lolfmk_item_btns(__('Block-Text-Banner-Alt', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Block-Text-Banner-Alt', 'lollum'));

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

	$ob_banner_subtitle = array(
		'name' => __('Banner Subtitle', 'lollum'),
		'data' => 'banner-subtitle',
		'value' => $banner_subtitle,
		'desc' => __('The subtitle of the block', 'lollum')
	);

	lolfmk_pb_textarea($ob_banner_subtitle);

	/*** end command ***/

	$ob_btn_text = array(
		'name' => __('Button Text', 'lollum'),
		'data' => 'btn-text',
		'value' => $btn_text,
		'desc' => __('The text of the button', 'lollum')
	);

	lolfmk_pb_text($ob_btn_text);

	/*** end command ***/

	/*** begin command ***/

	$ob_btn_url = array(
		'name' => __('Button URL', 'lollum'),
		'data' => 'btn-url',
		'value' => $btn_url,
		'desc' => __('The URL of the button', 'lollum')
	);

	lolfmk_pb_text($ob_btn_url);

	/*** end command ***/

	echo '<input class="item-size xml" type="hidden" value="1-1" data-type="size">';
	
	lolfmk_item_after_inner();		
}