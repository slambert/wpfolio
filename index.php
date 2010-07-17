<?php

    // calling the header.php
    get_header(); 

?> 

<!-- generated with index.php -->

<div id="content">  
	<div class="notable">
	<div class="notable-post">
<!-- begin post -->

	<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   
		
		<div class="<?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->category_nicename; ?>">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- START PREVIOUS/NEXT BUTTONS --> 

				<!--Removing Previous/Next until ticket 380 is fixed http://dev.eyebeam.org/projects/wpfolio/ticket/380 
				<div class="prevnext">
				<?php next_post_link('%link', 'newer', TRUE); ?> <?php previous_post_link('%link', 'older', TRUE); ?>
				</div> .prevnext -->

				<!-- END PREVIOUS/NEXT BUTTONS -->    

		<?php the_content(); ?>  
		</div> <!-- #post-id --> 
		</div> <!-- .category-nicename-->  		    
		
		<?php wp_link_pages(); ?>
		
		<div class="post-bottom-title">   
		<b><?php the_title(); ?></b>  | <a href="<?php the_permalink() ?>" title="Permalink"><?php the_time('Y') ?></a> | <?php the_category(', '); ?> <?php the_tags('| Tags: ',', ',''); ?>  | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?>

		<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
		</div><!-- .post-bottom-title -->
     
	<?php comments_template(); ?> 	  

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> <?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>    

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