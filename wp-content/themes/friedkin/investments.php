<?php

// Template Name: Investments

get_header(); ?>

<?php $subs = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC' ));
    if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
		<div class="sub-cont">
			<div class="section-title"><?php the_title(); ?></div>
			<div class="content"><?php the_excerpt(); ?></div>
			<a class="button" href="<?php the_permalink(); ?>">
				view all
				<div class="arrow"></div>
			</a>
		</div>
<?php endwhile; endif; wp_reset_postdata(); ?>




<?php get_footer(); ?>