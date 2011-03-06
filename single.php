<?php

    // calling the header.php
    get_header(); 

?> 

<!-- generated with single.php -->

<!-- Checking if this is a single blog post -->
<?php /* If this is in the blog category */ if(in_category(array('news','latest', 'updates', 'blog', 'notable'))):	 ?>	

<!-- This IS a single blog post! So run the following -->

	<div id="content">
		<div class="notable">	  	 
	  
		<!-- begin post -->    
		<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   

			<div class="notable-post">

				<!--POST TITLE-->		
				<h2 class="post-title"><a title="'<?php the_title_attribute(); ?>', posted on <?php the_time(get_option('date_format')); ?>" href="<?php the_permalink() ?>"><?php the_title(''); ?></a></h2> 
				<!--END POST TITLE-->

				<h4><?php the_time(get_option('date_format')); ?></h4>
				<?php the_content('continue...'); ?>
				
				<?php wp_link_pages(array('before' => '<p class="link_pages"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));  ?>
		
				<h5><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?> <?php the_tags('| Tags: ',', ',''); ?> | More: <?php the_category(', '); ?> <?php edit_post_link('edit this', '<span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK--></h5>
			</div><!-- .notable-post -->

			<div class="prevnext">
				<div class="prev"><?php previous_post_link('%link', 'Previous', TRUE); ?></div> <div class="next"><?php next_post_link('%link', 'Next', TRUE); ?></div>
			</div> <!--.prevnext -->


		<?php comments_template(); ?> 	  

		</div><!-- .notable --> 

		<div id="sidebar">
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) ; ?> 
		</div><!-- #sidebar -->

	</div><!-- #content -->

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> <?php _e('Sorry, no posts matched your criteria.', 'default'); ?>
<?php endif; ?>    

<!-- end post-->     

<?php else: ?>
	
	
	

<!-- This is NOT a single blog post. (So it's a portflio post/single art work) Run the following -->

<div id="content">  
<!-- begin post -->    
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   

	<div class="entry <?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->category_nicename; ?>">     

	<?php the_content(); ?>   
	</div> <!-- .entry --> 		    

	<?php wp_link_pages(array('before' => '<p class="link_pages"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));  ?>
	
<div class="post-bottom-title">   
<strong><a href="<?php the_permalink() ?>" title="Permalink for <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong>  | <?php the_time('Y') ?> | <?php the_category(', '); ?> <?php echo get_the_term_list($post->ID, 'medium', '| Media: ', ', ', ''); ?> <?php the_tags('| Tags: ',', ',''); ?>  <?php comments_popup_link(__('| Comments (0)'), __('| Comments (1)'), __('| Comments (%)'), __(''), __('')); ?>

<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
</div><!-- .post-bottom-title -->

			<div class="prevnext">
					<div class="next"><?php previous_post_link('%link', 'more', TRUE); ?></div><div class="prev"><?php next_post_link('%link', 'more', TRUE); ?></div> <!-- flipped on purpose for art examples only - hopefully this makes sense, I'm not sure it does. -->
					</div> <!--.prevnext --> 
     
<?php comments_template(); ?> 	  
 
</div><!-- #content -->

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> <?php _e('Sorry, no posts matched your criteria.', 'wpfolio'); ?>
<?php endif; ?>    

<!-- end post-->

<?php endif; // end if we are in particular categories ?>

<?php     

	// calling footer.php
    get_footer();

?>