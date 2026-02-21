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

global $lolfmk_transparent_header;

if ($lolfmk_transparent_header != '' && $lolfmk_transparent_header == 'yes') {

	$lolfmk_meta_box_header_settings_post = array();

	add_action('init', 'lolfmk_meta_box_header_settings_post');
	function lolfmk_meta_box_header_settings_post() {
		global $lolfmk_meta_box_header_settings_post, $lolfmk_pre;

		$lolfmk_meta_box_header_settings_post = array(
			'id' => 'lolfmkbox-meta-box-header-settings-post',
			'title' => __('Header Settings', 'lollum'),
			'page' => 'post',
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
				),
				array(
					'name' =>  __('Hide Thumbnail Single Post', 'lollum'),
					'desc' => __('Select this option to hide the featured image when the single post is being displayed.', 'lollum'),
					'id' => $lolfmk_pre . 'single_thumb_check_post',
					"type" => "checkbox",
					'std' => ''
				)
			)
		);

	}

	function lolfmk_header_settings_post() {
		global $lolfmk_meta_box_header_settings_post, $post;

		wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

		echo '<div class="wrap-boxes">';

		foreach ($lolfmk_meta_box_header_settings_post['fields'] as $field) {

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

/******************************
* post format video meta boxes
******************************/

$lolfmk_meta_box_video = array();

add_action('init', 'init_lolfmk_meta_box_video');
function init_lolfmk_meta_box_video() {
	global $lolfmk_meta_box_video, $lolfmk_pre;

	$lolfmk_meta_box_video = array(
		'id' => 'lolfmkbox-meta-box-video',
		'title' => __('Video Settings', 'lollum'),
		'page' => 'post',
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
				'id' => $lolfmk_pre . 'mp4_url',
				"type" => "upload-video",
				'std' => ''
			),
			array(
				'name' => __('Poster Video', 'lollum'),
				'desc' => __('The poster of the video (optional).', 'lollum'),
				'id' => $lolfmk_pre . 'poster_video',
				"type" => "upload",
				'std' => ''
			),
			array(
				'name' => __('Embed Code', 'lollum'),
				'desc' => __('Embed code for no self-hosted videos (Youtube, Vimeo, etc).', 'lollum'),
				'id' => $lolfmk_pre . 'embed_video',
				"type" => "textarea",
				'std' => ''
			)
		)
	);
}

function lolfmk_video_boxes() {
	global $lolfmk_meta_box_video, $post;
	
	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_video['fields'] as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			case 'section-description':
				lolfmk_case_sectiondescription($field['type'], $field['name'], $field['message']);
			break;

			case 'textarea':
				lolfmk_case_textarea($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'upload-video':
				lolfmk_case_upload_video($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;


			case 'upload':
				lolfmk_case_upload($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

		}
	}
	echo '</div>';
}


/******************************
* post format audio meta boxes
******************************/

$lolfmk_meta_box_audio = array();

add_action('init', 'init_lolfmk_meta_box_audio');
function init_lolfmk_meta_box_audio() {
	global $lolfmk_meta_box_audio, $lolfmk_pre;

	$lolfmk_meta_box_audio = array(
		'id' => 'lolfmkbox-meta-box-audio',
		'title' => __('Audio Settings', 'lollum'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' =>  '',
				'message' => __('You can embed an audio file from Soundcloud, etc., or songs hosted on your server.', 'lollum'),
				"type" => "section-description",
				'id' => '',
				'std' => ''
			),
			array(
				'name' => __('MP3 Audio', 'lollum'),
				'desc' => __('Upload a song from Media Library.', 'lollum'),
				'id' => $lolfmk_pre . 'mp3_url',
				"type" => "upload-audio",
				'std' => ''
			),
			array(
				'name' => __('Embed Code', 'lollum'),
				'desc' => __('Embed code for no self-hosted audio files (Soundcloud, etc).', 'lollum'),
				'id' => $lolfmk_pre . 'embed_audio',
				"type" => "textarea",
				'std' => ''
			)
		)
	);
}

function lolfmk_audio_boxes() {
	global $lolfmk_meta_box_audio, $post;

	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_audio['fields'] as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			case 'section-description':
				lolfmk_case_sectiondescription($field['type'], $field['name'], $field['message']);
			break;

			case 'textarea':
				lolfmk_case_textarea($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'upload-audio':
				lolfmk_case_upload_audio($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;
	
		}
	}
	echo '</div>';
}


/******************************
* post format link meta boxes
******************************/

$lolfmk_meta_box_link = array();

add_action('init', 'init_lolfmk_meta_box_link');
function init_lolfmk_meta_box_link() {
	global $lolfmk_meta_box_link, $lolfmk_pre;

	$lolfmk_meta_box_link = array(
		'id' => 'lolfmkbox-meta-box-link',
		'title' => __('Link Settings', 'lollum'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('URL', 'lollum'),
				'desc' => __('The URL of your link (remember "http://").', 'lollum'),
				'id' => $lolfmk_pre . 'link_url',
				"type" => "text",
				'std' => ''
			)
		)
	);
}

function lolfmk_link_boxes() {
	global $lolfmk_meta_box_link, $post;

	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_link['fields'] as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			case 'text':
				lolfmk_case_text($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

		}
	}
	echo '</div>';
}


/******************************
* post format gallery meta boxes
******************************/

$lolfmk_meta_box_gallery = array();

add_action('init', 'init_lolfmk_meta_box_gallery');
function init_lolfmk_meta_box_gallery() {
	global $lolfmk_meta_box_gallery, $lolfmk_pre;

	$lolfmk_meta_box_gallery = array(
		'id' => 'lolfmkbox-meta-box-gallery',
		'title' => __('Gallery Settings', 'lollum'),
		'page' => 'post',
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

function lolfmk_gallery_boxes() {
	global $lolfmk_meta_box_gallery, $post;
	
	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_gallery['fields'] as $field) {

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


/******************************
* post format image meta boxes
******************************/

$lolfmk_meta_box_image = array();

add_action('init', 'init_lolfmk_meta_box_image');
function init_lolfmk_meta_box_image() {
	global $lolfmk_meta_box_image, $lolfmk_pre;

	$lolfmk_meta_box_image = array(
		'id' => 'lolfmkbox-meta-box-image',
		'title' => __('Image Settings', 'lollum'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' =>  '',
				'message' => __('You can upload an image from Media Library or paste HTML code.', 'lollum'),
				"type" => "section-description",
				'id' => '',
				'std' => ''
			),
			array(
				'name' => __('Image', 'lollum'),
				'desc' => __('Upload an image from Media Library.', 'lollum'),
				'id' => $lolfmk_pre . 'p_image_url',
				"type" => "upload-image",
				'std' => ''
			),
			array(
				'name' => __('Image Alt', 'lollum'),
				'desc' => __('The alternate text of the image.', 'lollum'),
				'id' => $lolfmk_pre . 'p_image_alt',
				"type" => "text",
				'std' => ''
			),
			array(
				'name' => __('Image W', 'lollum'),
				'desc' => __('The width of the image.', 'lollum'),
				'id' => $lolfmk_pre . 'p_image_w',
				"type" => "text-hidden",
				'std' => ''
			),
			array(
				'name' => __('Image H', 'lollum'),
				'desc' => __('The height of the image.', 'lollum'),
				'id' => $lolfmk_pre . 'p_image_h',
				"type" => "text-hidden",
				'std' => ''
			),
			array(
				'name' => __('Embed Code', 'lollum'),
				'desc' => __('Embed code for the image.', 'lollum'),
				'id' => $lolfmk_pre . 'embed_image',
				"type" => "textarea",
				'std' => ''
			)
		)
	);
}

function lolfmk_image_boxes() {
	global $lolfmk_meta_box_image, $post;

	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_image['fields'] as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			case 'section-description':
				lolfmk_case_sectiondescription($field['type'], $field['name'], $field['message']);
			break;

			case 'text':
				lolfmk_case_text($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'text-hidden':
				lolfmk_case_text_hidden($field['id'], $field['std'], $meta);
			break;

			case 'textarea':
				lolfmk_case_textarea($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

			case 'upload-image':
				lolfmk_case_upload_image($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

		}
	}
	echo '</div>';
}


/******************************
* post format quote meta boxes
******************************/

$lolfmk_meta_box_quote = array();

add_action('init', 'init_lolfmk_meta_box_quote');
function init_lolfmk_meta_box_quote() {
	global $lolfmk_meta_box_quote, $lolfmk_pre;

	$lolfmk_meta_box_quote = array(
		'id' => 'lolfmkbox-meta-box-quote',
		'title' => __('Quote Settings', 'lollum'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Author Quote', 'lollum'),
				'desc' => __('The author of the quote.', 'lollum'),
				'id' => $lolfmk_pre . 'author_quote',
				"type" => "text",
				'std' => ''
			),
			array(
				'name' => __('Source Quote', 'lollum'),
				'desc' => __('The source of the quote (remember "http://").', 'lollum'),
				'id' => $lolfmk_pre . 'source_quote',
				"type" => "text",
				'std' => ''
			)
		)
	);
}

function lolfmk_quote_boxes() {
	global $lolfmk_meta_box_quote, $post;

	wp_nonce_field('lolfmk_meta_box_nonce', 'lol_meta_box_nonce');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_quote['fields'] as $field) {

		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			case 'text':
				lolfmk_case_text($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $meta);
			break;

		}
	}
	echo '</div>';
}