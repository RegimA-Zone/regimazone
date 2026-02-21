<?php
/**
 * Lollum
 * 
 * The sidebar containing the secondary widget area, displays on job entries
 *
 * @package WordPress
 * @subpackage Lollum Themes
 * @author Lollum <support@lollum.com>
 *
 */
?>

	<!-- BEGIN col-3 -->
	<div class="lm-col-3">

		<!-- BEGIN #sidebar -->
		<div id="sidebar" role="complementary">
			<!-- BEGIN sidebar -->
			<?php if (!dynamic_sidebar('job-sidebar')) : ?>
				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>
			<?php endif; ?>
			<!-- END sidebar -->
		</div>
		<!-- END #sidebar -->

	<!-- END col-3 -->
	</div>

<!-- END row -->
</div>
