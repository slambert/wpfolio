<?php

    // calling the header.php
    get_header(); 

?> 

<div id="content"><!-- BEGIN CONTENT-->
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	
	
		
		<?php 
		
			#Print the large version of the attached image
			
		print wp_get_attachment_image($post->ID, 'large'); ?>
	
	
	
		<div class="post-bottom-title">   
		
		<strong><a href="<?php the_permalink() ?>" title="Permalink for <?php the_title_attribute(); ?>">
		<?php the_title(); ?></a></strong>  | <?php the_time('Y') ?> | <?php the_category(', '); ?> <?php echo get_the_term_list($post->ID, 'medium', '| Media: ', ', ', ''); ?> <?php the_tags('| Tags: ',', ',''); ?>  <?php comments_popup_link(__('| Comments (0)'), __('| Comments (1)'), __('| Comments (%)'), __(''), __('')); ?>

		<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
		
		</div><!-- .post-bottom-title -->
	
	
	
		
     
<?php comments_template(); ?> 	  
	
	
	
	
	
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
	
</div><!-- END CONTENT -->
<?php     

	// calling footer.php
    get_footer();

?>