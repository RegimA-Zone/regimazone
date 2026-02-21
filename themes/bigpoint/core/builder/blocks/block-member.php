<?php
/**
 * Lollum
 * 
 * The template for displaying the member block
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */

if (!function_exists('lolfmk_print_member')) {
	function lolfmk_print_member($item) {
		$header_text = lolfmk_find_xml_value($item, 'header-text');
		$member_id = lolfmk_find_xml_value($item, 'member-id');

		$args = array(
			'post_type' => 'lolfmk-team',
			'p' => $member_id
		);

		if ($header_text != '') {
			echo '<div class="divider"><h3>'.$header_text.'</h3></div>';
		}

		$member_query = new WP_Query($args);
		while($member_query->have_posts()) : $member_query->the_post();
			$member_description = get_post_meta($member_id, 'lolfmkbox_member_desc', true);
			$member_url = get_post_meta($member_id, 'lolfmkbox_member_url', true);
			$member_position = get_post_meta($member_id, 'lolfmkbox_member_job', true);
			$member_facebook = get_post_meta($member_id, 'lolfmkbox_t_facebook', true);
			$member_twitter = get_post_meta($member_id, 'lolfmkbox_t_twitter', true);
			$member_google = get_post_meta($member_id, 'lolfmkbox_t_google', true);
			$member_linkedin = get_post_meta($member_id, 'lolfmkbox_t_linkedin', true);
			$member_instagram = get_post_meta($member_id, 'lolfmkbox_t_instagram', true);
			$member_email = get_post_meta($member_id, 'lolfmkbox_t_email', true);
			$member_dribbble = get_post_meta($member_id, 'lolfmkbox_t_dribbble', true);
			?>

			<div class="lol-item-member">
				<div class="member-thumbnail">
					<?php if ($member_url != '') : ?>
						<a href="<?php echo esc_url( $member_url ); ?>">
					<?php endif; ?>
					<?php the_post_thumbnail('square-thumb'); ?>
					<?php if ($member_url != '') : ?>
						</a>
					<?php endif; ?>
				</div>
				<div class="meta-member">
					<div class="member-name">
						<h3><?php the_title(); ?></h3>
						<span><?php echo $member_position; ?></span>
					</div>
					<p><?php echo $member_description; ?></p>
					<ul class="member-links">

						<?php $target = ( ( get_option( 'lol_check_social_target' )  == 'true' ) ? 'target="_blank"' : '' ); ?>

						<?php
						if ($member_facebook != '') {
							echo '<li><a href="'.$member_facebook.'" title="Facebook" class="member-facebook" '.$target.'><i class="fa fa-facebook"></i></a></li>';
						}
						if ($member_twitter != '') {
							echo '<li><a href="'.$member_twitter.'" title="Twitter" class="member-twitter" '.$target.'><i class="fa fa-twitter"></i></a></li>';
						}
						if ($member_google != '') {
							echo '<li><a href="'.$member_google.'" title="Google Plus" class="member-google" '.$target.'><i class="fa fa-google-plus"></i></a></li>';
						}
						if ($member_dribbble != '') {
							echo '<li><a href="'.$member_dribbble.'" title="Dribbble" class="member-dribbble" '.$target.'><i class="fa fa-dribbble"></i></a></li>';
						}
						if ($member_linkedin != '') {
							echo '<li><a href="'.$member_linkedin.'" title="LinkedIn" class="member-linkedin" '.$target.'><i class="fa fa-linkedin"></i></a></li>';
						}
						if ($member_instagram != '') {
							echo '<li><a href="'.$member_instagram.'" title="Instagram" class="member-instagram" '.$target.'><i class="fa fa-instagram"></i></a></li>';
						}
						if ($member_email != '') {
							echo '<li><a href="mailto:'.$member_email.'" title="'.$member_email.'" class="member-email"><i class="fa fa-envelope"></i></a></li>';
						}
						?>
					</ul>
				</div>
			</div>

		<?php endwhile;
		wp_reset_postdata();
	}
}