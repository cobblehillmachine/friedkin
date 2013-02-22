<?php

// Template Name: Background

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
 <div class="wrap">
	<div class="section-title"><?php echo do_shortcode(get_post_meta($post->ID, 'section-title', $single = true)) ?></div>
	<div class="content"><?php the_content(); ?></div>
	<a class="button" href="<?php echo do_shortcode(get_post_meta($post->ID, 'link', $single = true)) ?>">
		contact us
		<div class="arrow"></div>
	</a>
 </div>
<?php endwhile; ?>
<a id="side-button" class="button" href="/team">meet our team<div class="arrow"></div></a>

<?php get_footer(); ?>