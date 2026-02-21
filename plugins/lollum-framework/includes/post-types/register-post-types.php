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
* register post types
******************************/

function lolfmk_create_post_type() {
	if (lolfmk_current_theme_pt_supports('portfolio')) {
		register_post_type('lolfmk-portfolio',
			array(
				'labels' => array(
					'name' => __('Portfolio', 'lollum'),
					'singular_name' => __('Project', 'lollum'),
					'add_new'            => __( 'Add New', 'lollum'),
					'add_new_item'       => __( 'Add New Project', 'lollum'),
					'edit_item'          => __( 'Edit Project', 'lollum'),
					'new_item'           => __( 'New Project', 'lollum'),
					'view_item'          => __( 'View Project', 'lollum'),
					'search_items'       => __( 'Search Projects', 'lollum'),
					'not_found'          => __( 'No project found', 'lollum'),
					'not_found_in_trash' => __( 'No projects found in Trash', 'lollum')
				),
			'public' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug'=>'portfolio'),
			'publicly_queryable' => true,
			'supports' => array('title','editor','thumbnail','page-attributes'),
			'menu_icon' => 'dashicons-portfolio'
			)
		);
	}
	if (lolfmk_current_theme_pt_supports('team')) {
		register_post_type('lolfmk-team',
			array(
				'labels' => array(
					'name' => __('Team', 'lollum'),
					'singular_name' => __('Member', 'lollum'),
					'add_new'            => __( 'Add New', 'lollum'),
					'add_new_item'       => __( 'Add New Member', 'lollum'),
					'edit_item'          => __( 'Edit Member', 'lollum'),
					'new_item'           => __( 'New Member', 'lollum'),
					'view_item'          => __( 'View Member', 'lollum'),
					'search_items'       => __( 'Search Members', 'lollum'),
					'not_found'          => __( 'No member found', 'lollum'),
					'not_found_in_trash' => __( 'No members found in Trash', 'lollum')
				),
			'public' => false,
			'show_ui' => true,
			'exclude_from_search' => true,
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug'=>'team-member'),
			'publicly_queryable' => false,
			'supports' => array('title','editor','thumbnail','page-attributes'),
			'menu_icon' => 'dashicons-businessman'
			)
		);
	}
	if (lolfmk_current_theme_pt_supports('faq')) {
		register_post_type('lolfmk-faq',
			array(
				'labels' => array(
					'name' => __('FAQ', 'lollum'),
					'singular_name' => __('FAQ', 'lollum'),
					'add_new'            => __( 'Add New', 'lollum'),
					'add_new_item'       => __( 'Add New FAQ', 'lollum'),
					'edit_item'          => __( 'Edit FAQ', 'lollum'),
					'new_item'           => __( 'New FAQ', 'lollum'),
					'view_item'          => __( 'View FAQ', 'lollum'),
					'search_items'       => __( 'Search FAQs', 'lollum'),
					'not_found'          => __( 'No FAQ found', 'lollum'),
					'not_found_in_trash' => __( 'No FAQs found in Trash', 'lollum')
				),
			'public' => false,
			'show_ui' => true,
			'exclude_from_search' => true,
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug'=>'faq'),
			'publicly_queryable' => false,
			'supports' => array('title','editor','page-attributes'),
			'menu_icon' => 'dashicons-editor-help'
			)
		);
	}
	if (lolfmk_current_theme_pt_supports('job')) {
		register_post_type('lolfmk-job',
			array(
				'labels' => array(
					'name' => __('Job', 'lollum'),
					'singular_name' => __('Job', 'lollum'),
					'add_new'            => __( 'Add New', 'lollum'),
					'add_new_item'       => __( 'Add New Job', 'lollum'),
					'edit_item'          => __( 'Edit Job', 'lollum'),
					'new_item'           => __( 'New Job', 'lollum'),
					'view_item'          => __( 'View Job', 'lollum'),
					'search_items'       => __( 'Search Jobs', 'lollum'),
					'not_found'          => __( 'No jobs found', 'lollum'),
					'not_found_in_trash' => __( 'No jobs found in Trash', 'lollum')
				),
			'public' => true,
			'exclude_from_search' => true,
			'has_archive' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug'=>'job'),
			'publicly_queryable' => true,
			'supports' => array('title','editor','page-attributes'),
			'menu_icon' => 'dashicons-hammer'
			)
		);
	}
	if (lolfmk_current_theme_pt_supports('testimonials')) {
		register_post_type('lolfmk-testimonials',
			array(
				'labels' => array(
					'name' => __('Testimonial', 'lollum'),
					'singular_name' => __('Testimonial', 'lollum'),
					'add_new'            => __( 'Add New', 'lollum'),
					'add_new_item'       => __( 'Add New Testimonial', 'lollum'),
					'edit_item'          => __( 'Edit Testimonial', 'lollum'),
					'new_item'           => __( 'New Testimonial', 'lollum'),
					'view_item'          => __( 'View Testimonial', 'lollum'),
					'search_items'       => __( 'Search Testimonials', 'lollum'),
					'not_found'          => __( 'No testimonials found', 'lollum'),
					'not_found_in_trash' => __( 'No testimonials found in Trash', 'lollum')
				),
			'public' => false,
			'show_ui' => true,
			'exclude_from_search' => true,
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug'=>'testimonial'),
			'publicly_queryable' => false,
			'supports' => array('title','editor','thumbnail'),
			'menu_icon' => 'dashicons-format-quote'
			)
		);
	}
}
add_action('init', 'lolfmk_create_post_type');