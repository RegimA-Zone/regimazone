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
* section close block
******************************/

function lolfmk_print_section_close_admin($item = null) {

	echo '<div class="page-item item-section-close item-1-1" data-type="item-section-close" data-item="Section-Close">';

	lolfmk_item_btns(__('Section-Close', 'lollum'));
	lolfmk_item_before_inner(__('Section-Close', 'lollum'));
	
	echo '<input class="item-size xml" type="hidden" value="1-1" data-type="size">';
	
	lolfmk_item_after_inner();
}