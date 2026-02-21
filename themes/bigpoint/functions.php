<?php
/**
 * Lollum
 * 
 * Big Point functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */

/**
 * Tell WordPress to run lollum_setup() when the 'after_setup_theme' hook is run.
 */
if (!function_exists('lollum_setup')) {
	function lollum_setup() {

		/* Make Lollum Framework available for translation.
		*  Translations can be added to the /languages/ directory.
		*/
		load_theme_textdomain('lollum', get_template_directory() . '/languages');

		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if (is_readable($locale_file)) {
		  require_once($locale_file);
		}

		// Register the wp 3.0 Menus.
		register_nav_menu('primary', __('Menu', 'lollum'));
		register_nav_menu('top-header', __('Top Header', 'lollum'));

		// Add support for Post Formats
		add_theme_support('post-formats', array('aside', 'status', 'quote', 'image', 'gallery', 'video', 'audio', 'link', 'chat'));

		// Add post thumbnails support
		add_theme_support('post-thumbnails');
		add_image_size('widget-thumb', 150, 150, true); // Widget thumbnails
		add_image_size('post-thumb', 870, 300, true); // Post thumbnails
		add_image_size('page-thumb', 1170, 403, true); // Page thumbnails
		add_image_size('featured-thumb', 870, 532, true); // Featured thumbnails
		add_image_size('project-thumb', 1170, 500, true); // Single Project thumbnails

		if (!isset($content_width)) {
		  $content_width = 870;
		}

		add_theme_support('automatic-feed-links');

		add_theme_support('woocommerce');

		$features = array(
			'Column' => 'yes',
			'Divider' => 'yes',
			'Space' => 'yes',
			'Line' => 'yes',
			'Heading' => 'yes',
			'Heading-Small' => 'yes',
			'Heading-Wide' => 'yes',
			'Heading-Parallax' => 'yes',
			'Image' => 'yes',
			'Image-Parallax' => 'yes',
			'Image-Text' => 'yes',
			'Service-Column' => 'yes',
			'Mini-Service-Column' => 'yes',
			'Block-Feature' => 'yes',
			'Embed-Video' => 'yes',
			'Block-Banner' => 'yes',
			'Block-Banner-Alt' => 'yes',
			'Block-Text-Banner' => 'yes',
			'Post' => 'yes',
			'Blog-Full' => 'yes',
			'Blog-List' => 'yes',
			'Project' => 'yes',
			'Portfolio-Full' => 'yes',
			'Portfolio-List' => 'yes',
			'Portfolio-Filter' => 'yes',
			'Member' => 'yes',
			'Progress-Circle' => 'yes',
			'Progress-Number' => 'yes',
			'Countdown' => 'yes',
			'Testimonial-Full' => 'yes',
			'Toggle' => 'yes',
			'FAQs' => 'yes',
			'Brands-Parallax' => 'yes',
			'Job-List' => 'yes',
			'Map' => 'yes',
			'Full-Map' => 'yes',
			'Call-To-Action' => 'yes',
			'Info' => 'yes',
			'Mailchimp' => 'yes'
		);
		$post_types = array(
			'portfolio' => 'yes',
			'team' => 'yes',
			'job' => 'yes',
			'faq' => 'yes'
		);
		add_option('lolfmk_supported_post_types', $post_types);
		add_option('lolfmk_supported_features', $features);
		add_option('lolfmk_support_page_builder', 'yes');
		add_option('lolfmk_load_shortcodes_scripts', 'no');
		add_option('lolfmk_margin_full', 'yes');
		add_option('lolfmk_link_slider', 'yes');
	}
}
add_action('after_setup_theme', 'lollum_setup');

if(!function_exists('lolfmk_remove_supported_features')) {
	function lolfmk_remove_supported_features() {
		delete_option('lolfmk_supported_features');
		delete_option('lolfmk_support_page_builder');
		delete_option('lolfmk_load_shortcodes_scripts');
		delete_option('lolfmk_supported_post_types');
		delete_option('lolfmk_margin_full');
		delete_option('lolfmk_link_slider');
	}
}
add_action('switch_theme', 'lolfmk_remove_supported_features');

/**
 * Load up core options
 */

require_once(get_template_directory() . '/core/core.php');

/**
 * Register general scripts
 */

add_action('wp_enqueue_scripts', 'lollum_register_js');
if (!function_exists('lollum_register_js')) {
	function lollum_register_js() {
		if (!is_admin()) {
			wp_register_script('bigpoint-modernizr', LOLLUM_URI . '/js/modernizr.js', array(), '1.0', 0);
			wp_register_script('bigpoint-common', LOLLUM_URI . '/js/common.js', array('jquery'), '1.0', 1);
			wp_register_script('bigpoint-isotope', LOLLUM_URI . '/js/jquery.isotope.js', array('jquery'), '1.0', 1);
			wp_register_script('bigpoint-parallax', LOLLUM_URI . '/js/jquery.parallax.js', array('jquery'), '1.0', 1);
			wp_register_script('bigpoint-countTo', LOLLUM_URI . '/js/jquery.countTo.js', array('jquery'), '1.0', 1);
			wp_register_script('bigpoint-easypiechart', LOLLUM_URI . '/js/jquery.easypiechart.js', array('jquery'), '1.0', 1);
			wp_register_script('bigpoint-init', LOLLUM_URI . '/js/init.js', array('jquery'), '1.0', 1);
			wp_register_script('lolfmk-progress', LOLLUM_URI . '/js/progress-circle.js', array('jquery', 'bigpoint-easypiechart'), '1.0', 1);

			wp_localize_script( 'lolfmk-progress', 'lolfmk_progress_vars', 
				array(
					'barColor' => get_option('lol_first_ac_color')
				)
			);
			
			wp_enqueue_script('bigpoint-modernizr');
			wp_enqueue_script('bigpoint-common');
			wp_enqueue_script('bigpoint-init');
		}
		if (is_singular() && comments_open() && get_option('thread_comments') && !is_page()) {
			wp_register_script('lollum-comment-reply', LOLLUM_URI . '/js/comment-reply.min.js', '1.0', 1);
			wp_enqueue_script('lollum-comment-reply');
		}
	}
}

/**
 * Register general styles
 */

if (!function_exists('lollum_register_css')) {
	function lollum_register_css() {
		if (!is_admin()) {
			global $wp_styles;
			wp_register_style('grid-css', LOLLUM_URI . '/css/grid.css', array(), '1.0');
			wp_register_style('bigpoint-fonts', LOLLUM_URI . '/css/fonts.css', array(), '1.0');
			wp_register_style('bigpoint-default', get_stylesheet_uri(), '1.0');
			wp_register_style('bigpoint-css', LOLLUM_URI . '/css/base.css', array(), '1.0');
			if (lollum_check_is_woocommerce()) {
				wp_register_style('woocommerce-css', LOLLUM_URI . '/woocommerce/css/woocommerce.css', array(), '1.0');
			}
			if (get_option('lol_check_responsive') != 'true') {
				wp_register_style('no-responsive-css', LOLLUM_URI . '/css/base-nr.css', array(), '1.0');
				wp_register_style('woo-no-responsive-css', LOLLUM_URI . '/woocommerce/css/woocommerce-nr.css', array(), '1.0');
			}
			wp_register_style('ie8-css', LOLLUM_URI . '/css/ie8.css', array(), '1.0');
			wp_register_style('bigpoint-custom', LOLLUM_URI . '/css/custom.css', array(), '1.0');

			wp_enqueue_style('grid-css');
			wp_enqueue_style('bigpoint-fonts');

			wp_enqueue_style('bigpoint-default');
			wp_enqueue_style('bigpoint-css');
			if (lollum_check_is_woocommerce()) {
				wp_enqueue_style('woocommerce-css');
			}
			if (get_option('lol_check_responsive') != 'true') {
				wp_enqueue_style('no-responsive-css');
			}
			if ((get_option('lol_check_responsive') != 'true') && lollum_check_is_woocommerce()) {
				wp_enqueue_style('woo-no-responsive-css');
			}
			wp_enqueue_style('bigpoint-custom');

			wp_enqueue_style('ie8-css');
			$wp_styles->add_data('ie8-css', 'conditional', 'lt IE 9');
		}
	}
}
add_action('wp_enqueue_scripts', 'lollum_register_css');


/**
 * Queue frontend scripts/styles.
 */

if (!function_exists('lollum_queue_frontend')) {
	function lollum_queue_frontend() {
		if (is_page()) {
			wp_enqueue_script('bigpoint-parallax');
			wp_enqueue_script('bigpoint-countTo');
			wp_enqueue_script('lolfmk-progress');
			wp_enqueue_script('bigpoint-isotope');
			wp_enqueue_script('lolfmk-prettyPhoto');
			wp_enqueue_style('lolfmk-prettyPhoto-css');
		}
		if (is_page() || ('lolfmk-job' == get_post_type())) {
			wp_enqueue_script('lolfmk-google-maps-api');
			wp_enqueue_script('lolfmk-google-maps');
		}
	}
}
add_action('wp_enqueue_scripts', 'lollum_queue_frontend');
