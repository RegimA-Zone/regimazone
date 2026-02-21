<?php
/**
 * Lollum
 * 
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */
?>

<!-- BEGIN #footer -->
<footer id="footer" class="<?php echo get_option('lol_footer_style'); ?>" role="contentinfo">
	<div class="container">

		<div class="footer-widgets">

			<!-- BEGIN row -->
			<div class="row">
			
				<!-- BEGIN col-3 -->
				<div class="lm-col-3">
					<div class="footer-widget footer-widget-1">
						<?php dynamic_sidebar('footer1'); ?>
					</div>
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="lm-col-3">
					<div class="footer-widget footer-widget-2">
						<?php dynamic_sidebar('footer2'); ?>
					</div>
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="lm-col-3">
					<div class="footer-widget footer-widget-3">
						<?php dynamic_sidebar('footer3'); ?>
					</div>
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="lm-col-3">
					<div class="footer-widget footer-widget-4">
						<?php dynamic_sidebar('footer4'); ?>
					</div>
				</div>
				<!-- END col-3 -->
			
			</div>
			<!-- END row -->

		</div>

	</div>
</footer>
<!-- END #footer -->

<?php if (get_option('lol_footer_bottom_check')  == 'true') { ?>

<!-- BEGIN #footer-bottom -->
<div id="footer-bottom" class="<?php echo get_option('lol_footer_style'); ?>">
	<div class="container">

		<div class="footer-bottom-inner">

			<!-- BEGIN row -->
			<div class="row">

				<div class="<?php echo (get_option('lol_check_social_footer')  == 'true') ? "lm-col-6" : "lm-col-12" ?>">
					<div class="footer-bottom-copy">
						<?php echo get_option('lol_footer_copy'); ?>
					</div>
				</div>

				<?php if (get_option('lol_check_social_footer')  == 'true') { ?>

					<?php $target = ( ( get_option( 'lol_check_social_target' )  == 'true' ) ? 'target="_blank"' : '' ); ?>

					<div class="lm-col-6">

						<ul class="social-links">
							<?php if (get_option('lol_f_facebook') != '') : ?>
								<li><a class="lol-facebook" href="<?php echo get_option('lol_f_facebook'); ?>" <?php echo $target; ?> title="Facebook">Facebook</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_twitter') != '') : ?>
								<li><a class="lol-twitter" href="<?php echo get_option('lol_f_twitter'); ?>" <?php echo $target; ?> title="Twitter">Twitter</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_dribbble') != '') : ?>
								<li><a class="lol-dribbble" href="<?php echo get_option('lol_f_dribbble'); ?>" <?php echo $target; ?> title="Dribbble">Dribbble</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_linkedin') != '') : ?>
								<li><a class="lol-linkedin" href="<?php echo get_option('lol_f_linkedin'); ?>" <?php echo $target; ?> title="Linkedin">Linkedin</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_flickr') != '') : ?>
								<li><a class="lol-flickr" href="<?php echo get_option('lol_f_flickr'); ?>" <?php echo $target; ?> title="Flickr">Flickr</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_tumblr') != '') : ?>
								<li><a class="lol-tumblr" href="<?php echo get_option('lol_f_tumblr'); ?>" <?php echo $target; ?> title="Tumblr">Tumblr</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_vimeo') != '') : ?>
								<li><a class="lol-vimeo" href="<?php echo get_option('lol_f_vimeo'); ?>" <?php echo $target; ?> title="Vimeo">Vimeo</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_vine') != '') : ?>
								<li><a class="lol-vine" href="<?php echo get_option('lol_f_vine'); ?>" <?php echo $target; ?> title="Vine">Vine</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_youtube') != '') : ?>
								<li><a class="lol-youtube" href="<?php echo get_option('lol_f_youtube'); ?>" <?php echo $target; ?> title="Youtube">Youtube</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_instagram') != '') : ?>
								<li><a class="lol-instagram" href="<?php echo get_option('lol_f_instagram'); ?>" <?php echo $target; ?> title="Instagram">Instagram</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_google') != '') : ?>
								<li><a class="lol-google" href="<?php echo get_option('lol_f_google'); ?>" <?php echo $target; ?> title="Google Plus">Google Plus</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_stumbleupon') != '') : ?>
								<li><a class="lol-stumbleupon" href="<?php echo get_option('lol_f_stumbleupon'); ?>" <?php echo $target; ?> title="StumbleUpon">StumbleUpon</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_forrst') != '') : ?>
								<li><a class="lol-forrst" href="<?php echo get_option('lol_f_forrst'); ?>" <?php echo $target; ?> title="Forrst">Forrst</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_behance') != '') : ?>
								<li><a class="lol-behance" href="<?php echo get_option('lol_f_behance'); ?>" <?php echo $target; ?> title="Behance">Behance</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_digg') != '') : ?>
								<li><a class="lol-digg" href="<?php echo get_option('lol_f_digg'); ?>" <?php echo $target; ?> title="Digg">Digg</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_delicious') != '') : ?>
								<li><a class="lol-delicious" href="<?php echo get_option('lol_f_delicious'); ?>" <?php echo $target; ?> title="Delicious">Delicious</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_deviantart') != '') : ?>
								<li><a class="lol-deviantart" href="<?php echo get_option('lol_f_deviantart'); ?>" <?php echo $target; ?> title="DeviantArt">DeviantArt</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_foursquare') != '') : ?>
								<li><a class="lol-foursquare" href="<?php echo get_option('lol_f_foursquare'); ?>" <?php echo $target; ?> title="Foursquare">Foursquare</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_github' )!= '') : ?>
								<li><a class="lol-github" href="<?php echo get_option('lol_f_github'); ?>" <?php echo $target; ?> title="GitHub">GitHub</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_myspace') != '') : ?>
								<li><a class="lol-myspace" href="<?php echo get_option('lol_f_myspace'); ?>" <?php echo $target; ?> title="MySpace">MySpace</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_orkut') != '') : ?>
								<li><a class="lol-orkut" href="<?php echo get_option('lol_f_orkut'); ?>" <?php echo $target; ?> title="Orkut">Orkut</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_pinterest') != '') : ?>
								<li><a class="lol-pinterest" href="<?php echo get_option('lol_f_pinterest'); ?>" <?php echo $target; ?> title="Pinterest">Pinterest</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_soundcloud') != '') : ?>
								<li><a class="lol-soundcloud" href="<?php echo get_option('lol_f_soundcloud'); ?>" <?php echo $target; ?> title="SoundCloud">SoundCloud</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_stackoverflow') != '') : ?>
								<li><a class="lol-stackoverflow" href="<?php echo get_option('lol_f_stackoverflow'); ?>" <?php echo $target; ?> title="Stack Overflow">Stack Overflow</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_skype') != '') : ?>
								<li><a class="lol-skype" href="skype:<?php echo get_option('lol_f_skype'); ?>?call" <?php echo $target; ?> title="Skype">Skype</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_vk') != '') : ?>
								<li><a class="lol-vk" href="<?php echo get_option('lol_f_vk'); ?>" <?php echo $target; ?> title="VK">VK</a></li>
							<?php endif; ?>
							<?php if (get_option('lol_f_rss') != '') : ?>
								<li><a class="lol-rss" href="<?php echo get_option('lol_f_rss'); ?>" <?php echo $target; ?> title="RSS">RSS</a></li>
							<?php endif; ?>
						</ul>

					</div>

				<?php } ?>

			</div>

		</div>
		<!-- END row -->

	</div>
</div>
<!-- END #footer-bottom -->
<?php } ?>

<a href="#" id="back-top"><i class="fa fa-angle-up"></i></a>

<?php do_action( 'lollum_woocommerce_store_notice'); ?>

</div>
<!-- END wrap -->

<?php
// Analitycs
if ($g_analitycs = get_option('lol_google_analytics')) {
	echo stripslashes($g_analitycs);
} ?>

<?php wp_footer(); ?>
</body>
</html>
