<?php

// Template Name: Philosophy

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
 <div class="wrap">
	<div class="section-title"><?php echo do_shortcode(get_post_meta($post->ID, 'section-title', $single = true)) ?></div>
	<div class="content"><?php the_content(); ?></div>
 </div>
<?php endwhile; ?>
<div class="line"></div>
<?php $subs = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC' ));
    if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
		<div class="sub-cont">
			<div class="section-title"><?php the_title(); ?></div>
			<div class="content"><?php the_content(); ?></div>
		</div>
<?php endwhile; endif; wp_reset_postdata(); ?>


<?php get_footer(); ?>