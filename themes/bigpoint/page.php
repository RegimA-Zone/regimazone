<?php
/**
 * Lollum
 * 
 * The template for displaying all pages
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */
?>

<?php get_header(); ?>

<?php
if(function_exists('putRevSlider')) {
	if (get_post_meta($post->ID, 'lolfmkbox_slider_rev_alias', true)) {
		$slider_selected = get_post_meta($post->ID, 'lolfmkbox_slider_rev_alias', true); ?>
		
		<div class="page-slider header-slider">
			<?php putRevSlider(''.$slider_selected.''); ?>

			<?php if (get_post_meta($post->ID, 'lolfmkbox_page_link_slider', true)) { ?>
			<div class="link-slider">
				<div class="container">
					<div class="row">
						<div class="lm-col-12">
							<a href="#page"><?php echo get_post_meta($post->ID, 'lolfmkbox_page_link_slider', true); ?><i class="fa fa-chevron-circle-down"></i></a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>

		</div>

		<?php
	} 
} ?>

<?php if (!get_post_meta($post->ID, 'lolfmkbox_headline_check', true) == 'yes' && !(get_option('lol_check_page_header') == 'true')) { ?>

	<div id="page-title-wrap">
		<div class="container">
			<!-- BEGIN row -->
			<div class="row">
				<!-- BEGIN col-12 -->
				<div class="lm-col-12">
					<div class="page-title">
						<h1><?php the_title(); ?></h1>
						<?php lollum_breadcrumb(); ?>
					</div>
				</div>
				<!-- END col-12 -->
			</div>
			<!-- END row -->
		</div>
	</div>

<?php } ?>

<!-- BEGIN #page -->
<div id="page" class="hfeed">

<!-- BEGIN #main -->
<div id="main">
	
	<?php // START the loop ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php
		$lol_page_margin_top = ( get_post_meta( $post->ID, 'lolfmkbox_page_margin_check_top', true ) == 'yes' ) ? 'no-margin-top' : '';
		$lol_page_margin_bottom = ( get_post_meta( $post->ID, 'lolfmkbox_page_margin_check', true ) == 'yes' ) ? 'no-margin-bottom' : '';
		?>

		<!-- BEGIN #content -->
		<div id="content" class="<?php echo $lol_page_margin_top; ?> <?php echo $lol_page_margin_bottom; ?>" role="main">

			<?php get_template_part('content/content', 'page'); ?>

		</div>
		<!-- END #content -->
				
	<?php endwhile; ?>
	<?php // END the loop ?>

<!-- END #main -->
</div>

</div>
<!-- END #page -->

<?php get_footer(); ?>