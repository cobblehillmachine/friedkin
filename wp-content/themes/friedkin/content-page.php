<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div id="sub-investments">
	<div class="wrap">
		<div class="section-title"><?php echo do_shortcode(get_post_meta($post->ID, 'section-title', $single = true)) ?></div>
		<div class="content"><?php the_content(); ?></div>
	</div>
	<div class="line"></div>

	<?php $subs = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC' ));
	    if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
			<div class="sub-cont">
				<div class="image"><?php the_post_thumbnail('full'); ?></div>
				<div class="sub-wrap">
					<div class="section-title"><?php the_title(); ?></div>
					<div class="content"><?php the_content(); ?></div>
					<?php if (get_post_meta($post->ID, 'link', true)) { ?>
						<a class="button" href="<?php echo do_shortcode(get_post_meta($post->ID, 'link', $single = true)) ?>" target="_blank">
							<span>view <?php the_title(); ?> the site</span>
							<div class="arrow"></div>
						</a>
					<?php } ?>
				</div>
			</div>
	<?php endwhile; endif; wp_reset_postdata(); ?>
</div>	
