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

$lolfmk_meta_box_elements = array();

add_action('init', 'init_lolfmk_meta_box_elements');
function init_lolfmk_meta_box_elements() {
	global $lolfmk_meta_box_elements, $lolfmk_theme_features, $lolfmk_pre;

	/******************************
	* blocks availables
	******************************/

	$lolfmk_blocks_page = array(
		'Section-Open' => __('Section-Open', 'lollum'),
		'Section-Close' => __('Section-Close', 'lollum'),
		'Column' => __('Column', 'lollum'),
		'Divider' => __('Divider', 'lollum'),
		'Space' => __('Space', 'lollum'),
		'Line' => __('Line', 'lollum'),
		'Heading' => __('Heading', 'lollum'),
		'Heading-Small' => __('Heading-Small', 'lollum'),
		'Heading-Wide' => __('Heading-Wide', 'lollum'),
		'Heading-Parallax' => __('Heading-Parallax', 'lollum'),
		'Section-Title' => __('Section-Title', 'lollum'),
		'Image' => __('Image', 'lollum'),
		'Image-Parallax' => __('Image-Parallax', 'lollum'),
		'Image-Text' => __('Image-Text', 'lollum'),
		'Carousel-Images' => __('Carousel-Images', 'lollum'),
		'Masonry-Images' => __('Masonry-Images', 'lollum'),
		'Service-Column' => __('Service-Column', 'lollum'),
		'Mini-Service-Column' => __('Mini-Service-Column', 'lollum'),
		'Block-Feature' => __('Block-Feature', 'lollum'),
		'Block-Video' => __('Block-Video', 'lollum'),
		'Embed-Video' => __('Embed-Video', 'lollum'),
		'Block-Banner' => __('Block-Banner', 'lollum'),
		'Block-Banner-Alt' => __('Block-Banner-Alt', 'lollum'),
		'Block-Text-Banner' => __('Block-Text-Banner', 'lollum'),
		'Block-Text-Banner-Alt' => __('Block-Text-Banner-Alt', 'lollum'),
		'Block-Image-Banner' => __('Block-Image-Banner', 'lollum'),
		'Post' => __('Post', 'lollum'),
		'Blog-Full' => __('Blog-Full', 'lollum'),
		'Blog-List' => __('Blog-List', 'lollum'),
		'Project' => __('Project', 'lollum'),
		'Portfolio-Full' => __('Portfolio-Full', 'lollum'),
		'Portfolio-List' => __('Portfolio-List', 'lollum'),
		'Portfolio-Filter' => __('Portfolio-Filter', 'lollum'),
		'Masonry-Projects' => __('Masonry-Projects', 'lollum'),
		'Masonry-Products' => __('Masonry-Products', 'lollum'),
		'Products-Carousel' => __('Products-Carousel', 'lollum'),
		'Carousel-Projects' => __('Carousel-Projects', 'lollum'),
		'Carousel-Products' => __('Carousel-Products', 'lollum'),
		'Carousel-Product-Categories' => __('Carousel-Product-Categories', 'lollum'),
		'Grid-1' => __('Grid-1', 'lollum'),
		'Grid-2' => __('Grid-2', 'lollum'),
		'Grid-3' => __('Grid-3', 'lollum'),
		'Member' => __('Member', 'lollum'),
		'Testimonial' => __('Testimonial', 'lollum'),
		'Testimonials' => __('Testimonials', 'lollum'),
		'Progress-Circle' => __('Progress-Circle', 'lollum'),
		'Progress-Number' => __('Progress-Number', 'lollum'),
		'Countdown' => __('Countdown', 'lollum'),
		'Blockquote' => __('Blockquote', 'lollum'),
		'Testimonial-Full' => __('Testimonial-Full', 'lollum'),
		'Toggle' => __('Toggle', 'lollum'),
		'FAQs' => __('FAQs', 'lollum'),
		'Brands' => __('Brands', 'lollum'),
		'Brands-Parallax' => __('Brands-Parallax', 'lollum'),
		'Job-List' => __('Job-List', 'lollum'),
		'Map' => __('Map', 'lollum'),
		'Full-Map' => __('Full-Map', 'lollum'),
		'Call-To-Action' => __('Call-To-Action', 'lollum'),
		'Info' => __('Info', 'lollum'),
		'Mailchimp' => __('Mailchimp', 'lollum'),
		'Newsletter' => __('Newsletter', 'lollum')
	);

	$lolfmk_supported_blocks = array();

	foreach ($lolfmk_blocks_page as $key => $block) {
		if (lolfmk_current_theme_supports($key)) {
			$lolfmk_supported_blocks[$key] = $block;
		}
	}

	$lolfmk_meta_box_elements = array(
		'id' => 'lolfmkbox-meta-box-elements',
		'title' => __('Page Elements', 'lollum'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Add page element', 'lollum'),
				'desc' => __('Select an element and add it on the page.', 'lollum'),
				'id' => $lolfmk_pre.'select_item',
				"type" => "elements-select",
				'options' => $lolfmk_supported_blocks,
				'std' => ''
			),
			array(
				'type' => 'open-items-list',
				'id' => ''
			),
			array(
				'name' =>  'Section-Open',
				"type" => "item-section-open",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Section-Close',
				"type" => "item-section-close",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Column',
				"type" => "item-column",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Divider',
				"type" => "item-divider",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Space',
				"type" => "item-space",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Line',
				"type" => "item-line",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Heading',
				"type" => "item-heading",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Heading-Small',
				"type" => "item-heading-small",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Heading-Wide',
				"type" => "item-heading-wide",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Heading-Parallax',
				"type" => "item-heading-parallax",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Section-Title',
				"type" => "item-section-title",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Image',
				"type" => "item-image",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Image-Parallax',
				"type" => "item-image-parallax",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Image-Text',
				"type" => "item-image-text",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Service-Column',
				"type" => "item-service-column",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Mini-Service-Column',
				"type" => "item-mini-service-column",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Block-Feature',
				"type" => "item-block-feature",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Block-Video',
				"type" => "item-block-video",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Embed-Video',
				"type" => "item-embed-video",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Block-Banner',
				"type" => "item-block-banner",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Block-Banner-Alt',
				"type" => "item-block-banner-alt",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Block-Text-Banner',
				"type" => "item-block-text-banner",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Block-Text-Banner-Alt',
				"type" => "item-block-text-banner-alt",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Block-Image-Banner',
				"type" => "item-block-image-banner",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Post',
				"type" => "item-post",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Blog-Full',
				"type" => "item-blog-full",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Blog-List',
				"type" => "item-blog-list",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Project',
				"type" => "item-project",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Portfolio-Full',
				"type" => "item-portfolio-full",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Portfolio-List',
				"type" => "item-portfolio-list",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Portfolio-Filter',
				"type" => "item-portfolio-filter",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Masonry-Projects',
				"type" => "item-masonry-projects",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Masonry-Products',
				"type" => "item-masonry-products",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Products-Carousel',
				"type" => "item-products-carousel",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Carousel-Projects',
				"type" => "item-carousel-projects",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Carousel-Products',
				"type" => "item-carousel-products",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Carousel-Product-Categories',
				"type" => "item-carousel-product-categories",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Grid-1',
				"type" => "item-grid-1",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Grid-2',
				"type" => "item-grid-2",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Grid-3',
				"type" => "item-grid-3",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Member',
				"type" => "item-member",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Testimonial',
				"type" => "item-testimonial",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Testimonials',
				"type" => "item-testimonials",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Progress-Circle',
				"type" => "item-progress-circle",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Progress-Number',
				"type" => "item-progress-number",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Countdown',
				"type" => "item-countdown",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Blockquote',
				"type" => "item-blockquote",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Testimonial-Full',
				"type" => "item-testimonial-full",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Toggle',
				"type" => "item-toggle",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'FAQs',
				"type" => "item-faqs",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Brands',
				"type" => "item-brands",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Carousel-Images',
				"type" => "item-carousel-images",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Masonry-Images',
				"type" => "item-masonry-images",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Brands-Parallax',
				"type" => "item-brands-parallax",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Job-List',
				"type" => "item-job-list",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Map',
				"type" => "item-map",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Full-Map',
				"type" => "item-full-map",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Call-To-Action',
				"type" => "item-call-to-action",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Info',
				"type" => "item-info",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Mailchimp',
				"type" => "item-mailchimp",
				'id' => '',
				'std' => ''
			),
			array(
				'name' =>  'Newsletter',
				"type" => "item-newsletter",
				'id' => '',
				'std' => ''
			),
			array(
				'type' => 'close-items-list',
				'id' => ''
			),
			array(
				'type' => 'section-items-selected',
				'id' => 'hidden-items-selected',
				'std' => ''
			),
			array(
				'type' => 'page-xml',
				'id' => 'page-xml-val',
				'std' => ''
			)
		)
	);
}

function lolfmk_elements_boxes() {
	global $lolfmk_meta_box_elements, $post;

	wp_nonce_field('lolfmk_meta_blocks_nonce', 'lolfmk_meta_box_elements');

	echo '<div class="wrap-boxes">';

	foreach ($lolfmk_meta_box_elements['fields'] as $field) {

		$meta_xml = get_post_meta($post->ID, 'page-xml-val', true);
		$meta = get_post_meta($post->ID, $field['id'], true);

		switch ($field['type']) {

			case 'elements-select':
				lolfmk_case_select_element($field['type'], $field['id'], $field['std'], $field['name'], $field['desc'], $field['options'], $meta);
			break;

			case 'open-items-list':
				lolfmk_open_default_list();
			break;

			case 'close-items-list':
				lolfmk_close_default_list();
			break;

			case 'item-section-open':
				if (lolfmk_current_theme_supports('Section-Open')) {
					lolfmk_print_section_open_admin();
				}
			break;

			case 'item-section-close':
				if (lolfmk_current_theme_supports('Section-Close')) {
					lolfmk_print_section_close_admin();
				}
			break;

			case 'item-column':
				if (lolfmk_current_theme_supports('Column')) {
					lolfmk_print_column_admin();
				}
			break;

			case 'item-divider':
				if (lolfmk_current_theme_supports('Divider')) {
					lolfmk_print_divider_admin();
				}
			break;

			case 'item-space':
				if (lolfmk_current_theme_supports('Space')) {
					lolfmk_print_space_admin();
				}
			break;

			case 'item-line':
				if (lolfmk_current_theme_supports('Line')) {
					lolfmk_print_line_admin();
				}
			break;

			case 'item-heading':
				if (lolfmk_current_theme_supports('Heading')) {
					lolfmk_print_heading_admin();
				}
			break;

			case 'item-heading-small':
				if (lolfmk_current_theme_supports('Heading-Small')) {
					lolfmk_print_heading_small_admin();
				}
			break;

			case 'item-heading-wide':
				if (lolfmk_current_theme_supports('Heading-Wide')) {
					lolfmk_print_heading_wide_admin();
				}
			break;

			case 'item-heading-parallax':
				if (lolfmk_current_theme_supports('Heading-Parallax')) {
					lolfmk_print_heading_parallax_admin();
				}
			break;

			case 'item-section-title':
				if (lolfmk_current_theme_supports('Section-Title')) {
					lolfmk_print_section_title_admin();
				}
			break;

			case 'item-image':
				if (lolfmk_current_theme_supports('Image')) {
					lolfmk_print_image_admin();
				}
			break;

			case 'item-image-parallax':
				if (lolfmk_current_theme_supports('Image-Parallax')) {
					lolfmk_print_image_parallax_admin();
				}
			break;

			case 'item-image-text':
				if (lolfmk_current_theme_supports('Image-Text')) {
					lolfmk_print_image_text_admin();
				}
			break;

			case 'item-service-column':
				if (lolfmk_current_theme_supports('Service-Column')) {
					lolfmk_print_service_column_admin();
				}
			break;

			case 'item-mini-service-column':
				if (lolfmk_current_theme_supports('Mini-Service-Column')) {
					lolfmk_print_mini_service_column_admin();
				}
			break;

			case 'item-block-feature':
				if (lolfmk_current_theme_supports('Block-Feature')) {
					lolfmk_print_block_feature_admin();
				}
			break;

			case 'item-block-video':
				if (lolfmk_current_theme_supports('Block-Video')) {
					lolfmk_print_block_video_admin();
				}
			break;

			case 'item-embed-video':
				if (lolfmk_current_theme_supports('Embed-Video')) {
					lolfmk_print_embed_video_admin();
				}
			break;

			case 'item-block-banner':
				if (lolfmk_current_theme_supports('Block-Banner')) {
					lolfmk_print_block_banner_admin();
				}
			break;

			case 'item-block-banner-alt':
				if (lolfmk_current_theme_supports('Block-Banner-Alt')) {
					lolfmk_print_block_banner_alt_admin();
				}
			break;

			case 'item-block-text-banner':
				if (lolfmk_current_theme_supports('Block-Text-Banner')) {
					lolfmk_print_block_text_banner_admin();
				}
			break;

			case 'item-block-text-banner-alt':
				if (lolfmk_current_theme_supports('Block-Text-Banner-Alt')) {
					lolfmk_print_block_text_banner_alt_admin();
				}
			break;

			case 'item-block-image-banner':
				if (lolfmk_current_theme_supports('Block-Image-Banner')) {
					lolfmk_print_block_image_banner_admin();
				}
			break;

			case 'item-post':
				if (lolfmk_current_theme_supports('Post')) {
					lolfmk_print_post_admin();
				}
			break;

			case 'item-blog-full':
				if (lolfmk_current_theme_supports('Blog-Full')) {
					lolfmk_print_blog_full_admin();
				}
			break;

			case 'item-blog-list':
				if (lolfmk_current_theme_supports('Blog-List')) {
					lolfmk_print_blog_list_admin();
				}
			break;

			case 'item-project':
				if (lolfmk_current_theme_supports('Project')) {
					lolfmk_print_project_admin();
				}
			break;

			case 'item-portfolio-full':
				if (lolfmk_current_theme_supports('Portfolio-Full')) {
					lolfmk_print_portfolio_full_admin();
				}
			break;

			case 'item-portfolio-list':
				if (lolfmk_current_theme_supports('Portfolio-List')) {
					lolfmk_print_portfolio_list_admin();
				}
			break;

			case 'item-portfolio-filter':
				if (lolfmk_current_theme_supports('Portfolio-Filter')) {
					lolfmk_print_portfolio_filter_admin();
				}
			break;

			case 'item-masonry-projects':
				if (lolfmk_current_theme_supports('Masonry-Projects')) {
					lolfmk_print_masonry_projects_admin();
				}
			break;

			case 'item-masonry-products':
				if (lolfmk_current_theme_supports('Masonry-Products')) {
					lolfmk_print_masonry_products_admin();
				}
			break;

			case 'item-products-carousel':
				if (lolfmk_current_theme_supports('Products-Carousel')) {
					lolfmk_print_products_carousel_admin();
				}
			break;

			case 'item-carousel-projects':
				if (lolfmk_current_theme_supports('Carousel-Projects')) {
					lolfmk_print_carousel_projects_admin();
				}
			break;

			case 'item-carousel-products':
				if (lolfmk_current_theme_supports('Carousel-Products')) {
					lolfmk_print_carousel_products_admin();
				}
			break;

			case 'item-carousel-product-categories':
				if (lolfmk_current_theme_supports('Carousel-Product-Categories')) {
					lolfmk_print_carousel_product_categories_admin();
				}
			break;

			case 'item-grid-1':
				if (lolfmk_current_theme_supports('Grid-1')) {
					lolfmk_print_grid1_admin();
				}
			break;

			case 'item-grid-2':
				if (lolfmk_current_theme_supports('Grid-2')) {
					lolfmk_print_grid2_admin();
				}
			break;

			case 'item-grid-3':
				if (lolfmk_current_theme_supports('Grid-3')) {
					lolfmk_print_grid3_admin();
				}
			break;

			case 'item-member':
				if (lolfmk_current_theme_supports('Member')) {
					lolfmk_print_member_admin();
				}
			break;

			case 'item-testimonial':
				if (lolfmk_current_theme_supports('Testimonial')) {
					lolfmk_print_testimonial_admin();
				}
			break;

			case 'item-testimonials':
				if (lolfmk_current_theme_supports('Testimonials')) {
					lolfmk_print_testimonials_admin();
				}
			break;

			case 'item-progress-circle':
				if (lolfmk_current_theme_supports('Progress-Circle')) {
					lolfmk_print_progress_circle_admin();
				}
			break;

			case 'item-progress-number':
				if (lolfmk_current_theme_supports('Progress-Number')) {
					lolfmk_print_progress_number_admin();
				}
			break;

			case 'item-countdown':
				if (lolfmk_current_theme_supports('Countdown')) {
					lolfmk_print_countdown_admin();
				}
			break;

			case 'item-blockquote':
				if (lolfmk_current_theme_supports('Blockquote')) {
					lolfmk_print_blockquote_admin();
				}
			break;

			case 'item-testimonial-full':
				if (lolfmk_current_theme_supports('Testimonial-Full')) {
					lolfmk_print_testimonial_full_admin();
				}
			break;

			case 'item-toggle':
				if (lolfmk_current_theme_supports('Toggle')) {
					lolfmk_print_toggle_admin();
				}
			break;

			case 'item-faqs':
				if (lolfmk_current_theme_supports('FAQs')) {
					lolfmk_print_faqs_admin();
				}
			break;

			case 'item-brands':
				if (lolfmk_current_theme_supports('Brands')) {
					lolfmk_print_brands_admin();
				}
			break;

			case 'item-carousel-images':
				if (lolfmk_current_theme_supports('Carousel-Images')) {
					lolfmk_print_carousel_images_admin();
				}
			break;

			case 'item-masonry-images':
				if (lolfmk_current_theme_supports('Masonry-Images')) {
					lolfmk_print_masonry_images_admin();
				}
			break;

			case 'item-brands-parallax':
				if (lolfmk_current_theme_supports('Brands-Parallax')) {
					lolfmk_print_brands_parallax_admin();
				}
			break;

			case 'item-job-list':
				if (lolfmk_current_theme_supports('Job-List')) {
					lolfmk_print_job_list_admin();
				}
			break;

			case 'item-map':
				if (lolfmk_current_theme_supports('Map')) {
					lolfmk_print_map_admin();
				}
			break;

			case 'item-full-map':
				if (lolfmk_current_theme_supports('Full-Map')) {
					lolfmk_print_full_map_admin();
				}
			break;

			case 'item-call-to-action':
				if (lolfmk_current_theme_supports('Call-To-Action')) {
					lolfmk_print_call_to_action_admin();
				}
			break;

			case 'item-info':
				if (lolfmk_current_theme_supports('Info')) {
					lolfmk_print_info_admin();
				}
			break;

			case 'item-mailchimp':
				if (lolfmk_current_theme_supports('Mailchimp')) {
					lolfmk_print_mailchimp_admin();
				}
			break;

			case 'item-newsletter':
				if (lolfmk_current_theme_supports('Newsletter')) {
					lolfmk_print_newsletter_admin();
				}
			break;
			
			case 'section-items-selected':
				lolfmk_items_selected($meta_xml);
			break;

			case 'page-xml':
				lolfmk_page_xml($field['id'], $field['std'], $meta);
			break;
		}
	}
	echo '</div>';
}