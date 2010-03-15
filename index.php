<?php get_header(); ?> 
  
<!-- begin post -->    
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   

<div class="entry">   
	<div class="pages">

<div class="prevnext">
<?php next_post_link('%link', 'newer', TRUE); ?> <?php previous_post_link('%link', 'older', TRUE); ?>
</div> <!--.prevnext -->

<!-- END PREVIOUS/NEXT BUTTONS -->    

<?php the_content(); ?>   
</div> <!-- .entry --> 		    

<div class="posted">   
<b><?php the_title(); ?></b>  | <a href="<?php the_permalink() ?>" title="Permalink"><?php the_time('Y') ?></a> | <?php the_category(', '); ?> <?php the_tags('| Tags: ',', ',''); ?>  | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?>
<?php edit_post_link('edit this entry', '<br /><span class="adminuser">', '</span>'); ?> <!--USER EDIT LINK-->
</div><!-- .posted -->
     
<?php comments_template(); ?> 	   
</div><!-- .pages -->

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> <?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>    

<!-- end post-->     

<?php get_footer(); ?>