<?php
/**
 * Lollum
 * 
 * Register Google web fonts
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */

add_action('wp_enqueue_scripts', 'lollum_google_fonts');
if (!function_exists('lollum_google_fonts')) {
	function lollum_google_fonts() {
		global $google_fonts;
		$primary_font = get_option('lol_primary_font');
		$secondary_font = get_option('lol_secondary_font');
		if (in_array($primary_font, $google_fonts)) {
			$primary_font_web = true;
			$f_primary = str_replace(" ", "+", $primary_font);  
		}
		if (isset($primary_font_web)) {
			$protocol = is_ssl() ? 'https' : 'http';
			$w1 = get_option('lol_ff_normal');
			$w2 = get_option('lol_ff_semibold');
			$w3 = get_option('lol_ff_bold');
			$w4 = get_option('lol_ff_light');
			wp_enqueue_style('f-primary-300', $protocol.'://fonts.googleapis.com/css?family='.$f_primary.':'.$w4.'');
			wp_enqueue_style('f-primary-400', $protocol.'://fonts.googleapis.com/css?family='.$f_primary.':'.$w1.'');
			wp_enqueue_style('f-primary-400i', $protocol.'://fonts.googleapis.com/css?family='.$f_primary.':'.$w1.'italic');
			wp_enqueue_style('f-primary-600', $protocol.'://fonts.googleapis.com/css?family='.$f_primary.':'.$w2.'');
			wp_enqueue_style('f-primary-700', $protocol.'://fonts.googleapis.com/css?family='.$f_primary.':'.$w3.'');
		}
		if (in_array($secondary_font, $google_fonts)) {
			$secondary_font_web = true;
			$f_secondary = str_replace(" ", "+", $secondary_font);  
		}
		if (isset($secondary_font_web)&&($secondary_font != $primary_font)) {
			$protocol = is_ssl() ? 'https' : 'http';
			$sw1 = get_option('lol_sf_normal');
			$sw2 = get_option('lol_sf_bold');
			wp_enqueue_style('f-secondary-400', $protocol.'://fonts.googleapis.com/css?family='.$f_secondary.':'.$sw1.'');
			wp_enqueue_style('f-secondary-700', $protocol.'://fonts.googleapis.com/css?family='.$f_secondary.':'.$sw2.'');
		}
	}
}