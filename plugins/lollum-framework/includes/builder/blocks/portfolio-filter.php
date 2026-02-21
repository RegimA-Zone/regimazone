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
* portfolio filter block
******************************/

function lolfmk_print_portfolio_filter_admin($item = null) {
	global $lolfmk_margin_full;
	$portfolio_type = (lolfmk_find_xml_value($item, 'portfolio-type')) ? lolfmk_find_xml_value($item, 'portfolio-type') : '';
	$project_number = (lolfmk_find_xml_value($item, 'project-number')) ? lolfmk_find_xml_value($item, 'project-number') : '';
	$project_category = (lolfmk_find_xml_value($item, 'project-category')) ? lolfmk_find_xml_value($item, 'project-category') : '';
	$project_filter = (lolfmk_find_xml_value($item, 'project-filter')) ? lolfmk_find_xml_value($item, 'project-filter') : '';
	$margin = (lolfmk_find_xml_value($item, 'margin-bottom')) ? lolfmk_find_xml_value($item, 'margin-bottom') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-portfolio-filter item-1-1" data-type="item-portfolio-filter" data-item="Portfolio-Filter">';

	lolfmk_item_btns(__('Portfolio-Filter', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Portfolio-Filter', 'lollum'));

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

	$ob_project_type = array(
		'name' => __('Portfolio Type', 'lollum'),
		'data' => 'portfolio-type',
		'value' => $portfolio_type,
		'options' => array('recent', 'loved', 'category', 'random'),
		'desc' => __('Display your projects sorted by date, by "loves", by category or in random order', 'lollum')
	);

	lolfmk_pb_simple_select($ob_project_type);

	/*** end command ***/

	/*** begin command ***/

	$lol_categories = get_terms('portfolio-categories');
	$lol_wp_cats = array();  
	foreach ($lol_categories as $category_list) {  
		$lol_wp_cats[$category_list->term_id] = $category_list->name;  
	}

	$ob_project_cats = array(
		'name' => __('Project Category', 'lollum'),
		'data' => 'project-category',
		'value' => $project_category,
		'options' => $lol_wp_cats,
		'desc' => __('Select your category (works only if you select "category" in "Portfolio Type")', 'lollum')
	);

	lolfmk_pb_select($ob_project_cats);

	/*** end command ***/

	/*** begin command ***/

	$ob_project_number = array(
		'name' => __('Number of Projects', 'lollum'),
		'data' => 'project-number',
		'value' => $project_number,
		'options' => array('4', '8', '12', '16'),
		'desc' => __('Select the number of projects', 'lollum')
	);

	lolfmk_pb_simple_select($ob_project_number);

	/*** end command ***/

	/*** begin command ***/

	$ob_project_filter = array(
		'name' => __('Display filter', 'lollum'),
		'data' => 'project-filter',
		'value' => $project_filter,
		'options' => array('yes', 'no'),
		'desc' => __('Select "yes" to display the portfolio filter', 'lollum')
	);

	lolfmk_pb_simple_select($ob_project_filter);

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