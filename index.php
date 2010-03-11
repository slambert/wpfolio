<?php get_header(); ?> 
  
<!-- begin post -->    
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   

<div class="entry">   
	
<!--COMMENTING OUT PREVIOUS/NEXT BUTTONS - they page through multiple categories.
See ticket http://dev.eyebeam.org/projects/wpfolio/ticket/380 

<div class="prevnext"> 
?php previous_posts_link('&larr;') ?> <?php next_post('%', '&larr;', 'no'); ?>  <?php previous_post('%', '&rarr;', 'no'); ?> <?php next_posts_link('&rarr;') ?>
<?php next_post_link('%link', 'newer', TRUE, ''); ?> 
<?php previous_post_link('%link', 'older', TRUE, ''); ?>
</div><!-- .prevnext -->

<!-- END PREVIOUS/NEXT BUTTONS -->    

<?php the_content(); ?>   
</div> <!-- .entry --> 		    

<div class="posted">   
<b><?php the_title(); ?></b>  | <a href="<?php the_permalink() ?>" title="Permalink"><?php the_time('Y') ?></a> | <?php the_category(', '); ?> <?php the_tags('| Tags: ',', ',''); ?>  | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?>
<?php edit_post_link('edit this entry', '<br /><span class="adminuser">', '</span>'); ?> <!--USER EDIT LINK-->
</div><!-- .posted -->
     
<?php comments_template(); ?> 	   

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> <?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>    

<!-- end post-->     

<?php get_footer(); ?> 