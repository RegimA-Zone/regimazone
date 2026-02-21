<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); ?>

	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

		<div id="page-title-wrap">
			<div class="container">
				<!-- BEGIN row -->
				<div class="row">
					<!-- BEGIN col-12 -->
					<div class="lm-col-12">
						<div class="page-title">
							<h3><?php woocommerce_template_single_title(); ?></h3>
							<?php
							if (get_option('lol_check_breadcrumbs')  == 'true') {
								do_action('show_woo_breadcrumb');
							}
							?>
						</div>
					</div>
					<!-- END col-12 -->
				</div>
				<!-- END row -->
			</div>
		</div>

	<?php endif; ?>

	<?php
	$p_s = false;

	if ( get_option( 'lol_woo_product_sidebar' )  == 'manual' ) {
		$product_sidebar = get_post_meta( $post->ID, 'lolfmkbox_product_sidebar', true );
	} else {
		$product_sidebar = get_option( 'lol_woo_product_sidebar' );
	}

	if ( $product_sidebar == 'left-sidebar' ) {
		$p_s = 'left';
	} elseif ( $product_sidebar == 'right-sidebar' ) {
		$p_s = 'right';
	}
	?>

	<!-- BEGIN #page -->
	<div id="page" class="hfeed">

		<!-- BEGIN #main -->
		<div id="main" class="container <?php echo $p_s ? 'sidebar-'.$p_s : 'sidebar-no'; ?>">

			<!-- BEGIN row -->
			<div class="row">

				<!-- BEGIN col-9 -->
				<div class="cont lm-col-<?php echo($p_s ? '9' : '12'); ?>">

					<!-- BEGIN #content -->
					<div id="content" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'single-product' ); ?>

						<?php endwhile; // end of the loop. ?>

					</div>
					<!-- END #content -->

				</div>
				<!-- END col-9 -->

				<?php if ($product_sidebar == 'left-sidebar' || $product_sidebar == 'right-sidebar') { ?>

					<?php get_template_part('sidebar', 'product'); ?>

				<?php } ?>

			</div>
			<!-- END row -->

		<!-- END #main -->
		</div>

	</div>
	<!-- END #page -->

<?php get_footer('shop'); ?>