<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<script type="text/javascript" src="//use.typekit.net/pel3ojb.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="format-detection" content="telephone=no">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/friedkin.css" />
<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> -->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/cycle.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/friedkin.js"></script>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?> id="<?php echo  strtolower(str_replace(' ','-',get_the_title())); ?>">
	<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
			if ($post_image_id) {
				$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
				if ($thumbnail) (string)$thumbnail = $thumbnail[0];
			} ?>
	<div id="header">
		<div class="mid-cont">
			<a id="logo" href="/"></a>
			<div id="nav"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>
			<?php if (is_front_page()) { ?>
				<div id="home-headline"><div class="mid-cont"><?php echo do_shortcode(get_post_meta($post->ID, 'headline', $single = true)) ?></div></div>
			<?php } ?>
		</div>		
	</div>
	<?php if (is_front_page()) { ?>
		<?php query_posts(array('post_type' => 'Home Slideshow', 'order' => 'DESC', 'orderby'   => 'menu_order', 'posts_per_page' => 10)); ?>
		<div id="slider">
			<?php $count = 0; while ( have_posts() ) : the_post(); ?>
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<div class="slide" style="background-image: url('<?php echo $image[0]; ?>')" rel="<?php echo $count ?>">

					</div>
					<?php $count++; endif; ?>
			<?php endwhile; wp_reset_query();?>
		</div>
	<?php } elseif  (is_page(61)) { ?>
		<?php query_posts(array('post_type' => 'Investment Slideshow', 'order' => 'DESC', 'orderby'   => 'menu_order', 'posts_per_page' => 10)); ?>
		<div id="slider">
			<?php $count = 0; while ( have_posts() ) : the_post(); ?>
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<div class="slide" style="background-image: url('<?php echo $image[0]; ?>')" rel="<?php echo $count ?>">

					</div>
					<?php $count++; endif; ?>
			<?php endwhile; wp_reset_query();?>
		</div>
		
	<?php } else { ?>
	<div id="banner" style="background: url('<?php echo $thumbnail; ?>') no-repeat;"></div>
	<?php } ?>
	<?php if (!is_front_page()) { ?>
		<?php if (get_post_meta($post->ID, 'headline', true)) { ?>
		<div id="headline">
			<div class="mid-cont">
					<?php echo do_shortcode(get_post_meta($post->ID, 'headline', $single = true)) ?>
			</div>
		</div>
	<?php } } ?> 
	<?php if ( $post->post_parent == '12' ){ ?>
		<div id="headline">
			<div class="mid-cont">
					<?php the_title(); ?>
			</div>
		</div>		
	<?php }  ?>
	
	<div id="main-wrapper">
		<div class="mid-cont">
	

