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
* section title block
******************************/

function lolfmk_print_section_title_admin($item = null) {
	$title_text = (lolfmk_find_xml_value($item, 'title-text')) ? lolfmk_find_xml_value($item, 'title-text') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';
	$size = (lolfmk_find_xml_value($item, 'size')) ? lolfmk_find_xml_value($item, 'size') : '1-4';

	echo '<div class="page-item item-section-title item-'.$size.'" data-type="item-section-title" data-item="Section-Title">';

	lolfmk_item_btns(__('Section-Title', 'lollum'), 'yes', 'yes');
	lolfmk_item_before_inner(__('Section-Title', 'lollum'));

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

	$ob_title_text = array(
		'name' => __('Title Text', 'lollum'),
		'data' => 'title-text',
		'value' => $title_text,
		'desc' => __('The text of the title', 'lollum')
	);

	lolfmk_pb_text($ob_title_text);

	/*** end command ***/

	echo '<input class="item-size xml" type="hidden" value="'.$size.'" data-type="size">';
	
	lolfmk_item_after_inner();		
}