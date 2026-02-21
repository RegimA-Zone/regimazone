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
* newsletter block
******************************/

function lolfmk_print_newsletter_admin($item = null) {
	$block_title = (lolfmk_find_xml_value($item, 'block-title')) ? lolfmk_find_xml_value($item, 'block-title') : '';
	$m_list = (lolfmk_find_xml_value($item, 'm-list')) ? lolfmk_find_xml_value($item, 'm-list') : '';
	$m_name = (lolfmk_find_xml_value($item, 'm-name')) ? lolfmk_find_xml_value($item, 'm-name') : '';
	$m_confirm = (lolfmk_find_xml_value($item, 'm-confirm')) ? lolfmk_find_xml_value($item, 'm-confirm') : '';
	$btn_text = (lolfmk_find_xml_value($item, 'btn-text')) ? lolfmk_find_xml_value($item, 'btn-text') : 'Subscribe';
	$element_id = (lolfmk_find_xml_value($item, 'element-id')) ? lolfmk_find_xml_value($item, 'element-id') : '';
	$size = (lolfmk_find_xml_value($item, 'size')) ? lolfmk_find_xml_value($item, 'size') : '1-4';

	echo '<div class="page-item item-newsletter item-'.$size.'" data-type="item-newsletter" data-item="Newsletter">';

	lolfmk_item_btns(__('Newsletter', 'lollum'), 'yes', 'yes');
	lolfmk_item_before_inner(__('Newsletter', 'lollum'));

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

	$ob_block_title = array(
		'name' => __('Block Title', 'lollum'),
		'data' => 'block-title',
		'value' => $block_title,
		'desc' => __('The title of the block', 'lollum')
	);

	lolfmk_pb_text($ob_block_title);

	/*** end command ***/

	/*** begin command ***/

	$ob_m_list = array(
		'name' => __('MailChimp List ID', 'lollum'),
		'data' => 'm-list',
		'value' => $m_list,
		'desc' => __('Enter your MailChimp List ID here (<a href="http://kb.mailchimp.com/article/how-can-i-find-my-list-id" title="How can I find my List ID?">How can I find my List ID?</a>)', 'lollum')
	);

	lolfmk_pb_text($ob_m_list);

	/*** end command ***/

	/*** begin command ***/

	$ob_m_name = array(
		'name' => __('Display Name Fields?', 'lollum'),
		'data' => 'm-name',
		'value' => $m_name,
		'options' => array('no', 'yes'),
		'desc' => __('Select "yes" to show the first name and the last name fields into the signup form.', 'lollum')
	);

	lolfmk_pb_simple_select($ob_m_name);

	/*** end command ***/

	/*** begin command ***/

	$ob_m_confirm = array(
		'name' => __('Confirm Email', 'lollum'),
		'data' => 'm-confirm',
		'value' => $m_confirm,
		'options' => array('welcome-email', 'opt-in', 'nothing'),
		'desc' => __('You can send a "welcome" email after the subscribtion or enable the "double opt-in" option. In this case when your subscriber checks their inbox, they will see an email with a link to confirm their subscription.', 'lollum')
	);

	lolfmk_pb_simple_select($ob_m_confirm);

	/*** end command ***/

	/*** begin command ***/

	$ob_btn_text = array(
		'name' => __('Button Text', 'lollum'),
		'data' => 'btn-text',
		'value' => $btn_text,
		'desc' => __('The text of the button', 'lollum')
	);

	lolfmk_pb_text($ob_btn_text);

	/*** end command ***/

	echo '<input class="item-size xml" type="hidden" value="'.$size.'" data-type="size">';

	lolfmk_item_after_inner();
}