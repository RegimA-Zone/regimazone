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
* register portfolio taxonomy
******************************/

function lolfmk_portfolio_taxonomy() {
	register_taxonomy(
		'portfolio-categories',
		'lolfmk-portfolio',
		array(
			'label' => 'Portfolio Category',
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'portfolio-type')
		)
	);
}
if (lolfmk_current_theme_pt_supports('portfolio')) {
	add_action('init', 'lolfmk_portfolio_taxonomy');
}


/******************************
* register faq taxonomy
******************************/

function lolfmk_faqs_taxonomy() {
	register_taxonomy(
		'faqs-categories',
		'lolfmk-faq',
		array(
			'label' => 'FAQ Category',
			'public' => false,
			'show_ui' => true,
			'show_admin_column' => true
		)
	);
}
if (lolfmk_current_theme_pt_supports('faq')) {
	add_action('init', 'lolfmk_faqs_taxonomy');
}


/******************************
* register job taxonomy
******************************/

function lolfmk_jobs_taxonomy() {
	register_taxonomy(
		'job-categories',
		'lolfmk-job',
		array(
			'label' => 'Job Category',
			'public' => false,
			'show_ui' => true,
			'show_admin_column' => true
		)
	);
}
if (lolfmk_current_theme_pt_supports('job')) {
	add_action('init', 'lolfmk_jobs_taxonomy');
}