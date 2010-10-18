<?php

    // calling the header.php
    get_header(); 

?> 

<!-- generated with index.php -->

<div id="content">  
	<div class="notable">
	<div class="notable-post">
<!-- begin post -->

	<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	};
	 if (($posts & empty($display_stats)) ) {
	 	while ( have_posts() ) {
	 		the_post();
	  ?>   
		
		<div class="<?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->category_nicename; ?>">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 

		<?php the_content(); ?>  
		</div> <!-- #post-id --> 
		</div> <!-- .category-nicename-->  		    
		
		 <?php wp_link_pages(array('before' => '<p class="link_pages"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));  ?>
		
		<div class="post-bottom-title">   
		<b><?php the_title(); ?></b>  | <a href="<?php the_permalink() ?>" title="Permalink"><?php the_time('Y') ?></a> | <?php the_category(', '); ?> <?php the_tags('| Tags: ',', ',''); ?>  | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?>

		<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
		</div><!-- .post-bottom-title -->
		
		<!-- START PREVIOUS/NEXT BUTTONS --> 
		<div class="prevnext"><div class="prev"><?php next_posts_link('Earlier') ?></div> <div class="next"><?php previous_posts_link('Later') ?></div></div>
		<!-- END PREVIOUS/NEXT BUTTONS -->   
     
	<?php comments_template(); ?> 	  

<!-- <?php trackback_rdf(); ?> -->    
<?php }} else{ _e('Sorry, no posts matched your criteria.'); }?>    

	</div><!-- .notable-post-->
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