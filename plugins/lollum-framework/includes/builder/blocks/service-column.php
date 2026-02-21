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
* service column block
******************************/

function lolfmk_print_service_column_admin($item = null) {
	$service_title = (lolfmk_find_xml_value($item, 'service-title')) ? lolfmk_find_xml_value($item, 'service-title') : '';
	$service_text = (lolfmk_find_xml_value($item, 'service-text')) ? lolfmk_find_xml_value($item, 'service-text') : '';
	$service_icon = (lolfmk_find_xml_value($item, 'service-icon')) ? lolfmk_find_xml_value($item, 'service-icon') : '';
	$service_url = (lolfmk_find_xml_value($item, 'service-url')) ? lolfmk_find_xml_value($item, 'service-url') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';
	$size = (lolfmk_find_xml_value($item, 'size')) ? lolfmk_find_xml_value($item, 'size') : '1-4';
				
	echo '<div class="page-item item-service-column item-'.$size.'" data-type="item-service-column" data-item="Service-Column">';

	lolfmk_item_btns(__('Service-Column', 'lollum'), 'yes', 'yes');
	lolfmk_item_before_inner(__('Service-Column', 'lollum'));

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

	$ob_service_title = array(
		'name' => __('Service Column Title', 'lollum'),
		'data' => 'service-title',
		'value' => $service_title,
		'desc' => __('The title of the service column', 'lollum')
	);

	lolfmk_pb_text($ob_service_title);

	/*** end command ***/

	/*** begin command ***/

	$ob_service_text = array(
		'name' => __('Content Service Column', 'lollum'),
		'data' => 'service-text',
		'value' => $service_text,
		'desc' => __('The content of your service column', 'lollum')
	);

	lolfmk_pb_textarea($ob_service_text);

	/*** end command ***/

	/*** begin command ***/

	$ob_service_icon = array(
		'name' => __('Icon Service Column', 'lollum'),
		'data' => 'service-icon',
		'value' => $service_icon,
		'desc' => __('Select the icon of the column service', 'lollum')
	);

	lolfmk_pb_service($ob_service_icon);

	/*** end command ***/

	/*** begin command ***/

	$ob_service_url = array(
		'name' => __('Service Column URL', 'lollum'),
		'data' => 'service-url',
		'value' => $service_url,
		'desc' => __('The URL of the service column', 'lollum')
	);

	lolfmk_pb_text($ob_service_url);

	/*** end command ***/

	echo '<input class="item-size xml" type="hidden" value="'.$size.'" data-type="size">';
	
	lolfmk_item_after_inner();
}