<?php
/**
 * Lollum
 * 
 * The Template for displaying all single jobs
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */
?>

<?php get_header(); ?>

<?php if (!(get_option('lol_check_page_header') == 'true')) { ?>

<div id="page-title-wrap">
	<div class="container">
		<!-- BEGIN row -->
		<div class="row">
			<!-- BEGIN col-12 -->
			<div class="lm-col-12">
				<div class="page-title">
					<h3><?php the_title(); ?></h3>
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
	
	<!-- BEGIN row -->
	<div class="row">
		<!-- BEGIN col-9 -->
		<div class="lm-col-9">
	
			<!-- BEGIN #content -->
			<div id="content" role="main">
				
				<?php // START the loop ?>
				<?php while (have_posts()) : the_post(); ?>

					<?php
					$job_location = get_post_meta($post->ID, 'lolfmkbox_job_location', true);
					$job_responsibilities = get_post_meta($post->ID, 'lolfmkbox_job_responsibilities', true);
					$job_skills_n = get_post_meta($post->ID, 'lolfmkbox_job_skills_n', true);
					$job_skills_d = get_post_meta($post->ID, 'lolfmkbox_job_skills_d', true);
					$job_form = get_post_meta($post->ID, 'lolfmkbox_job_form', true);
					$job_lat = get_post_meta($post->ID, 'lolfmkbox_job_lat', true);
					$job_lng = get_post_meta($post->ID, 'lolfmkbox_job_lng', true);
					$job_zoom = get_post_meta($post->ID, 'lolfmkbox_job_zoom', true);
					?>

					<!-- BEGIN #post -->
					<article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>

						<?php if ($job_lat !='' && $job_lng !='') { ?>
							<div class="map-canvas-wrapper" data-lat="<?php echo $job_lat; ?>" data-lng="<?php echo $job_lng; ?>" data-zoom="<?php echo $job_zoom; ?>" data-uri="<?php echo LOLLUM_URI; ?>">
								<div class="map-canvas normal"></div>
							</div>

						<?php } ?>

						<!-- BEGIN .entry-header -->
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php lollum_header_jobs($post->ID); ?>
						</header>
						<!-- END .entry-header -->

						<!-- BEGIN .entry-conent -->
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<!-- END .entry-conent -->
						
						<?php if (get_option('lol_check_sharer_jobs')  == 'true') { ?>

						<!-- BEGIN footer .entry-meta -->
						<?php lollum_footer_posts($post->ID); ?>
						<!-- END footer .entry-meta -->

						<?php } ?>

						<?php if ($job_responsibilities != '') { ?>
							<div class="divider">
								<h3><?php _e('Responsibilities:', 'lollum'); ?></h3>
							</div>
							<div class="job-meta">
								<?php echo do_shortcode($job_responsibilities); ?>
							</div>
						<?php } ?>

						<?php if ($job_skills_n != '') { ?>
							<div class="divider">
								<h3><?php _e('Essentials Skills:', 'lollum'); ?></h3>
							</div>
							<div class="job-meta">
								<?php echo do_shortcode($job_skills_n); ?>
							</div>
						<?php } ?>

						<?php if ($job_skills_d != '') { ?>
							<div class="divider">
								<h3><?php _e('Desirable Skills:', 'lollum'); ?></h3>
							</div>
							<div class="job-meta">
								<?php echo do_shortcode($job_skills_d); ?>
							</div>
						<?php } ?>

						<?php if ($job_form != '') { ?>
							<div class="divider">
								<h3><?php _e('Application:', 'lollum'); ?></h3>
							</div>
							<div class="job-form">
								<p class="job-form-description"><?php _e('To submit your application please complete the form below. Fields marhed with an asterisk <span>*</span> are required. When you have finished click <strong>Apply</strong> at the bottom of this form.', 'lollum'); ?></p>
								<?php echo do_shortcode(''.$job_form.''); ?>
							</div>
						<?php } ?>

					</article>
					<!-- END #post -->

				<?php endwhile; ?>
				<?php // END the loop ?>

			</div>
			<!-- END #content -->
	
		</div>
		<!-- END col-9 -->

	<?php get_sidebar('job'); ?>

<!-- END #main -->
</div>

</div>
<!-- END #page -->

<?php get_footer(); ?>