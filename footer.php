<div class="footer">

<!-- License information can go here -->
<!-- Maybe this can be of help - http://creativecommons.org/about -->

<div class="left">
	<?php
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ){
		/* get_sidebar('footer_left'); */	}
				?>
	<!-- <?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds. -->
</div> <!-- end footer left -->
<div class="right">
	<?php
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ){
		/* get_sidebar('footer_left'); */	}
				?>

 </div> <!-- end footer right -->

</div><!-- footer -->



<!-- "WPFolio" design by Eyebeam OpenLab - http://http://dev.eyebeam.org/projects/wpfolio/ -->



<?php wp_footer(); ?>   

</div><!-- .container -->



</body>  </html>