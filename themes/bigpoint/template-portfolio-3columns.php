<?php
/**
 * Lollum
 * 
 * The Template for displaying Portoflio pages with 3 columns
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */
/*
Template Name: Portfolio Template (3 columns)
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

<?php
if(function_exists('putRevSlider')) {
	if (get_post_meta($post->ID, 'lolfmkbox_slider_rev_alias', true)) {
	$slider_selected = get_post_meta($post->ID, 'lolfmkbox_slider_rev_alias', true); ?>
	
	<div class="page-slider header-slider">
		<?php putRevSlider(''.$slider_selected.''); ?>
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
<div id="page" class="hfeed template-portfolio three-columns">

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

			<!-- BEGIN #post -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if (lollum_check_is_lollumframework() && (get_option('lolfmk_support_page_builder') == 'yes')) { ?>

					<!-- BEGIN .entry-page-items -->
					<div class="entry-page-items">
						<?php get_template_part('content/content', 'page-items'); ?>
					</div>
					<!-- END .entry-page-items -->

				<?php } ?>

				<?php endwhile; ?>
				<?php // END the loop ?>

				<div class="container">
					<!-- BEGIN row -->
					<div class="row">
						<!-- BEGIN col-12 -->
						<div class="lm-col-12">

							<?php if (!lollum_check_is_lollumframework()) {
								the_content();
							} else { ?>

								<!-- BEGIN .entry-portfolio -->
								<div class="entry-portfolio">
									<?php

									$portfolio_settings = get_post_meta($post->ID, 'lolfmkbox_portfolio_settings', true);
									$portfolio_limit = get_post_meta($post->ID, 'lolfmkbox_portfolio_limit', true);
									$portfolio_cats = get_post_meta($post->ID, 'lolfmkbox_portfolio_cats', true);
									$portfolio_filterable = get_post_meta($post->ID, 'lolfmkbox_portfolio_filterable', true);
									$portfolio_filter_txt = get_post_meta($post->ID, 'lolfmkbox_portfolio_filterable_text', true);
									$portfolio_temp_type = get_post_meta($post->ID, 'lolfmkbox_portfolio_temp_type', true);

									if ($portfolio_limit != 'yes') {
										$paged = get_query_var('paged') ? get_query_var('paged') : 1;
									} else {
										$paged = 1;
									}

									$args = array(
										'post_type' => 'lolfmk-portfolio',
										'orderby' => 'menu_order',
										'order' => 'ASC',
										'paged' => $paged,
										'posts_per_page' => $portfolio_settings
									);

									if (is_array($portfolio_cats) && count($portfolio_cats) > 0) {
										$args['tax_query'] = array(
											array(
											'taxonomy' => 'portfolio-categories',
											'field' => 'term_id',
											'terms' => array_values($portfolio_cats)
											),
										);
									}

									// $temp = $wp_query;
									// $wp_query= null;

									$wp_query = new WP_Query($args);

									// get all portolio's IDs

									$portfolio_ids = array();

									while ($wp_query->have_posts()) : $wp_query->the_post();

										$portfolio_ids[] = $post->ID;

									endwhile;

									rewind_posts();

									// get terms by IDs

									$portfolio_tabs_terms = wp_get_object_terms($portfolio_ids, 'portfolio-categories');

									$portfolio_tabs = array();

									foreach ($portfolio_tabs_terms as $portfolio_tabs_term) {
										$portfolio_tabs[$portfolio_tabs_term->slug] = $portfolio_tabs_term->name;
									}

									$portfolio_tabs = array_unique($portfolio_tabs);
									?>

									<?php if ((count($portfolio_ids) > 1) && $portfolio_filterable == 'yes') { ?>

										<div class="portfolio-filter">
											<?php if ($portfolio_filter_txt != '') { ?>
												<span class="filter-description"><?php echo $portfolio_filter_txt; ?></span>
											<?php } ?>
											<div class="portfolio-select">
												<select>
													<option value="*"><?php echo apply_filters( 'lol_filter_projects_label_filter', __( 'All projects', 'lollum' ) ); ?></option>
													<?php foreach($portfolio_tabs as $slug => $name): ?>
														<option value=".<?php echo $slug; ?>"><?php echo $name; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<nav class="portfolio-categories">
												<ul class="portfolio-tabs">
													<li class="active">
														<a data-filter="*" href="#"><?php _e('All', 'lollum'); ?></a>
													</li>
													<?php foreach($portfolio_tabs as $slug => $name): ?>
														<li><a data-filter=".<?php echo $slug; ?>" href="#"><?php echo $name; ?></a></li>
													<?php endforeach; ?>
												</ul>
											</nav>
										</div>

									<?php } ?>

									<?php $section_filterable = ($portfolio_filterable == 'yes') ? 'section-filterable' : ''; ?>

									<div class="row">
										<div class="lm-col-12">
											<div class="section-portfolio-items <?php echo $section_filterable; ?>">

												<?php $count = 0; ?>

												<?php while ($wp_query->have_posts()) : $wp_query->the_post();

												$open = !($count%3) ? '<div class="row">' : '';
												$close = !($count%3) && $count ? '</div>' : '';
												echo $close.$open;

												$portfolio_description = get_post_meta($post->ID, 'lolfmkbox_portfolio_desc', true);
												$item_classes = '';
												$terms = get_the_terms(get_the_ID(), 'portfolio-categories');
												if ($terms) {
													foreach($terms as $term_cat) {
														$item_classes .= $term_cat->slug . ' ';
													}
												}
												?>

												<div class="portfolio-item <?php echo $item_classes; ?> lm-col-4">
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="portfolio-mask">
														<div class="portfolio-link">
															<i class="fa fa-search"></i>
														</div>
														<span><?php _e('View', 'lollum'); ?></span>
														<div class="project-thumb">
															<?php the_post_thumbnail('featured-thumb'); ?>
														</div>
													</a>
													<?php if ($portfolio_temp_type == 'normal') { ?>
														<div class="portfolio-meta">
															<div class="project-categories">
																<?php the_terms($post->ID, 'portfolio-categories', '', '', ''); ?>
															</div>
															<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
															<?php lolfmk_display_love_link($post->ID); ?>
														</div>
														<p><?php echo $portfolio_description; ?></p>
													<?php } ?>
												</div>

												<?php $count++; ?>

												<?php endwhile; ?>
												<?php wp_reset_postdata(); ?>

												<?php echo $count ? '</div>' : ''; ?>

											</div>
										</div>
									</div>

								</div>
								<!-- END .entry-portfolio -->

								<?php
								if ($portfolio_limit != 'yes') {
									lollum_pagination();
								}
								?>

								<?php
								// $wp_query = null; 
								// $wp_query = $temp;
								?>

							<?php } ?>

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

<?php get_footer(); ?>