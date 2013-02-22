<?php

// Template Name: Contact

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
 <div class="wrap">
	<div class="section-title"><?php echo do_shortcode(get_post_meta($post->ID, 'section-title', $single = true)) ?></div>
	<div class="content"><?php the_content(); ?></div>
 </div>
<?php endwhile; ?>



<div id="map-wrap"><div id="map_canvas"></div></div>
<?php get_footer(); ?>


<script type="text/javascript"
  src="http://maps.googleapis.com/maps/api/js?&sensor=false">
</script>


<script>
	$(document).ready(function() {
		initialize();
	});

	
	function initialize() {
	  // var image = src="/system/images/map-pin.png";
	  var myOptions = {
	    center: new google.maps.LatLng(30.270074,-97.740002) ,
	    zoom: 16,
	    mapTypeId: google.maps.MapTypeId.ROADMAP ,
	    scaleControl: false,
	    panControl: false,
	    mapTypeControl: false,
	    streetViewControl: false


	  };
	  var map = new google.maps.Map(document.getElementById("map_canvas"),
	      myOptions);

	  var marker = new google.maps.Marker({
	      position: map.getCenter(),
	      map: map,
	    });

	}
</script>