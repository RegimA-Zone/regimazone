<?php
/**
 * Lollum
 * 
 * The template for displaying Archive Job pages
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */
?>

<?php get_header(); ?>

<?php // START if have posts ?>
<?php if (have_posts()) : ?>

<?php if (!(get_option('lol_check_page_header') == 'true')) { ?>

<div id="page-title-wrap">
	<div class="container">
		<!-- BEGIN row -->
		<div class="row">
			<!-- BEGIN col-12 -->
			<div class="lm-col-12">
				<div class="page-title">
					<h3><?php _e('All Jobs', 'lollum'); ?></h3>
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
<div id="main" class="container">

		<?php rewind_posts(); ?>

		<!-- BEGIN row -->
		<div class="row">
			<!-- BEGIN col-9 -->
			<div class="lm-col-9">

				<!-- BEGIN #content -->
				<div id="content" role="main">

					<div class="job-list">

					<?php // START the loop ?>
					<?php while (have_posts()) : the_post(); ?>

						<?php
						$job_location = get_post_meta($post->ID, 'lolfmkbox_job_location', true);
						?>

						<div class="entry-job">
							<div class="meta-job-wrap">
								<h4><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'lollum'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
								<div class="meta-job"><?php _e('Published on ', 'lollum'); ?><?php the_time('F j, Y'); ?></div>
							</div>
							<span class="meta-job-location"><?php echo $job_location; ?></span>
						</div>

					<?php endwhile; ?>
					<?php // END the loop ?>

					</div>

					<?php lollum_pagination(); ?>

				</div>
				<!-- END #content -->

			</div>
			<!-- END col-9 -->

	<?php endif; ?>
	<?php // END if have posts ?>

	<?php get_sidebar('job'); ?>

<!-- END #main -->
</div>

</div>
<!-- END #page -->

<?php get_footer(); ?>