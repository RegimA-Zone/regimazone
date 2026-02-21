<?php
/**
 * Lollum
 * 
 * The template for displaying Archive Portfolio pages
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
					<h1><?php _e('All Projects', 'lollum'); ?></h1>
				</div>
			</div>
			<!-- END col-12 -->
		</div>
		<!-- END row -->
	</div>
</div>

<?php } ?>

<!-- BEGIN #page -->
<div id="page" class="hfeed template-portfolio four-columns">

<!-- BEGIN #main -->
<div id="main">
	
	<?php rewind_posts(); ?>

	<!-- BEGIN #content -->
	<div id="content" role="main">

		<!-- BEGIN #post -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="container">

				<!-- BEGIN row -->
				<div class="row">
					<!-- BEGIN col-12 -->
					<div class="lm-col-12">
					
						<div class="section-portfolio-items">
							<?php $count = 0; ?>

							<?php // START the loop ?>
							<?php while (have_posts()) : the_post();
							
							$open = !($count%4) ? '<div class="row">' : '';
							$close = !($count%4) && $count ? '</div>' : '';
							echo $close.$open;

							$portfolio_description = get_post_meta($post->ID, 'lolfmkbox_portfolio_desc', true); ?>

							<div class="portfolio-item lm-col-3">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="portfolio-mask">
									<div class="portfolio-link">
										<i class="fa fa-search"></i>
									</div>
									<span><?php _e('View', 'lollum'); ?></span>
									<div class="project-thumb">
										<?php the_post_thumbnail('featured-thumb'); ?>
									</div>
								</a>
								<div class="portfolio-meta">
									<div class="project-categories">
										<?php the_terms($post->ID, 'portfolio-categories', '', '', ''); ?>
									</div>
									<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<?php lolfmk_display_love_link($post->ID); ?>
								</div>
								<p><?php echo $portfolio_description; ?></p>
							</div>

							<?php $count++; ?>

							<?php endwhile; ?>
							<?php // END the loop ?>

							<?php echo $count ? '</div>' : ''; ?>
						</div>

						<?php lollum_pagination(); ?>

					</div>
					<!-- END col-12 -->
				</div>
				<!-- END row -->

			</div>

		</article>
		<!-- END #post -->
		
	</div>
	<!-- END #content -->

<!-- END #main -->
</div>

</div>
<!-- END #page -->

<?php endif; ?>
<?php // END if have posts ?>

<?php get_footer(); ?>