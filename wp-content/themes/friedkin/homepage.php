<?php

// Template Name: Homepage

get_header(); ?>
<?php $subs = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC' ));
    if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
		<div class="home-box">
			<div class="section-title"><?php the_title(); ?></div>
			<div class="content"><?php the_content(); ?></div>
			<a class="button" href="<?php echo do_shortcode(get_post_meta($post->ID, 'link', $single = true)) ?>">
				learn more
				<div class="arrow"></div>
			</a>
		</div>
<?php endwhile; endif; wp_reset_postdata(); ?>



<?php get_footer(); ?>