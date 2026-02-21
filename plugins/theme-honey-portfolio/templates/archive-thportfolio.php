<?php 
defined('ABSPATH') or die("Nothing to see here!");
/*
Template Name: Portfolio Page
*/
get_header(); the_post(); ?>
  <!-- Top Section -->
  <section class="top">
  	<?php themehoney_banner(); ?>
    <div class="wrap">
      <div class="page-top">
      	<header class="page-title">
      		<h1><?php single_post_title(); ?></h1>
      	</header>
      </div>
    </div>
	</section>
  <!-- Main Grid -->
  <section class="main-grid">
    <div class="wrap clearfix">
    	<?php the_content(); ?>
    	<?php
	    	$args = array(
	    		'post_type' => 'thportfolio',
	    		'post_status' => 'publish',
	    		'meta_key' => 'date_completed',
	    		'orderby' => 'meta_value_num',
	    		'order' => 'desc',
	    		'showposts' => -1
	    	);
	    	$portfolio_loop = new WP_Query( $args );
	    	while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post(); ?>
		      <article class="portfolio grid-col">
		        <figure class="grid-img">
		        	<a class="hover-img" href="<?php the_permalink(); ?>">
			        	<?php if(has_post_thumbnail()) : ?>
			        		<figure><?php the_post_thumbnail('post-size'); ?></figure>
			        	<?php else : ?>
			        		<figure><img src="<?php echo get_template_directory_uri(); ?>/images/600x338.jpg" alt="<?php the_title(); ?>" width="600" height="338"></figure>
			        	<?php endif; ?>
		        	</a>
			        	<figcaption>
									<h2 class="grid-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="datetime">Completed <time><?php $date = DateTime::createFromFormat('Ymd', get_post_meta($post->ID, 'date_completed', true)); echo $date->format('F Y'); ?></time><br><a href="<?php the_permalink(); ?>">Read more</a></p>
								</figcaption>
		        </figure> 
		      </article>
	      <?php	endwhile; ?>
	    	<?php wp_reset_postdata(); ?>
      <?php themehoney_paging_nav(); ?>
    </div><?php // End .wrap ?>
  </section>
<?php get_footer(); ?>