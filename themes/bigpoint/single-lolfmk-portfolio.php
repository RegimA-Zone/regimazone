<?php
/**
 * Lollum
 * 
 * The Template for displaying all single projects
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
	
	<?php // START the loop ?>
	<?php while (have_posts()) : the_post(); ?>

		<!-- BEGIN row -->
		<div class="row">
			<!-- BEGIN col-12 -->
			<div class="lm-col-12">

				<!-- BEGIN #content -->
				<div id="content" role="main">

					<div class="projects-navigation-wrap">

						<div class="projects-navigation">
							<?php previous_post_link('%link', __('&laquo;', 'lollum')); ?>
							<?php next_post_link('%link', __('&raquo;', 'lollum')); ?>
						</div>

						<div class="projects-links">

						<?php lolfmk_display_love_link($post->ID); ?>

						<?php if (get_option('lol_check_sharer_projects')  == 'true') {
							lollum_show_sharer();
						} ?>

						</div>

					</div>

					<!-- BEGIN #post -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php
						$lol_portfolio_type = get_post_meta($post->ID, 'lolfmkbox_portfolio_type', true);

						if ($lol_portfolio_type == 'video') {

							echo '<div class="entry-video">';

							$embed = get_post_meta($post->ID, 'lolfmkbox_portfolio_embed_video', true);
							if(!empty($embed)) {
								echo '<div class="video-frame">';
								echo stripslashes(htmlspecialchars_decode($embed));
								echo '</div>';
							} else {
								lollum_show_video($post->ID, 'portfolio');
							}

							echo '</div>';

						} elseif ($lol_portfolio_type == 'slider') { ?>

							<!-- BEGIN .entry-gallery -->
							<div class="entry-gallery">
								<?php lollum_show_gallery($post->ID, 'project-thumb', 'single'); ?>
							</div>
							<!-- END .entry-gallery -->

						<?php } else { ?>

							<!-- BEGIN .entry-thumbnail -->
							<?php if (has_post_thumbnail()) : ?>

								<div class="entry-thumbnail">
									<?php the_post_thumbnail('project-thumb'); ?>
								</div>

							<?php endif; ?>
							<!-- END .entry-thumbnail -->

						<?php } ?>

						<!-- BEGIN .entry-header -->
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</header>
						<!-- END .entry-header -->

						<div class="row project-description">

							<div class="lm-col-8">

								<?php the_content(); ?>

							</div>

							<div class="lm-col-4">

								<div class="project-details">
									<?php
									$portfolio_date = get_post_meta($post->ID, 'lolfmkbox_portfolio_date', true);
									$portfolio_date_label = get_post_meta($post->ID, 'lolfmkbox_portfolio_date_label', true);
									$portfolio_client = get_post_meta($post->ID, 'lolfmkbox_portfolio_client', true);	
									$portfolio_client_label = get_post_meta($post->ID, 'lolfmkbox_portfolio_client_label', true);	
									$portfolio_skills = get_post_meta($post->ID, 'lolfmkbox_portfolio_skills', true);
									$portfolio_skills_label = get_post_meta($post->ID, 'lolfmkbox_portfolio_skills_label', true);
									$portfolio_url = get_post_meta($post->ID, 'lolfmkbox_portfolio_url', true);
									$portfolio_url_label = get_post_meta($post->ID, 'lolfmkbox_portfolio_url_label', true);
									?>
									<?php if ($portfolio_date) { ?>
										<div><span><?php echo $portfolio_date_label; ?>:</span><?php echo $portfolio_date; ?></div>
									<?php } ?>
									<?php if ($portfolio_client) { ?>
										<div><span><?php echo $portfolio_client_label; ?>:</span><?php echo $portfolio_client; ?></div>
									<?php } ?>
									<?php if ($portfolio_skills) { ?>
										<div><span><?php echo $portfolio_skills_label; ?>:</span><?php echo $portfolio_skills; ?></div>
									<?php } ?>
									<?php if ($portfolio_url) { ?>
										<div><span><?php echo $portfolio_url_label; ?>:</span><?php echo $portfolio_url; ?></div>
									<?php } ?>
									<div class="project-categories">
										<?php the_terms($post->ID, 'portfolio-categories', '<span>Tags:</span>', ', ', ''); ?>
									</div>
								</div>

							</div>

						</div>

						<?php
						$terms = get_the_terms( $post->ID, 'portfolio-categories' );
						if (!empty($terms)) {
							foreach ( $terms as $term ) {
								$category_terms[] = $term->term_id;
							}

							$args = array(
								'post_type' => 'lolfmk-portfolio',
								'tax_query' => array(
									array(
										'taxonomy' => 'portfolio-categories',
										'field' => 'term_id',
										'terms' => $category_terms
									)
								),
								'post__not_in' => array($post->ID),
								'posts_per_page'=> 4
							);

							$query = new WP_Query($args);

							if ($query->have_posts()) { ?>

								<aside class="related-projects">

									<div class="divider"><h3><?php _e('Related products', 'lollum'); ?></h3></div>

									<!-- BEGIN row -->
									<div class="row">

									<?php while ($query->have_posts()) : $query->the_post();
									global $post;
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

									<?php
									endwhile;
									wp_reset_postdata();
									?>

									<!-- END row -->
									</div>

								</aside>

							<?php
							}
						}
						?>

					</article>
					<!-- END #post -->
					
				</div>
				<!-- END #content -->

			</div>
			<!-- END col-12 -->

		<!-- END row -->
		</div>

	<?php endwhile; ?>
	<?php // END the loop ?>

<!-- END #main -->
</div>

</div>
<!-- END #page -->

<?php get_footer(); ?>