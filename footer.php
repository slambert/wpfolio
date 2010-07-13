<div class="footer">

<div class="center">
	<?php
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Center') ){
		/* get_sidebar('footer_center'); */	}
				?>
 </div> <!-- end footer center -->
 
<div class="left">
	<?php
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ){
		/* get_sidebar('footer_left'); */	}
				?>
</div> <!-- end footer left -->

<div class="right">
	<?php
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ){
		/* get_sidebar('footer_right'); */	}
				?>
</div> <!-- end footer right -->

</div><!-- footer -->



<!-- "WPFolio" design by Eyebeam OpenLab - http://http://dev.eyebeam.org/projects/wpfolio/ -->
<!-- <?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds. -->


<?php wp_footer(); ?>   

</div><!-- .container -->



</body>  </html>