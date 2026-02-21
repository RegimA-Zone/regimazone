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
* process form
******************************/

function lolfmk_process_form() {
	$m_api = get_option( 'lol_mailchimp_api' );
	if ( empty( $m_api ) ) {
		echo '<div class="lol_newsletter_message lol_newsletter_error"><i class="fa fa-exclamation"></i>' . apply_filters( 'lolfmk_newsletter_api_error_filter', __( 'Please insert a correct MailChimp API key in the theme panel', 'lollum' ) ) . '</div>';
	} elseif ( empty( $_POST[ 'm_list_id' ] ) ) {
		echo '<div class="lol_newsletter_message lol_newsletter_error"><i class="fa fa-exclamation"></i>' . apply_filters( 'lolfmk_newsletter_id_error_filter', __( 'Please insert the ID of your MailChimp list', 'lollum' ) ) . '</div>';
	} else {
		$display_name = false;
		$welcome = false;
		$opt_in = false;
		if ( isset( $_POST[ 'm_display_name' ] ) && $_POST[ 'm_display_name' ] == 'yes' ) {
			$display_name = true;
		}
		if ( isset( $_POST[ 'm_confirm' ] ) &&  $_POST[ 'm_confirm' ] != 'nothing' ) {
			$welcome = true;
		}
		if ( isset( $_POST[ 'm_confirm' ] ) &&  $_POST[ 'm_confirm' ] == 'opt-in' ) {
			$opt_in = true;
		}
		if ( $display_name && ( empty( $_POST[ 'm_first_name' ] ) || empty( $_POST[ 'm_last_name' ] ) ) ) {
			echo '<div class="lol_newsletter_message lol_newsletter_error"><i class="fa fa-exclamation"></i>' . apply_filters( 'lolfmk_newsletter_names_error_filter', __( 'Please fill the "First Name" and the "Last Name" fields', 'lollum' ) ) . '</div>';
		}
		if ( empty( $_POST[ 'm_email' ] ) || !is_email( $_POST[ 'm_email' ] ) ) {
			echo '<div class="lol_newsletter_message lol_newsletter_error"><i class="fa fa-exclamation"></i>' . apply_filters( 'lolfmk_newsletter_email_error_filter', __( 'Please add a correct email address', 'lollum' ) ) . '</div>';
		}
		if ( ( $display_name && !empty( $_POST[ 'm_first_name' ] ) && !empty( $_POST[ 'm_last_name' ] ) && !empty( $_POST[ 'm_email' ] ) && is_email( $_POST[ 'm_email' ] ) ) || ( !$display_name && !empty( $_POST[ 'm_email' ] ) && is_email( $_POST[ 'm_email' ] ) ) ) {
			
			$MailChimp = new Drewm_MailChimp( $m_api );
			$result = $MailChimp->call( 'lists/subscribe', array(
				'id'                => sanitize_text_field( $_POST[ 'm_list_id' ] ),
				'email'             => array( 'email' => sanitize_email( $_POST[ 'm_email' ] ) ),
				'merge_vars'        => ($display_name ? array( 'FNAME' => sanitize_text_field( $_POST[ 'm_first_name' ] ), 'LNAME' => sanitize_text_field( $_POST[ 'm_last_name' ] ) ) : array() ),
				'double_optin'      => $opt_in,
				'update_existing'   => true,
				'replace_interests' => false,
				'send_welcome'      => $welcome,
			) );

			echo '<div class="lol_newsletter_message lol_newsletter_success"><i class="fa fa-check"></i>' . apply_filters( 'lolfmk_newsletter_success_filter', __( 'Thank you for subscribing!', 'lollum' ) ) . '</div>';
		}
	}
	die();
}
add_action('wp_ajax_lolfmk_process_form_a', 'lolfmk_process_form');
add_action('wp_ajax_nopriv_lolfmk_process_form_a', 'lolfmk_process_form');


/******************************
* localize script
******************************/

function lolfmk_mailchimp_js() {
	global $lolfmk_version;
	wp_enqueue_script('mailchimp-js', plugin_dir_url( __FILE__ ).'mailchimp.js', array('jquery'), $lolfmk_version, 1 );
	wp_localize_script( 'mailchimp-js', 'lolfmk_process_form_a_vars', 
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce('lolfmk-mailchimp-form-nonce')
		) 
	);	
}
add_action('wp_enqueue_scripts', 'lolfmk_mailchimp_js');
