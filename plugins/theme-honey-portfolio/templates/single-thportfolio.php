<?php 
defined('ABSPATH') or die("Nothing to see here!");
get_header(); ?>
  <!-- Page Content -->
  <section class="main-content">
  	<div class="wrap clearfix">
  		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  		<header class="single-title">
      	<h1><?php the_title(); ?></h1>
    	</header>
    	<?php if (has_post_thumbnail()) : ?>
    		<!-- Featured Image -->
	  		<figure class="portfolio-img"><?php the_post_thumbnail('project-size'); ?>
	  			<?php themehoney_figcaption(); ?>
	  		</figure>
    	<?php else : ?>
    		<figure><img src="<?php echo get_template_directory_uri(); ?>/images/1200x675.jpg" alt="<?php the_title(); ?>" width="1200" height="675"></figure>
	  	<?php endif; ?>
      <article class="fitvids single-content">
      	<h2>Project Summary</h2>
        <?php the_content(); ?>
      </article>
      <!-- Portfolio Sidebar -->
      <aside class="sidebar-wrap">
      	<?php if( get_post_meta($post->ID, 'date_completed', true) ) { ?>
					<div class="widget">
	        	<h2>Date Completed</h2>
	        	<p><time><?php $date = DateTime::createFromFormat('Ymd', get_post_meta($post->ID, 'date_completed', true)); echo $date->format('F Y'); ?></time></p>
	        </div>
				<?php } ?>
      	
				<?php if( get_post_meta($post->ID, 'project_scope', true) ) { ?>
	      	<div class="widget">
	      		<h2>Project Scope</h2>
	      		<p><?php echo get_post_meta($post->ID, 'project_scope', true); ?></p>
	      	</div>
      	<?php } ?>
      	<?php if( get_post_meta($post->ID, 'button_one', true) ) { ?>
	        <div class="widget">
	        	<h2>See the Project</h2>
	        	<div class="button"><a href="<?php echo get_post_meta($post->ID, 'button_one_link', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'button_one', true); ?></a></div>
	        	<?php if( get_post_meta($post->ID, 'button_two', true) ) { ?>
		        	<div class="button"><a href="<?php echo get_post_meta($post->ID, 'button_two_link', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'button_two', true); ?></a></div>
		        <?php } ?>
	        </div>
        <?php } ?>
	        <div class="widget">
	        	<h2>Share</h2>
	        	<?php themehoney_sharing(); ?>
	        </div>
			</aside>
			<?php endwhile; else : ?>
			<?php endif; ?>
    </div><?php // End .wrap ?>
    
  </section>
<?php get_footer(); ?>