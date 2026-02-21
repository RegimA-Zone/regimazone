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
* section open block
******************************/

function lolfmk_print_section_open_admin($item = null) {
	global $lolfmk_margin_full;
	$bg_color = (lolfmk_find_xml_value($item, 'bg-color')) ? lolfmk_find_xml_value($item, 'bg-color') : '#ffffff';
	$bg_src = (lolfmk_find_xml_value($item, 'bg-src')) ? lolfmk_find_xml_value($item, 'bg-src') : '';
	$bg_repeat = (lolfmk_find_xml_value($item, 'bg-repeat')) ? lolfmk_find_xml_value($item, 'bg-repeat') : '';
	$text_color = (lolfmk_find_xml_value($item, 'text-color')) ? lolfmk_find_xml_value($item, 'text-color') : '';
	$parallax_effect = (lolfmk_find_xml_value($item, 'parallax-effect')) ? lolfmk_find_xml_value($item, 'parallax-effect') : '';
	$padding_top = (lolfmk_find_xml_value($item, 'padding-top')) ? lolfmk_find_xml_value($item, 'padding-top') : '';
	$padding_bottom = (lolfmk_find_xml_value($item, 'padding-bottom')) ? lolfmk_find_xml_value($item, 'padding-bottom') : '';
	$margin = (lolfmk_find_xml_value($item, 'margin-bottom')) ? lolfmk_find_xml_value($item, 'margin-bottom') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-section-open item-1-1" data-type="item-section-open" data-item="Section-Open">';

	lolfmk_item_btns(__('Section-Open', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Section-Open', 'lollum'));

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

	$ob_bg_color = array(
		'name' => __('Background Color', 'lollum'),
		'data' => 'bg-color',
		'value' => $bg_color,
		'desc' => __('Select a background color', 'lollum')
	);

	lolfmk_pb_color($ob_bg_color);

	/*** end command ***/

	/*** begin command ***/

	$ob_bg_src = array(
		'name' => __('Background Image', 'lollum'),
		'data' => 'bg-src',
		'value' => $bg_src,
		'desc' => __('Upload an image', 'lollum')
	);

	lolfmk_pb_upload($ob_bg_src);

	/*** end command ***/

	/*** begin command ***/

	$ob_bg_repeat = array(
		'name' => __('Bckground Repeat', 'lollum'),
		'data' => 'bg-repeat',
		'value' => $bg_repeat,
		'options' => array('no', 'yes'),
		'desc' => __('Repeat the background when you use a pattern', 'lollum')
	);

	lolfmk_pb_simple_select($ob_bg_repeat);

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

	/*** begin command ***/

	$ob_parallax = array(
		'name' => __('Parallax Effect', 'lollum'),
		'data' => 'parallax-effect',
		'value' => $parallax_effect,
		'options' => array('parallax-yes', 'parallax-no'),
		'desc' => __('Select "parallax-yes" for a parallax effect', 'lollum')
	);

	lolfmk_pb_simple_select($ob_parallax);

	/*** end command ***/

	/*** begin command ***/

	$ob_padding_top = array(
		'name' => __('Padding Top', 'lollum'),
		'data' => 'padding-top',
		'value' => $padding_top,
		'options' => array('yes', 'no'),
		'desc' => __('Select "no" to remove the padding-top of this block', 'lollum')
	);

	lolfmk_pb_simple_select($ob_padding_top);

	/*** end command ***/

	/*** begin command ***/

	$ob_padding_bottom = array(
		'name' => __('Padding Bottom', 'lollum'),
		'data' => 'padding-bottom',
		'value' => $padding_bottom,
		'options' => array('yes', 'no'),
		'desc' => __('Select "no" to remove the padding-bottom of this block', 'lollum')
	);

	lolfmk_pb_simple_select($ob_padding_bottom);

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