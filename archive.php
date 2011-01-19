<?php

    // calling the header.php
    get_header(); 

?>  

<!-- generated with archive.php -->

<!-- begin post -->    
<div id="content" class="entry archive notable">
	  	 
	  	<?php // This code is adapted from the kubrick theme's archive.php ?> 
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a tag archive */ if (is_tag()) { ?>
 	  
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Artist Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Archives</h2>
 	  <?php } ?>

		<?php while (have_posts()) : the_post(); ?>

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
			<h2 class="post-title"><a title="'<?php the_title_attribute(); ?>', posted on <?php the_time(get_option('date_format')); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> 
			<!--END POST TITLE-->

			<h4><?php the_time(get_option('date_format')); ?></h4>

			<?php the_excerpt('continue...'); ?>
	
			<h5 class="clear-both"><?php the_time('Y') ?> | <?php the_category(', '); ?> <?php echo get_the_term_list($post->ID, 'medium', '| Media: ', ', ', ''); ?> <?php the_tags('| Tags: ',', ',''); ?>
<?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?> <?php edit_post_link('edit this', '<span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK--></h5>
			</div><!-- .archive-result -->	
		</div><!-- .notable-post -->

		<?php endwhile; ?>
		
<div class="entry">  
		
		<div class="prevnext">
				<div class="prev"><?php previous_post_link('%link', 'Newer', TRUE); ?></div> <div class="next"><?php next_post_link('%link', 'Older', TRUE); ?></div>
		</div> <!--.prevnext -->

	<?php else :

		if ( is_author() ) {  // If this is an author archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<div class=\"entry\">  <h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else if ( is_date() ) { // If this is a date archive
			echo("<div class=\"entry\"> <h2>Sorry, but there aren't any posts with this date.</h2>");
		} else {
			echo("<div class=\"entry\"><h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>
	    		  
</div>	<!-- .entry -->   	  
<!-- end post -->     
</div><!-- #content -->

<?php get_sidebar(); ?>

<?php     

	// calling footer.php
    get_footer();

?>