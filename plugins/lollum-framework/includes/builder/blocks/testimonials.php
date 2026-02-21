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
* testimonials block
******************************/

function lolfmk_print_testimonials_admin($item = null) {
	$list_testimonials = (lolfmk_find_xml_node($item, 'child-group')) ? lolfmk_find_xml_node($item, 'child-group') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-testimonials item-1-1" data-type="item-testimonials" data-item="Testimonials">';

	lolfmk_item_btns(__('Testimonials', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Testimonials', 'lollum'));

	$lol_testimonials_ids = array();
	$args = array(
		'post_type' => 'lolfmk-testimonials',
		'numberposts' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	$testimonials_array = get_posts($args);
	foreach ($testimonials_array as $testimonials_single) {
		$lol_testimonials_ids[$testimonials_single->ID] = $testimonials_single->post_title;
	}

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

	echo '<h6 class="option-title">'.__("Testimonials", "lollum").'</h6>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="button" class="add-clone-item" value="'.__("Add testimonial", "lollum").'">';
	echo '<br></div>';
	echo '<div class="explain">'.__("Add more testimonials", "lollum").'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';

	echo '<div class="xml open-group"></div>';
	echo '<div class="list-cloned-items">';

	/****** begin default cloned item ******/
	echo '<div class="default-cloned-item">';

			/*** open single item ***/
			echo '<div class="single-item-cloned">';
			echo '<div class="xml open-tab"></div>';

					/*** testimonial ***/

					$ob_testimonials_title = array(
						'name' => __('Testimonial', 'lollum'),
						'data' => 'testimonial-id',
						'value' => '',
						'options' => $lol_testimonials_ids,
						'desc' => __('Select your testimonial', 'lollum')
					);

					lolfmk_pb_select($ob_testimonials_title);

			echo '<br><input type="button" class="delete-cloned-item" value="'.__("Delete testimonial", "lollum").'">';

			/*** close single item ***/
			echo '<div class="xml close-tab"></div>';
			echo '</div>';

	/****** end default cloned item ******/
	echo '</div>';
	
	if ($list_testimonials != '') {
		$i = 0;
		foreach ($list_testimonials->childNodes as $testimonial) {
			if ($i > 0) {
				$testimonial_title = lolfmk_find_xml_value($testimonial, 'testimonial-id');

				/*** open single item ***/
				echo '<div class="single-item-cloned">';
				echo '<div class="xml open-tab"></div>';

						/* testimonial */

						$ob_testimonial_title_c = array(
							'name' => __('Testimonial', 'lollum'),
							'data' => 'testimonial-id',
							'value' => $testimonial_title,
							'options' => $lol_testimonials_ids,
							'desc' => __('Select your testimonial', 'lollum')
						);

						lolfmk_pb_select($ob_testimonial_title_c);

				echo '<br><input type="button" class="delete-cloned-item" value="'.__("Delete testimonial", "lollum").'">';

				/*** close single item ***/
				echo '<div class="xml close-tab"></div>';
				echo '</div>';

			}
		$i++;
		}
	}

	echo '</div>';
	echo '<div class="xml close-group"></div>';

	/*** end command ***/

	echo '<input class="item-size xml" type="hidden" value="1-1" data-type="size">';

	lolfmk_item_after_inner();
}