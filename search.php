<?php

    // calling the header.php
    get_header(); 

?> 

<!-- generated with search.php -->

<div id="content" id="search_results">  
<!-- begin post -->

		<div class="notable">
		<h2 class="pagetitle">Search Result for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; _e('', 'wpfolio'); _e('<span class="search-terms">', 'wpfolio'); echo $key; _e('</span>', 'wpfolio'); _e(' &mdash; ', 'wpfolio'); echo $count . ' '; _e('articles', 'wpfolio'); wp_reset_query(); ?></h2> <!-- Pagetitle shows number of search results-->
		
	<?php get_search_form(); ?>
		

	<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   

		<div class="notable-post">
			<div class="archive-result">
				
				<a title="'<?php the_title_attribute(); ?>', <?php the_time('Y') ?>" href="<?php the_permalink() ?>">	
				
				<?php 
				
				
				#If there is a post thumbnail , it will display. If not it is the thumb function. These
				# can be edited in the functions.php file.
				
				if(has_post_thumbnail()){
					the_post_thumbnail();
				}
				else{
			
				
				echo get_thumb($post->ID); 
			}
				
			
				
				
				?>
				
				
				
				</a> 
					
			<!--POST TITLE-->		
			<h2 class="post-title"><a title="'<?php the_title_attribute(); ?>', posted on <?php the_time('F jS, Y') ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> 
			<!--END POST TITLE-->

			<h4><?php the_time(get_option('date_format')); ?></h4>

			<?php the_excerpt('continue...'); ?>
	
			<h5 class="clear-both"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?> <?php the_tags('| Tags: ',', ',''); ?> <?php edit_post_link('edit this', '<span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK--></h5>
			</div><!-- .archive-result -->	
		</div><!-- .notable-post -->


   
<?php endforeach; else: ?> 
	
	<div class="notable-post">
	<h2><?php _e('Sorry, nothing matched your search. Try again.', 'wpfolio'); ?></h2>
	</div><!-- .notable-post -->
<?php endif; ?>    

	</div><!-- #search_results  --> 
<!-- end post-->     
<div id="sidebar">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) ; ?> 

</div><!-- #sidebar -->

</div><!-- #content -->
<?php     

	// calling footer.php
    get_footer();

?>