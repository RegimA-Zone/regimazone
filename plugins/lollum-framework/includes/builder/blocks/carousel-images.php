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
* carousel images block
******************************/

function lolfmk_print_carousel_images_admin($item = null) {
	global $lolfmk_margin_full;
	$images_columns = (lolfmk_find_xml_value($item, 'images-columns')) ? lolfmk_find_xml_value($item, 'images-columns') : '';
	$carousel_layout = (lolfmk_find_xml_value($item, 'carousel-layout')) ? lolfmk_find_xml_value($item, 'carousel-layout') : '';
	$carousel_loop = (lolfmk_find_xml_value($item, 'carousel-loop')) ? lolfmk_find_xml_value($item, 'carousel-loop') : '';
	$list_images = (lolfmk_find_xml_node($item, 'child-group')) ? lolfmk_find_xml_node($item, 'child-group') : '';
	$margin = (lolfmk_find_xml_value($item, 'margin-bottom')) ? lolfmk_find_xml_value($item, 'margin-bottom') : '';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';

	echo '<div class="page-item item-carousel-images item-1-1" data-type="item-carousel-images" data-item="Carousel-Images">';

	lolfmk_item_btns(__('Carousel-Images', 'lollum'), 'yes');
	lolfmk_item_before_inner(__('Carousel-Images', 'lollum'));

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

	$ob_images_columns = array(
		'name' => __('Number of columns', 'lollum'),
		'data' => 'images-columns',
		'value' => $images_columns,
		'options' => array('1', '2', '3', '4', '5', '6'),
		'desc' => __('The number of items you want to see on the screen', 'lollum')
	);

	lolfmk_pb_simple_select($ob_images_columns);

	/*** end command ***/

	/*** begin command ***/

	$ob_carousel_layout = array(
		'name' => __('Carousel Layout', 'lollum'),
		'data' => 'carousel-layout',
		'value' => $carousel_layout,
		'options' => array('normal', 'full-width'),
		'desc' => __('Select the layout of the carousel', 'lollum')
	);

	lolfmk_pb_simple_select($ob_carousel_layout);

	/*** end command ***/

	/*** begin command ***/

	$ob_carousel_loop = array(
		'name' => __('Carousel Loop', 'lollum'),
		'data' => 'carousel-loop',
		'value' => $carousel_loop,
		'options' => array('no', 'yes'),
		'desc' => __('Select "yes" to get loop illusion', 'lollum')
	);

	lolfmk_pb_simple_select($ob_carousel_loop);

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

	/*** begin command ***/

	echo '<h6 class="option-title">'.__("Images", "lollum").'</h6>';
	echo '<div class="option">';
	echo '<div class="command">';
	echo '<input type="button" class="add-clone-item" value="'.__("Add image", "lollum").'">';
	echo '<br></div>';
	echo '<div class="explain">'.__("Add more images", "lollum").'</div>';
	echo '<div class="clear"></div>';
	echo '</div>';

	echo '<div class="xml open-group"></div>';
	echo '<div class="list-cloned-items">';

	/****** begin default cloned item ******/
	echo '<div class="default-cloned-item">';

			/*** open single item ***/
			echo '<div class="single-item-cloned">';
			echo '<div class="xml open-tab"></div>';

					/* image */
					
					$ob_image_src = array(
						'name' => __('Image URL', 'lollum'),
						'data' => 'image-src',
						'value' => '',
						'desc' => __('Upload an image', 'lollum')
					);

					lolfmk_pb_upload($ob_image_src);

					/*** alt ***/

					$ob_alt_image = array(
						'name' => __('Alt Image', 'lollum'),
						'data' => 'alt-image',
						'value' => '',
						'desc' => __('Type the alt attribute of your image', 'lollum')
					);

					lolfmk_pb_text($ob_alt_image);

					/*** link ***/

					$ob_link_image = array(
						'name' => __('Link Image', 'lollum'),
						'data' => 'link-image',
						'value' => '',
						'desc' => __('Insert a URL for your image (optional)', 'lollum')
					);

					lolfmk_pb_text($ob_link_image);

			echo '<br><input type="button" class="delete-cloned-item" value="'.__("Delete image", "lollum").'">';

			/*** close single item ***/
			echo '<div class="xml close-tab"></div>';
			echo '</div>';

	/****** end default cloned item ******/
	echo '</div>';

	if ($list_images != '') {
		$i = 0;
		foreach ($list_images->childNodes as $image) {
			if ($i > 0) {
				$img_src = lolfmk_find_xml_value($image, 'image-src');
				$alt_image = lolfmk_find_xml_value($image, 'alt-image');
				$link_image = lolfmk_find_xml_value($image, 'link-image');

				/*** open single item ***/
				echo '<div class="single-item-cloned">';
				echo '<div class="xml open-tab"></div>';

						/* image */
						
						$ob_image_src_c = array(
							'name' => __('Image URL', 'lollum'),
							'data' => 'image-src',
							'value' => $img_src,
							'desc' => __('Upload an image', 'lollum')
						);

						lolfmk_pb_upload($ob_image_src_c);

						/*** alt ***/

						$ob_alt_image_c = array(
							'name' => __('Alt Image', 'lollum'),
							'data' => 'alt-image',
							'value' => $alt_image,
							'desc' => __('Type the alt attribute of your image', 'lollum')
						);

						lolfmk_pb_text($ob_alt_image_c);

						/*** link ***/

						$ob_link_image_c = array(
							'name' => __('Link Image', 'lollum'),
							'data' => 'link-image',
							'value' => $link_image,
							'desc' => __('Insert a URL for your image (optional)', 'lollum')
						);

						lolfmk_pb_text($ob_link_image_c);

				echo '<br><input type="button" class="delete-cloned-item" value="'.__("Delete image", "lollum").'">';

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