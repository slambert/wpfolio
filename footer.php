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





</div><!-- .container -->
<!-- <?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds. -->  
<!-- calling wp_footer -->
<?php wp_footer(); ?> 
<!-- done calling wp_footer -->
</body>  </html>