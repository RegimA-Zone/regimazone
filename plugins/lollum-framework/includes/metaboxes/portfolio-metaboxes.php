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
* portfolio meta boxes
******************************/

global $lolfmk_transparent_header;

if ($lolfmk_transparent_header != '' && $lolfmk_transparent_header == 'yes') {

	$lolfmk_meta_box_header_settings_portfolio = array();

	add_action('init', 'lolfmk_meta_box_header_settings_portfolio');
	function lolfmk_meta_box_header_settings_portfolio() {
		global $lolfmk_meta_box_header_settings_portfolio, $lolfmk_pre;

		$lolfmk_meta_box_header_settings_portfolio = array(
			'id' => 'lolfmkbox-meta-box-header-settings-portfolio',
			'title' => __('Header Settings', 'lollum'),
			'page' => 'lolfmk-portfolio',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' =>  __('Header Background Color', 'lollum'),
					'desc' => __('Select the background color of the header area.', 'lollum'),
					'id' => $lolfmk_pre . 'bg_color_header_style_post',
					"type" => "color",
					'std' => '#f6f6f6'
				),
				array(
					'name' =>  __('Header Background Image', 'lollum'),
					'desc' => __('Upload a background image to the header area.', 'lollum'),
					'id' => $lolfmk_pre . 'bg_image_header_post',
					"type" => "upload",
					'std' => ''
				),
				array(
					'name' =>  __('Header Color', 'lollum'),
					'desc' => __('This option sets the color of the page title. And defines the color of the text (and logo) when you\'re using a transparent header. If you have enabled the sticky header this color will change to the style of the header selected in the theme panel, during the scroll.', 'lollum'),
					'id' => $lolfmk_pre . 'color_header_style_post',
					'options' => array('dark', 'light'),
					"type" => "select",
					'std' => 'dark'
				),
				array(
					'name' =>  __('Transparent Header', 'lollum'),
					'desc' => __('Select this option for a transparent menu over the header image.', 'lollum'),
					'id' => $lolfmk_pre . 'transparent_header_check_post',
					"type" => "checkbox",
					'std' => ''
				),
				array(
					'name' =>  __('Menu Border', 'lollum'),
					'desc' => __('Select this option to add a border to the bottom of the menu (only for transparent headers).', 'lollum'),
					'id' => $lolfmk_pre . 'border_header_check_post',
					"type" => "checkbox",
					'std' => ''
				)
			)
		);

	}

	function lolfmk_header_settings_portfolio() {
		global $lolfmk_meta_box_header_settings_portfolio, $post;

		wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

		echo '<div class="wrap-boxes">';

		foreach ($lolfmk_meta_box_header_settings_portfolio['fields'] as $field) {

			$meta = get_post_meta($post->ID, $field['id'], true);
			switch ($field['type']) {

				case 'checkbox':
					lolfmk_case_checkbox($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
				break;

				case 'select':
					lolfmk_case_select($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $field['options'], $meta);
				break;

				case 'color':
					lolfmk_case_color($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
				break;

				case 'upload':
					lolfmk_case_upload($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
				break;

			}
		}
		echo '</div>';
	}

}

$lolfmk_meta_box_portfolio = array();

add_action('init', 'init_lolfmk_meta_box_portfolio');
function init_lolfmk_meta_box_portfolio() {
	global $lolfmk_meta_box_portfolio, $lolfmk_pre;

	$lolfmk_meta_box_portfolio = array(
		'id' => 'lolfmkbox-meta-box-portfolio',
		'title' => __('Portfolio Settings', 'lollum'),
		'page' => 'lolfmk-portfolio',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' =>  __('Portfolio Type', 'lollum'),
				'desc' => __('Select the type of portfololio.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_type',
				'options' => array('image', 'slider', 'video'),
				"type" => "select",
				'std' => 'image'
			),
			array(
				'name' => __('Portfolio description', 'lollum'),
				'desc' => __('A little description of your project.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_desc',
				"type" => "textarea",
				'std' => ''
			),
			array(
				'name' => __('Portfolio date', 'lollum'),
				'desc' => __('The date of your project.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_date',
				"type" => "text",
				'std' => ''
			),
			array(
				'name' => __('Label Portfolio date', 'lollum'),
				'desc' => __('The label of the field.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_date_label',
				"type" => "text",
				'std' => 'Date'
			),
			array(
				'name' => __('Portfolio client', 'lollum'),
				'desc' => __('The client of your project.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_client',
				"type" => "text",
				'std' => ''
			),
			array(
				'name' => __('Label Portfolio client', 'lollum'),
				'desc' => __('The label of the field.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_client_label',
				"type" => "text",
				'std' => 'Client'
			),
			array(
				'name' => __('Portfolio skills', 'lollum'),
				'desc' => __('The skills needed for this project.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_skills',
				"type" => "text",
				'std' => ''
			),
			array(
				'name' => __('Label Portfolio skills', 'lollum'),
				'desc' => __('The label of the field.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_skills_label',
				"type" => "text",
				'std' => 'Skills'
			),
			array(
				'name' => __('Portfolio project URL', 'lollum'),
				'desc' => __('The URL of your project.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_url',
				"type" => "text",
				'std' => ''
			),
			array(
				'name' => __('Label Portfolio project URL', 'lollum'),
				'desc' => __('The label of the field.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_url_label',
				"type" => "text",
				'std' => 'Project URL'
			),
			array(
				'name' => __('Portfolio love count', 'lollum'),
				'desc' => __('Portfolio love count.', 'lollum'),
				'id' => '_lolfmk_love_count',
				"type" => "meta-love",
				'std' => 1
			)
		)
	);
}

function lolfmk_portfolio_boxes() {
	global $lolfmk_meta_box_portfolio, $post;

	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_portfolio['fields'] as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			case 'textarea':
				lolfmk_case_textarea($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'text':
				lolfmk_case_text($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'select':
				lolfmk_case_select($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $field['options'], $meta);
			break;

			case 'meta-love':
				lolfmk_case_meta_love($field['id'], $field['std'], $meta);
			break;
		}
	}
	echo '</div>';
}

$lolfmk_meta_box_portfolio_video = array();

add_action('init', 'init_lolfmk_meta_box_portfolio_video');
function init_lolfmk_meta_box_portfolio_video() {
	global $lolfmk_meta_box_portfolio_video, $lolfmk_pre;

	$lolfmk_meta_box_portfolio_video = array(
		'id' => 'lolfmkbox-meta-box-portfolio-video',
		'title' => __('Portfolio Video Settings', 'lollum'),
		'page' => 'lolfmk-portfolio',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' =>  '',
				'message' => __('You can embed a video from Youtube or Vimeo ("Embed Code" section), or videos hosted on your server.', 'lollum'),
				"type" => "section-description",
				'id' => '',
				'std' => ''
			),
			array(
				'name' => __('MP4 Video', 'lollum'),
				'desc' => __('Upload a video from Media Library.', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_mp4_url',
				"type" => "upload-video",
				'std' => ''
			),
			array(
				'name' => __('Poster Video', 'lollum'),
				'desc' => __('The poster of the video (optional).', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_poster_video',
				"type" => "upload",
				'std' => ''
			),
			array(
				'name' => __('Embed Code', 'lollum'),
				'desc' => __('Embed code for no self-hosted videos (Youtube, Vimeo, etc).', 'lollum'),
				'id' => $lolfmk_pre . 'portfolio_embed_video',
				"type" => "textarea",
				'std' => ''
			)
		)
	);

	global $lolfmk_portfolio_video_lightbox;

	if ($lolfmk_portfolio_video_lightbox != '' && $lolfmk_portfolio_video_lightbox == 'yes') {

		$lolfmk_meta_box_portfolio_video['fields'][] = array(
			'name' => __('Embed Video URL', 'lollum'),
			'desc' => __('Type the URL of the video to open it in a lightbox inside the portfolio pages (or blocks). Works only for embed videos (Youtube, Vimeo, etc).', 'lollum'),
			'id' => $lolfmk_pre . 'portfolio_embed_video_url',
			"type" => "text",
			'std' => ''
		);

	}
}

function lolfmk_portfolio_video_boxes() {
	global $lolfmk_meta_box_portfolio_video, $post;

	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_portfolio_video['fields'] as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			case 'section-description':
				lolfmk_case_sectiondescription($field['type'], $field['name'], $field['message']);
			break;

			case 'textarea':
				lolfmk_case_textarea($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'text':
				lolfmk_case_text($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'checkbox':
				lolfmk_case_checkbox($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);   
			break;

			case 'upload':
				lolfmk_case_upload($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'upload-video':
				lolfmk_case_upload_video($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;
		}
	}
	echo '</div>';
}

$lolfmk_meta_box_portfolio_gallery = array();

add_action('init', 'init_lolfmk_meta_box_portfolio_gallery');
function init_lolfmk_meta_box_portfolio_gallery() {
	global $lolfmk_meta_box_portfolio_gallery, $lolfmk_pre;

	$lolfmk_meta_box_portfolio_gallery = array(
		'id' => 'lolfmkbox-meta-box-portfolio-gallery',
		'title' => __('Portfolio Gallery Settings', 'lollum'),
		'page' => 'lolfmk-portfolio',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' =>  '',
				'message' => __('Insert in this field the gallery shortcode.', 'lollum'),
				"type" => "section-description",
				'id' => '',
				'std' => ''
			),
			array(
				'name' => __('Gallery Shortcode', 'lollum'),
				'desc' => __('Insert the gallery shortcode.', 'lollum'),
				'id' => $lolfmk_pre . 'gallery_shortcode',
				"type" => "upload-gallery",
				'std' => ''
			)
		)
	);
}

function lolfmk_portfolio_gallery_boxes() {
	global $lolfmk_meta_box_portfolio_gallery, $post;
	
	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_portfolio_gallery['fields'] as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			case 'section-description':
				lolfmk_case_sectiondescription($field['type'], $field['name'], $field['message']);
			break;

			case 'upload-gallery':
				lolfmk_case_upload_gallery($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

		}
	}
	echo '</div>';
}