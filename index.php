<?php

    // calling the header.php
    get_header(); 

?> 

<!-- generated with index.php -->

	<div id="content">
		<div class="notable">	
		<!-- begin post -->

		<?php 	
		if (! empty($display_stats) ) { get_stats(1); echo "<br />"; };
	 	if (($posts & empty($display_stats)) ) {
	 	while ( have_posts() ) {
	 		the_post();
	  	?>   
		
		<div class="entry <?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->category_nicename; ?> notable-post">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	 			<!--POST TITLE-->		
				<h2 class="post-title"><a title="'<?php the_title_attribute(); ?>', posted on <?php the_time('F jS, Y') ?>" href="<?php the_permalink() ?>"><?php the_title(''); ?></a></h2> 
				<!--END POST TITLE-->

				<h4 class="notable-date"><a href="<?php the_permalink() ?>"><?php the_date('F d, Y', '', ''); ?></a></h4>
				<?php the_content('continue...'); ?>  
				
				<?php wp_link_pages(array('before' => '<p class="link_pages"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));  ?>
				
			</div> <!-- #post-id --> 
			
			<h5><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?> <?php the_tags('| Tags: ',', ',''); ?> | More: <?php the_category(', '); ?> <?php edit_post_link('edit this', '<span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK--></h5>

		</div> <!-- .category-nicename, .notable-post-->  		    
		
<!-- <?php trackback_rdf(); ?> -->    
<?php }} else{ _e('Sorry, no posts matched your criteria.', 'wpfolio'); }?>    

			<div class="prevnext">
				<div class="prev"><?php previous_posts_link('Previous') ?></div> 
				<div class="next"><?php next_posts_link('Next') ?></div>
			</div><!--.prevnext -->	  
			
	</div><!-- .notable -->

	<div id="sidebar">
		<ul>
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) ; ?> 
		</ul>
	</div><!-- #sidebar -->
	
</div><!-- #content -->
<!-- end post-->     




<?php     

	// calling footer.php
    get_footer();

?>