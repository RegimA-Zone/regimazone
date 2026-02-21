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
* grid 2 block
******************************/

function lolfmk_print_grid2_admin($item = null) {
	global $lolfmk_margin_full;
	$grid_type = (lolfmk_find_xml_value($item, 'grid-type')) ? lolfmk_find_xml_value($item, 'grid-type') : '';
	$grid_style = (lolfmk_find_xml_value($item, 'grid-style')) ? lolfmk_find_xml_value($item, 'grid-style') : '';
	$grid_order = (lolfmk_find_xml_value($item, 'grid-order')) ? lolfmk_find_xml_value($item, 'grid-order') : '';
	$id1 = (lolfmk_find_xml_value($item, 'id1')) ? lolfmk_find_xml_value($item, 'id1') : '';
	$id2 = (lolfmk_find_xml_value($item, 'id2')) ? lolfmk_find_xml_value($item, 'id2') : '';
	$id3 = (lolfmk_find_xml_value($item, 'id3')) ? lolfmk_find_xml_value($item, 'id3') : '';
	$id4 = (lolfmk_find_xml_value($item, 'id4')) ? lolfmk_find_xml_value($item, 'id4') : '';
	$id5 = (lolfmk_find_xml_value($item, 'id5')) ? lolfmk_find_xml_value($item, 'id5') : '';
	$id6 = (lolfmk_find_xml_value($item, 'id6')) ? lolfmk_find_xml_value($item, 'id6') : '';
	$margin = (lolfmk_find_xml_value($item, 'margin-bottom')) ? lolfmk_find_xml_value($item, 'margin-bottom') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-grid-2 item-1-1" data-type="item-grid-2" data-item="Grid-2">';

	lolfmk_item_btns(__('Grid-2', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Grid-2', 'lollum'));

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

	$ob_grid_type = array(
		'name' => __('Grid Type', 'lollum'),
		'data' => 'grid-type',
		'value' => $grid_type,
		'options' => array('projects', 'products', 'product-categories'),
		'desc' => __('Select the type of the items you want to display', 'lollum')
	);

	lolfmk_pb_simple_select($ob_grid_type);

	/*** end command ***/

	/*** begin command ***/

	$ob_grid_style = array(
		'name' => __('Grid Style', 'lollum'),
		'data' => 'grid-style',
		'value' => $grid_style,
		'options' => array('default', 'image'),
		'desc' => __('Select the style of the block.', 'lollum')
	);

	lolfmk_pb_simple_select($ob_grid_style);

	/*** end command ***/

	/*** begin command ***/

	$ob_grid_order = array(
		'name' => __('Grid Order', 'lollum'),
		'data' => 'grid-order',
		'value' => $grid_order,
		'options' => array('recent', 'ids'),
		'desc' => __('Manual selection (IDs) or order by date (recent)', 'lollum')
	);

	lolfmk_pb_simple_select($ob_grid_order);

	/*** begin command ***/

	/*** end command ***/

	$ob_id1 = array(
		'name' => __('Item ID 1', 'lollum'),
		'data' => 'id1',
		'value' => $id1,
		'desc' => __('The ID of the item', 'lollum')
	);

	lolfmk_pb_text($ob_id1);

	/*** end command ***/

	/*** begin command ***/

	$ob_id2 = array(
		'name' => __('Item ID 2', 'lollum'),
		'data' => 'id2',
		'value' => $id2,
		'desc' => __('The ID of the item', 'lollum')
	);

	lolfmk_pb_text($ob_id2);

	/*** end command ***/

	/*** begin command ***/

	$ob_id3 = array(
		'name' => __('Item ID 3', 'lollum'),
		'data' => 'id3',
		'value' => $id3,
		'desc' => __('The ID of the item', 'lollum')
	);

	lolfmk_pb_text($ob_id3);

	/*** end command ***/

	/*** begin command ***/

	$ob_id4 = array(
		'name' => __('Item ID 4', 'lollum'),
		'data' => 'id4',
		'value' => $id4,
		'desc' => __('The ID of the item', 'lollum')
	);

	lolfmk_pb_text($ob_id4);

	/*** end command ***/

	/*** begin command ***/

	$ob_id5 = array(
		'name' => __('Item ID 5', 'lollum'),
		'data' => 'id5',
		'value' => $id5,
		'desc' => __('The ID of the item', 'lollum')
	);

	lolfmk_pb_text($ob_id5);

	/*** end command ***/

	/*** begin command ***/

	$ob_id6 = array(
		'name' => __('Item ID 6', 'lollum'),
		'data' => 'id6',
		'value' => $id6,
		'desc' => __('The ID of the item', 'lollum')
	);

	lolfmk_pb_text($ob_id6);

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