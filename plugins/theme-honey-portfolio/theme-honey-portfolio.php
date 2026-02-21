<?php 
defined('ABSPATH') or die("Nothing to see here!");
/**
 * Plugin Name: Theme Honey Portfolio
 * Plugin URI: http://themehoney.com/plugins
 * Description: This plugin adds a portfolio to your Theme Honey WordPress theme.
 * Version: 2.0.0
 * Author: Theme Honey
 * Author URI: http://themehoney.com
 */
// Add portfolio Custom Post Type
add_action('init', 'register_theme_honey_portfolio');
	function register_theme_honey_portfolio() {
		$labels = array(
	    'name'               => 'Portfolio',
	    'singular_name'      => 'Portfolio Item',
	    'add_new'            => 'Add New',
	    'add_new_item'       => 'Add New Item',
	    'edit_item'          => 'Edit Item',
	    'new_item'           => 'New Item',
	    'view_item'          => 'View Item',
	    'search_items'       => 'Search Portfolio',
	    'not_found'          => 'Nothing found',
	    'not_found_in_trash' => 'Nothing found in Trash',
	    'parent_item_colon'  => '',
	    'menu_name'          => 'Portfolio',
		);
		$args = array(
	    'labels'                => $labels,
	    'public'                => true,
	    'publicly_queryable'    => true,
	    'show_ui'               => true,
	    'query_var'             => true,
	    'menu_icon'             => 'dashicons-megaphone',
	    'rewrite'               => true,
	    'capability_type'       => 'post',
	    'hierarchical'          => true,
	    'menu_position'         => 5,
	    'rewrite'               => array('slug' => 'portfolio'),
	    'supports'              => array('title','editor','thumbnail'),
	    'taxonomies'            => array('')
	  ); 
	register_post_type( 'thportfolio' , $args );
};
// Flush Permalinks Upon Activation
function theme_honey_rewrite_flush() {
  register_theme_honey_portfolio();
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'theme_honey_rewrite_flush' );
// Single Page Templates
function themehoney_single_cpt_template($single_template) {
	global $post;
	if ($post->post_type == 'thportfolio') {
	  $single_template = dirname( __FILE__ ) . '/templates/single-thportfolio.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'themehoney_single_cpt_template' );
// Archive Page Template
function themehoney_archive_cpt_template( $archive_template ) {
	global $post;
	if ( is_post_type_archive ( 'thportfolio' ) ) {
	  $archive_template = dirname( __FILE__ ) . '/templates/archive-thportfolio.php';
	}
	return $archive_template;
}
add_filter( 'archive_template', 'themehoney_archive_cpt_template' ) ;
// Add a Page Template • https://github.com/wpexplorer/page-templater
class PageTemplater {
	private static $instance;
	protected $templates;
	public static function get_instance() {
		if( null == self::$instance ) {
		self::$instance = new PageTemplater();
		} 
		return self::$instance;
		} 
		private function __construct() {
		$this->templates = array();
		add_filter(
		'page_attributes_dropdown_pages_args',
		array( $this, 'register_project_templates' ) 
		);
		add_filter(
		'wp_insert_post_data', 
		array( $this, 'register_project_templates' ) 
		);
		add_filter(
		'template_include', 
		array( $this, 'view_project_template') 
		);
		$this->templates = array(
		'templates/archive-thportfolio.php'     => 'Portfolio Page',
		);
		} 
		public function register_project_templates( $atts ) {
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
		$templates = array();
		} 
		wp_cache_delete( $cache_key , 'themes');
		$templates = array_merge( $templates, $this->templates );
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );
		return $atts;
		} 
		public function view_project_template( $template ) {
		global $post;
		if (!isset($this->templates[get_post_meta( 
		$post->ID, '_wp_page_template', true 
		)] ) ) {
		return $template;
		} 
		$file = plugin_dir_path(__FILE__). get_post_meta( 
		$post->ID, '_wp_page_template', true 
		);
		if( file_exists( $file ) ) {
		return $file;
		} 
		else { echo $file; }
		return $template;
		} 
	} 
add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );
?>